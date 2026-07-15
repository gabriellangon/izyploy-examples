FROM rust:1.88 AS builder

WORKDIR /app
COPY Cargo.toml ./
COPY src ./src
RUN cargo build --release

FROM debian:bookworm-slim

RUN useradd --system --create-home --shell /usr/sbin/nologin appuser
WORKDIR /app
COPY --from=builder /app/target/release/izyploy-example-rust /usr/local/bin/izyploy-example-rust
USER appuser
EXPOSE 8080
ENTRYPOINT ["/usr/local/bin/izyploy-example-rust"]
