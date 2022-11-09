# tg-bot-sandbox

Телеграм-бот. 

Telegram Bot API - [https://core.telegram.org/bots/api](https://core.telegram.org/bots/api)

## Локальная установка

### Telegram Bot
Для локального тестирования предлагается создать **своего** бота.

Бот создаётся с помощью https://t.me/botfather.
После создания сохраняем его имя и token в `.env_make`

### Telegram API
1. Переходим в свой личный кабинет https://my.telegram.org/
2. Раздел *API development tools*.
3. Создаём новое приложение (по факту назвать можно как угодно и адрес сайта тоже любой). Выбираем web-приложение.
4. Получаем `App api_id` и `App api_hash`.

### Makefile
Создать файл `.env_make` со следующим содержанием:
```
TELEGRAM_API_ID=api_id
TELEGRAM_API_HASH=api_hash
TELEGRAM_BOT_NAME=bot_name
TELEGRAM_BOT_TOKEN=bot_token
```

## Запуск
Требуется локальный `curl` и `Docker`.

## Команды make
* `make up` – запуск проекта
* `make down` – остановка пректа
* `make webhook` – получить информацию об установленном вебхуке