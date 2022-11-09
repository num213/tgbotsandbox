<?php

namespace Bot;

use Bot\handlers\HandlerInterface;
use Bot\handlers\ReviewHandler;

/**
 * Обработчик ответов пользователя на команды, им полученные
 */
class HandlerBuilder
{
    /**
     * @var string сокращенное название класса команды, на которую отвечает пользователь.
     *              Например для ReviewCommand – сокращенное название "Review";
     *              Для StartVisitingCommand – "StartVisiting" и т.д.
     */
    private $userCommand;

    /**
     * @var string Ответ пользователя (к примеру, "yes" или "no")
     */
    private $userAnswer;

    /**
     * @var string|null
     */
    private $chatID;

    /**
     * @param array $data то, что приходит от Telegram в ключе 'callback_query'
     */
    public function __construct(array $data)
    {
        if (isset($data['data']) && is_string($data['data'])) {
            // В 'data' хранятся те данные, которые мы указываем в вариантах ответов пользователя
            // в ключе 'callback_data', отправляемых команд
            $this->setUserAnswerAndCommand($data['data']);
        } else {
            $this->userAnswer = '';
            $this->userCommand = '';
        }

        $this->chatID = isset($data['message']['chat']['id'])
            ? $data['message']['chat']['id']
            : null;
    }

    /**
     * @return HandlerInterface|null
     */
    public function build()
    {
        $result = null;
        if (!$this->userAnswer || !$this->userCommand || !$this->chatID) {
            // Если не можем обработать ответ пользователя либо нет чата,
            // то ничего не делаем.
            return $result;
        }

        switch ($this->userCommand) {
            case 'Review':
                $result = new ReviewHandler($this->userAnswer);
                break;
        }

        $result->setChatID($this->chatID);
        return $result;
    }

    /**
     * @param string $userInput
     * @return void
     */
    private function setUserAnswerAndCommand($userInput)
    {
        list($command, $answer) = explode(':', $userInput);

        $this->userCommand = is_string($command) ? $command : '';
        $this->userAnswer = is_string($answer) ? $answer : '';;
    }
}