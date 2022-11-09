<?php

namespace Bot\helper;

/**
 * Внутренний логер
 */
class Logger
{
    const LOG_REQUEST_FILE = 'request.log';
    const LOG_RESPONSE_FILE = 'response.log';
    const LOG_ERROR_FILE = 'error.log';
    const LOG_INPUT_FILE = 'input.log';

    /**
     * @param string $file
     * @param bool|array|string $data
     * @return void
     */
    public static function log($file, $data)
    {
        file_put_contents(APP_PATH . '/logs/' . $file, print_r($data, 1) . "\n", FILE_APPEND);
    }
}