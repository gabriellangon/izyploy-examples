import logging
import os

from fastapi import FastAPI, Request

logging.basicConfig(level=logging.INFO, format="%(asctime)s %(levelname)s %(message)s")
logger = logging.getLogger(__name__)

app = FastAPI()


@app.middleware("http")
async def log_requests(request: Request, call_next):
    response = await call_next(request)
    logger.info('%s %s -> %s', request.method, request.url.path, response.status_code)
    return response


@app.get("/")
def root():
    return {"message": "Hello World", "runtime": "python"}


@app.get("/health")
def health():
    return {"status": "ok"}


def port() -> int:
    return int(os.getenv("PORT", "8000"))
