FROM php:8.4-cli-alpine

WORKDIR /app
RUN addgroup -S app && adduser -S -G app app
COPY public ./public
COPY entrypoint.sh ./entrypoint.sh
RUN chmod +x ./entrypoint.sh
USER app
EXPOSE 8080
ENTRYPOINT ["./entrypoint.sh"]
