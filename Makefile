.DEFAULT_GOAL := help
.PHONY: help
help: ## Show help message

init:
	docker-compose build --force-rm --no-cache
	make up

up:
	docker-compose up -d
	echo "Application is running at http://127.0.0.1:8030"

test:
	docker exec -it weMovies /home/weMovies/vendor/bin/phpunit

shell:
	docker exec -it weMovies /bin/bash

rector-start:
	docker exec -it weMovies /home/weMovies/vendor/bin/rector process src --dry-run

rector-diff:
	docker exec -it weMovies /home/weMovies/vendor/bin/rector process src