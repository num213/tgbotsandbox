<?php
require_once __DIR__ . '/autoload.php';

use Bot\Command;
use Bot\CommandBuilder;
use Bot\HandlerBuilder;
use Bot\helper\Logger;
use Bot\Sender;

define('APP_PATH', __DIR__);
define('TOKEN', getenv('TELEGRAM_BOT_API_ACCESS_TOKEN')); // Токен подставляется вручную или из переменных среды
define('BASE_URL', 'https://api.telegram.org/bot' . TOKEN . '/');

$data = json_decode(file_get_contents('php://input'), true);
Logger::log(Logger::LOG_INPUT_FILE, $data); // Логирование входных данных

if (isset($data['callback_query']) && is_array($data['callback_query'])) {
    // Обработка ответов пользователя на полученные им команды
    $handler = (new HandlerBuilder($data['callback_query']))->build();
    $command = $handler ? $handler->buildCommand() : null;
} elseif (isset($data['message']) && is_array($data['message'])) {
    // Обработка команд пользователя
    $command = (new CommandBuilder($data['message']))->build();
} else {
    $command = 'Command not found';
    Logger::log(
        Logger::LOG_ERROR_FILE,
        is_array($data) ? array_merge(['error_message' => $command], $data) : $command . $data
    ); // Логирование внутренних ошибок
}

if ($command instanceof Command) {
    // Отправка в Telegram сообщения пользователю

    Logger::log(Logger::LOG_REQUEST_FILE, $data); // Логирование отправляемых данных
    $response = (new Sender())->send($command->getMethod(), $command->getData());
    Logger::log(Logger::LOG_RESPONSE_FILE, $response); // Логирование полученных в ответ данных
}