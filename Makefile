include .env

build:
	make stop_services
	sudo chmod 777 -R mysql || true
	docker compose -f docker-compose.yml build
	docker compose -f docker-compose.yml up -d
	docker exec $(CONTAINER_PREFIX)_php composer install
	docker exec $(CONTAINER_PREFIX)_php [ ! -f .env ] \
		&& docker exec $(CONTAINER_PREFIX)_php cp -n .env.example .env \
		&& docker exec $(CONTAINER_PREFIX)_php php artisan key:generate
	docker exec $(CONTAINER_PREFIX)_php chmod 777 -R .
	docker exec $(CONTAINER_PREFIX)_php php artisan storage:link
	make stop
	echo "Build complete"

up:
	make stop_services
	docker compose -f docker-compose.yml up -d

stop:
	docker compose -f docker-compose.yml stop
	make start_services

down:
	docker compose -f docker-compose.yml down
	make start_services

purge:
	docker rmi -f $(CONTAINER_PREFIX)
	sudo chmod -R +rwx mysql
	sudo rm -rf mysql

ex:
	docker exec -it $(CONTAINER_PREFIX)_php /bin/sh

analyse:
	cd src && composer analyse 2>&1 | tee storage/logs/analyse.log

start_services:
	sudo service mysql start || true
	sudo service nginx start || true
	sudo service redis start || true

stop_services:
	sudo service mysql stop || true
	sudo service nginx stop || true
	sudo service redis stop || true

.PHONY: build up stop down ex analyse purge start_services stop_services
