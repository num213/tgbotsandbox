<?php

namespace Bot\commands;

/**
 * Команда контактов
 */
class ContactsCommand
{
    /**
     * @return string[]
     */
    public static function getData()
    {
        return [
            'text' => "Галерея На Песчаной\nм. «Сокол», «Полежаевская»,МЦК «Зорге»\nНовопесчаная ул., д. 23, к. 7\nвт-вс: 11:00 - 20:00\nпн: выходной\n\n+7 (499) 943-51-31\n\npeschanaya@vzmoscow.ru\n\n<a href='https://psch.vzmoscow.ru/'>Сайт</a>\n\n<a href='https://t.me/pschgallery'>Телеграм</a>\n\n<a href='https://vk.com/na_peschanoy'>VK</a>",
            'parse_mode' => "html"
        ];
    }
}