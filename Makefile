# コンテナを起動
docker_up:
	docker compose -f docker-compose.local.yml up -d --build
	docker compose -f docker-compose.local.yml exec api composer install
	docker compose -f docker-compose.local.yml exec api php artisan key:generate
	docker compose -f docker-compose.local.yml exec api php artisan migrate

# コンテナに接続
docker_connect:
	docker compose -f docker-compose.local.yml exec api bash

# Composerのロード
docker_autoload:
	docker compose -f docker-compose.local.yml exec api composer dump-autoload

# Controllerを追加
controller ?= ExampleController
docker_controller:
	docker compose -f docker-compose.local.yml exec api php artisan make:controller $(controller)

# Modelを追加
model ?= Example
docker_model:
	docker compose -f docker-compose.local.yml exec api php artisan make:model $(model)

# Migrationを追加
migration ?= examples
docker_migration:
	docker compose -f docker-compose.local.yml exec api php artisan make:migration create_$(migration)_table --create=$(migration)

# Middlewareを追加
middleware ?= Example
docker_middleware:
	docker compose -f docker-compose.local.yml exec api php artisan make:middleware $(middleware)
