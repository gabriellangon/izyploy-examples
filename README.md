# Izyploy example applications

This repository contains four small, independent HTTP applications for testing Izyploy, a learning-oriented deployment platform. Each application directory is an independent Docker build context and exposes the same JSON contract on `/` and `/health`.

| Application | Build context | Default port | Root endpoint | Health endpoint |
| --- | --- | ---: | --- | --- |
| Java | `java` | 8080 | `/` | `/health` |
| PHP | `php` | 8080 | `/` | `/health` |
| Python | `python` | 8000 | `/` | `/health` |
| Rust | `rust` | 8080 | `/` | `/health` |

## Java

Run native tests:

```bash
cd java
mvn test
```

Build the Docker image:

```bash
docker build -t izyploy-example-java ./java
```

Start a container:

```bash
docker run --rm -d --name izyploy-example-java -p 8080:8080 izyploy-example-java
```

Override `PORT`:

```bash
docker run --rm -d --name izyploy-example-java -e PORT=9090 -p 9090:9090 izyploy-example-java
```

Verify the endpoints:

```bash
curl http://localhost:8080/
curl http://localhost:8080/health
```

Stop and remove the container:

```bash
docker stop izyploy-example-java
```

## PHP

Run native tests:

```bash
cd php
composer test
```

Build the Docker image:

```bash
docker build -t izyploy-example-php ./php
```

Start a container:

```bash
docker run --rm -d --name izyploy-example-php -p 8081:8080 izyploy-example-php
```

Override `PORT`:

```bash
docker run --rm -d --name izyploy-example-php -e PORT=9091 -p 9091:9091 izyploy-example-php
```

Verify the endpoints:

```bash
curl http://localhost:8081/
curl http://localhost:8081/health
```

Stop and remove the container:

```bash
docker stop izyploy-example-php
```

## Python

Run native tests:

```bash
cd python
python -m pip install -r requirements.txt
pytest
```

Build the Docker image:

```bash
docker build -t izyploy-example-python ./python
```

Start a container:

```bash
docker run --rm -d --name izyploy-example-python -p 8000:8000 izyploy-example-python
```

Override `PORT`:

```bash
docker run --rm -d --name izyploy-example-python -e PORT=9092 -p 9092:9092 izyploy-example-python
```

Verify the endpoints:

```bash
curl http://localhost:8000/
curl http://localhost:8000/health
```

Stop and remove the container:

```bash
docker stop izyploy-example-python
```

## Rust

Run native checks:

```bash
cd rust
cargo fmt --check
cargo test
```

Build the Docker image:

```bash
docker build -t izyploy-example-rust ./rust
```

Start a container:

```bash
docker run --rm -d --name izyploy-example-rust -p 8082:8080 izyploy-example-rust
```

Override `PORT`:

```bash
docker run --rm -d --name izyploy-example-rust -e PORT=9093 -p 9093:9093 izyploy-example-rust
```

Verify the endpoints:

```bash
curl http://localhost:8082/
curl http://localhost:8082/health
```

Stop and remove the container:

```bash
docker stop izyploy-example-rust
```

## Example Izyploy deployment payloads

```json
{
  "name": "hello-java",
  "git_url": "https://github.com/<owner>/izyploy-examples.git",
  "branch": "main",
  "build_context": "java",
  "container_port": 8080
}
```

```json
{
  "name": "hello-php",
  "git_url": "https://github.com/<owner>/izyploy-examples.git",
  "branch": "main",
  "build_context": "php",
  "container_port": 8080
}
```

```json
{
  "name": "hello-python",
  "git_url": "https://github.com/<owner>/izyploy-examples.git",
  "branch": "main",
  "build_context": "python",
  "container_port": 8000
}
```

```json
{
  "name": "hello-rust",
  "git_url": "https://github.com/<owner>/izyploy-examples.git",
  "branch": "main",
  "build_context": "rust",
  "container_port": 8080
}
```
