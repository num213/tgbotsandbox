<?php

namespace Bot\commands;

/**
 * Начала показа выставки
 */
class StartVisitingCommand
{
    public static function getData()
    {
        return [
            'text' => "Выберите зал: я помогу вам с осмотром экспозиции.\n\nЧтобы вернуться в начало, нажмите Меню",
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => [
                    [
                        ['text' => 'Зал № 1'],
                    ],
                    [
                        ['text' => 'Зал № 2'],
                    ]
                ]
            ]
        ];
    }
}