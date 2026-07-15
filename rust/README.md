# Rust Izyploy example

Axum application exposing `/` and `/health`. It listens on `0.0.0.0` and uses `PORT`, defaulting to `8080`.

## Test

```bash
cargo fmt --check
cargo test
```

## Docker

```bash
docker build -t izyploy-example-rust .
docker run --rm -d --name izyploy-example-rust -p 8080:8080 izyploy-example-rust
curl http://localhost:8080/
curl http://localhost:8080/health
docker stop izyploy-example-rust
```
