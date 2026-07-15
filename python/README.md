# Python Izyploy example

FastAPI application exposing `/` and `/health`. It listens on `0.0.0.0` and uses `PORT`, defaulting to `8000`.

## Test

```bash
python -m pip install -r requirements-dev.txt
pytest
```

## Docker

```bash
docker build -t izyploy-example-python .
docker run --rm -d --name izyploy-example-python -p 8000:8000 izyploy-example-python
curl http://localhost:8000/
curl http://localhost:8000/health
docker stop izyploy-example-python
```

Override the port:

```bash
docker run --rm -d --name izyploy-example-python -e PORT=9000 -p 9000:9000 izyploy-example-python
```
