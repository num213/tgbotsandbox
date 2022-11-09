<?php

namespace Bot\commands;

/**
 * start
 */
class StartCommand
{
    const METHOD = 'sendPhoto';
    /**
     * @param string $firstName
     * @param string $lastName
     * @return array
     */
    public static function getData($firstName, $lastName)
    {
        return [
            'photo' => 'https://thumb.tildacdn.com/stor6636-6537-4662-b731-306166623332/-/resize/400x200/-/format/webp/32837432.png',
            'caption' => "Здравствуйте " . $firstName . " " . $lastName . ". \n\nВ меню вы найдете информацию о мероприятиях, посвященных выставке и контакты галереи. \nДля изучения выставки и навигации по ней используйте кнопки.",
            'parse_mode' => "html",
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