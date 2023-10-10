# コンテナを起動
docker_up:
	docker compose -f docker-compose.local.yml up -d --build
	docker compose -f docker-compose.local.yml exec php composer install
	docker compose -f docker-compose.local.yml exec php php artisan key:generate
	docker compose -f docker-compose.local.yml exec php php artisan migrate

# コンテナに接続
docker_connect:
	docker compose -f docker-compose.local.yml exec php bash

# Composerのロード
docker_autoload:
	docker compose -f docker-compose.local.yml exec php composer dump-autoload

# php artisan make:model Example
# php artisan make:controller ExampleController
# php artisan make:migration create_examples_table --create=examples
