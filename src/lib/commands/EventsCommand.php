<?php

namespace Bot\commands;

/**
 * Команда событий
 */
class EventsCommand
{
    public static function getData()
    {
        return [
            'text' => "Мероприятия к выставке\n\n<a href='https://psch.vzmoscow.ru/psychology_mama'>12 ноября 2022 | Мама: круглый стол и арт-терапия</a>",
            'parse_mode' => "html"
        ];
    }
}