
$(document).ready(function() {
    $(".my-rating").starRating({
        starSize: 25
    });
});

function displayContent(data) {
    let HTML = '';
    for (let i = 0; i < data.length; i++) {
        var numberStar = Math.floor(data[i].vote_average / 2);
        var numberSubStar = Math.floor(data[i].vote_average / 2 - numberStar);

        var numberEmptyStar = 5 - numberStar - numberSubStar;
        var STAR = '';
        var substar = false;
        for (let j = 0; j < 5; j++) {
            if (numberSubStar > 0) {
                substar = true;
            }
            if (j < numberStar) {
                STAR += '<i class="fa-solid fa-star"></i>';
            }
        }
        if (substar) {
            STAR += '<i class="fa-solid fa-star-half-stroke"></i>';
        }
        for (let k = 0; k < numberEmptyStar; k++) {
            STAR += '<i class="fa-regular fa-star"></i>';
        }
        HTML += `
                    <div className="media mb-4" style=" clear:both; height: 240px;height: 260px; margin-bottom: 15px; background: #fafafa;">
                        <div className="media-left mr-2" style=" float:left; margin-right: 20px;">
                            <img className="media-object"
                                 src="https://image.tmdb.org/t/p/original${data[i].poster_path}" width="160"
                                 height="240"/>
                        </div>
                        <div className="media-body" >
                            <h4 className="media-heading">${data[i].title}<small></small></h4>
                             ` + STAR + ` <b>Nombre de Votes: ${data[i].vote_count}</b>
                            <p>${data[i].overview}</p>
                            <button type="button" class="btn btn-primary show-detail" data-bs-toggle="modal" data-id="${data[i].id}" data-bs-target="#modal">
                                Détail
                            </button>
                        </div>
                    </div> `;
    }
    return HTML;
}

$(document).ready(function(){
    var $loading = $('#loading');
    $loading.hide();
    $('#spinner').hide();
    listMovies();
    $("#genre_genre input").change(function(e) {
        var selected = changeSelected();
        listMovies(selected);
    });
    $("#btn-search").click(function(e) {
        e.preventDefault();
        var selected = changeSelected();
        var tags = changeTags();
        console.log(tags);
        listMovies(selected, tags);
    });

    function changeSelected() {
        let selected = '';
        $('#genre_genre input:checked').each(function() {
            if(selected != '') {
                selected = selected + '|' + this.value;
            } else {
                selected = this.value;
            }
        });
        return selected;
    }

    function changeTags() {
        let tags = '';
        $('.ts-control div').each(function() {
            if(tags != '') {
                tags = tags + '|' + $(this).text().slice(0,-1);
            } else {
                tags = $(this).text().slice(0,-1);
            }
        });
        return tags;
    }
    function listMovies(selected, tags) {
        if(selected == undefined) {
            selected = '';
        }
        if(tags == undefined) {
            tags = '';
        }
        $loading.show();
        $('#spinner').show();
        setTimeout(function () {
        $.ajax({
            type: "POST",
            url: url_listing,
            data: {
                with_genres : selected,
                with_keywords: tags
            }
        })
            .done(function(data){
                $("#movies_list").html();
                $loading.hide();
                $('#spinner').hide();
                let HTML = displayContent(data);
                $("#movies_list").html(HTML);
            });
        }, 1000);
    }
    $(document).on("click", '.btn.show-detail', function(event) {
        event.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: url_video,
            data: {
                'id': id
            }
        }).done(function(data){
                $(".modal-body").html();
                $loading.hide();
                $('#spinner').hide();
                let HTML = '';
            HTML += `
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/${data['results'][0].key}"></iframe>
                <h4>${data['results'][0].name}</h4>
            `;
                $(".modal-body").html(HTML);
            });
    });

    $(document).on("click", '.btn.show-detail', function(event) {
        event.preventDefault();
        let id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: url_video,
            data: {
                'id': id
            }
        }).done(function(data){
            $(".modal-body").html();
            $loading.hide();
            $('#spinner').hide();
            let HTML = '';
            HTML += `
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/${data['results'][0].key}"></iframe>
                <h4>${data['results'][0].name}</h4>
                <div class="my-rating"></div>
            `;
            $(".modal-body").html(HTML);
        });
    });
    $(document).on('show.bs.modal', '#modal', function () {

    });
});