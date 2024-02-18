dev:
	docker compose up -d
build:
	docker compose up -d --build
sh:
	docker exec -it backup-master-app bash
code-style:
	docker exec backup-master-app vendor/bin/php-cs-fixer fix src
	docker exec backup-master-app vendor/bin/php-cs-fixer fix tests
	docker exec backup-master-app vendor/bin/php-cs-fixer fix migrations
test:
	docker exec backup-master-app php bin/phpunit