# コンテナを起動
docker_up:
	docker compose -f docker-compose.local.yml up -d --build
	docker compose -f docker-compose.local.yml exec php composer install
	docker compose -f docker-compose.local.yml exec php php artisan key:generate
	docker compose -f docker-compose.local.yml exec php php artisan migrate
