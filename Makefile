.PHONY: start
start:
	cd deploy \
	&& sudo docker-compose build \
	&& sudo docker-compose up -d 



.PHONY: restart
restart:
	cd deploy && sudo docker-compose down &&sudo docker-compose build && sudo docker-compose up -d

.PHONY: down
down:
	cd deploy && sudo docker-compose down

.PHONY: bash
bash:
	cd deploy && sudo docker-compose exec php-fpm bash

.PHONY: ps
ps:
	cd deploy && sudo docker-compose ps

.PHONY: db
db:
	cd deploy && sudo docker-compose exec db bash