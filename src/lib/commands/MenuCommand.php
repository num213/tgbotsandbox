<?php

namespace Bot\commands;

/**
 * Основное меню
 */
class MenuCommand
{
    public static function getData()
    {
        return [
            'text' => "В меню вы найдете информацию о мероприятиях, посвященных выставке и контакты галереи. \nДля изучения выставки и навигации по ней используйте кнопки.",
            'reply_markup' => [
                'resize_keyboard' => true,
                'keyboard' => [
                    [
                        ['text' => 'О выставке'],
                    ],
                    [
                        ['text' => 'Ксения Воскобойникова'],
                    ],
                    [
                        ['text' => 'Начать осмотр'],
                    ]
                ]
            ]
        ];
    }
}