<?php

namespace App\Domain;

class Movie
{
    protected string $title;
    protected bool $adult;
    protected string $backdrop_path;
    protected array $genre_ids;
    protected int $id;
    protected string $original_language;
    protected string $original_title;
    protected string $overview;
    protected int $popularity;
    protected string $poster_path;
    protected string $release_date;
    protected bool $video;
    protected float $vote_average;
    protected int $vote_count;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return bool
     */
    public function isAdult(): bool
    {
        return $this->adult;
    }

    /**
     * @param bool $adult
     */
    public function setAdult(bool $adult): void
    {
        $this->adult = $adult;
    }

    /**
     * @return string
     */
    public function getBackdropPath(): string
    {
        return $this->backdrop_path;
    }

    /**
     * @param string $backdrop_path
     */
    public function setBackdropPath(string $backdrop_path): void
    {
        $this->backdrop_path = $backdrop_path;
    }

    /**
     * @return array
     */
    public function getGenreIds(): array
    {
        return $this->genre_ids;
    }

    /**
     * @param array $genre_ids
     */
    public function setGenreIds(array $genre_ids): void
    {
        $this->genre_ids = $genre_ids;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getOriginalLanguage(): string
    {
        return $this->original_language;
    }

    /**
     * @param string $original_language
     */
    public function setOriginalLanguage(string $original_language): void
    {
        $this->original_language = $original_language;
    }

    /**
     * @return string
     */
    public function getOriginalTitle(): string
    {
        return $this->original_title;
    }

    /**
     * @param string $original_title
     */
    public function setOriginalTitle(string $original_title): void
    {
        $this->original_title = $original_title;
    }

    /**
     * @return string
     */
    public function getOverview(): string
    {
        return $this->overview;
    }

    /**
     * @param string $overview
     */
    public function setOverview(string $overview): void
    {
        $this->overview = $overview;
    }

    /**
     * @return int
     */
    public function getPopularity(): int
    {
        return $this->popularity;
    }

    /**
     * @param int $popularity
     */
    public function setPopularity(int $popularity): void
    {
        $this->popularity = $popularity;
    }

    /**
     * @return string
     */
    public function getPosterPath(): string
    {
        return $this->poster_path;
    }

    /**
     * @param string $poster_path
     */
    public function setPosterPath(string $poster_path): void
    {
        $this->poster_path = $poster_path;
    }

    /**
     * @return string
     */
    public function getReleaseDate(): string
    {
        return $this->release_date;
    }

    /**
     * @param string $release_date
     */
    public function setReleaseDate(string $release_date): void
    {
        $this->release_date = $release_date;
    }

    /**
     * @return bool
     */
    public function isVideo(): bool
    {
        return $this->video;
    }

    /**
     * @param bool $video
     */
    public function setVideo(bool $video): void
    {
        $this->video = $video;
    }

    /**
     * @return float
     */
    public function getVoteAverage(): float
    {
        return $this->vote_average;
    }

    /**
     * @param float $vote_average
     */
    public function setVoteAverage(float $vote_average): void
    {
        $this->vote_average = $vote_average;
    }

    /**
     * @return int
     */
    public function getVoteCount(): int
    {
        return $this->vote_count;
    }

    /**
     * @param int $vote_count
     */
    public function setVoteCount(int $vote_count): void
    {
        $this->vote_count = $vote_count;
    }


}
