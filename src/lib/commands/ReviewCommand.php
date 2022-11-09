<?php

namespace Bot\commands;

/**
 * Команда "отзыв"
 */
class ReviewCommand
{
    const ANSWER_YES = 'yes';
    const ANSWER_NO = 'no';

    /**
     * @return array
     */
    public static function getData()
    {
        return [
            'text' => "Вам понравилась выставка?",
            'reply_markup' => [
                'inline_keyboard' => [
                    [
                        [
                            'text' => 'Да',
                            'callback_data' => 'Review:' . self::ANSWER_YES
                        ],
                        [
                            'text' => 'Нет',
                            'callback_data' => 'Review:' . self::ANSWER_NO
                        ]
                    ]
                ]
            ]
        ];
    }
}