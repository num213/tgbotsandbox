include .env_make
export

CURRENT_DIR := $(shell pwd)

up:
	cd $$(pwd) && touch etc/logs/nginx-access.log && touch etc/logs/nginx-error.log && touch etc/logs/php-error.log && touch etc/logs/php-fpm-error.log
	cd $$(pwd) && touch src/logs/error.log && touch src/logs/input.log && touch src/logs/request.log && touch src/logs/response.log
	cd $$(pwd) && TELEGRAM_BOT_NAME=$$TELEGRAM_BOT_NAME TELEGRAM_BOT_TOKEN=$$TELEGRAM_BOT_TOKEN docker compose up -d
	cd $$(pwd) && TELEGRAM_API_ID=$$TELEGRAM_API_ID TELEGRAM_API_HASH=$$TELEGRAM_API_HASH docker compose -f telegram-bot-api.yml up -d
	curl http://localhost:8082/bot$$TELEGRAM_BOT_TOKEN/setWebhook?url=http://tg-bot-sandbox-nginx/index.php && echo "\nFinished"

down:
	curl http://localhost:8082/bot$$TELEGRAM_BOT_TOKEN/deleteWebhook && echo "\n"
	cd $$(pwd) && docker compose -f telegram-bot-api.yml stop
	cd $$(pwd) && docker compose down
	cd $$(pwd) && docker compose -f telegram-bot-api.yml down

webhook:
	curl http://localhost:8082/bot$$TELEGRAM_BOT_TOKEN/getWebhookInfo && echo "\n"