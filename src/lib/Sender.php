<?php

namespace Bot;

use function curl_close;
use function curl_exec;
use function curl_init;
use function curl_setopt_array;

/**
 * Отправка данных в Telegram
 */
class Sender
{
    /**
     * @param string $method
     * @param array $data
     * @param array $headers
     * @return bool|array|string
     */
    public function send($method, array $data, array $headers = [])
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => BASE_URL . $method,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array_merge(["Content-Type: application/json"], $headers)
        ]);

        $result = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($result, true);
        return $response ? $response : $result;
    }
}