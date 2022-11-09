<?php

namespace Bot\commands;

/**
 * Команда "выбор зала"
 */
class SpaceCommand
{
    /**
     * @param string $space
     * @return array
     */
    public static function getData($space)
    {
        $result = [];
        switch ($space) {
            case 'зал № 1':
                $result = [
                    'text' => "В этом зале ...",
                    'reply_markup' => [
                        'resize_keyboard' => true,
                        'keyboard' => [
                            [
                                ['text' => 'Выбор зала'],
                            ],
                            [
                                ['text' => 'Матерьбург'],
                            ],
                            [
                                ['text' => 'Детскоград'],
                            ]
                        ]
                    ]
                ];
                break;

            case 'зал № 2':
                $result = [
                    'text' => "В этом зале ...",
                    'reply_markup' => [
                        'resize_keyboard' => true,
                        'keyboard' => [
                            [
                                ['text' => 'Выбор зала'],
                            ],
                            [
                                ['text' => 'ЯМамаЯМногое'],
                            ],
                            [
                                ['text' => 'Экспрессивное рисование'],
                                ['text' => 'Книга'],
                            ]
                        ]
                    ]
                ];
                break;
        }
        return $result;
    }
}