# Java Izyploy example

Spring Boot application exposing `/` and `/health`. It listens on `0.0.0.0` and uses `PORT`, defaulting to `8080`.

## Test

```bash
mvn test
```

## Docker

```bash
docker build -t izyploy-example-java .
docker run --rm -d --name izyploy-example-java -p 8080:8080 izyploy-example-java
curl http://localhost:8080/
curl http://localhost:8080/health
docker stop izyploy-example-java
```
