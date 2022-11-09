<?php

namespace Bot\handlers;

use Bot\Command;
use Bot\commands\ReviewCommand;

/**
 * Обработчик ответа пользователя на команду отзыва
 * @see ReviewCommand
 */
class ReviewHandler extends BaseHandler
{
    /**
     * @var string Ответ пользователя
     */
    private $answer;

    /**
     * @param string $answer
     */
    public function __construct($answer)
    {
        $this->answer = $answer;
    }

    /**
     * @inheritDoc
     */
    public function buildCommand()
    {
        switch ($this->answer) {
            case ReviewCommand::ANSWER_YES: $text = 'Ещё бы не понравилась'; break;
            case ReviewCommand::ANSWER_NO: $text = 'Ну и дурак'; break;
            default: $text = 'Не получилось обработать ваш ответ :('; break;
        }

        return new Command([
            'text' => $text,
            'chat_id' => $this->chatID
        ], 'sendMessage');
    }
}