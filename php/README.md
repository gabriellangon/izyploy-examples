# PHP Izyploy example

Small PHP CLI built-in-server application exposing `/` and `/health`. It listens on `0.0.0.0` and uses `PORT`, defaulting to `8080`.

## Test

```bash
composer test
```

## Docker

```bash
docker build -t izyploy-example-php .
docker run --rm -d --name izyploy-example-php -p 8080:8080 izyploy-example-php
curl http://localhost:8080/
curl http://localhost:8080/health
docker stop izyploy-example-php
```
