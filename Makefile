dev:
	docker compose up -d
build:
	docker compose up -d --build
sh:
	docker exec -it backup-master-app bash