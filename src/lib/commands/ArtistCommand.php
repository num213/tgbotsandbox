<?php

namespace Bot\commands;

/**
 * Команда с выборомавтора
 */
class ArtistCommand
{
    const METHOD = 'sendPhoto';

    /**
     * @param string $artistName Имя автора
     * @return array|string[]
     */
    public static function getData($artistName)
    {
        $result = [];
        switch ($artistName) {
            case 'ксения воскобойникова';
                $result = [
                    'photo' => 'https://upload.wikimedia.org/wikipedia/en/0/09/Keith_Harring_Crack_is_Wack_Mural.jpg',
                    'caption' => "Ксения Воскобойникова — экспрессивная художница и педагог из Санкт- Петербурга. В художественной практике обращается к экспрессии, отображению и изучению состояний через живопись, графику, скульптуру, перформанс, digital art.\n\n<a href='http://k-art.online/'>k-art</a>",
                    'parse_mode' => "html"
                ];
                break;
        }
        return $result;
    }
}