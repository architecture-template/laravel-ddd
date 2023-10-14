# laravel-ddd
Laravel&amp;DDD

## 環境構築
- コンテナを起動
```
make docker_up
```
- Octuneサーバーを起動
```
make docker_run
```

## コマンド一覧
- Modelを追加
```
make docker_model model=Example
```
- Controllerを追加
```
make docker_controller controller=ExampleController
```
- Middlewareを追加
```
make docker_middleware middleware=Example
```
- Migrationを追加
```
make docker_migration migration=examples
```
- コンテナに接続
```
make docker_connect
```
- Composerのロード
```
make docker_autoload
```
