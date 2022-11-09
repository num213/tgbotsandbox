<?php

namespace Bot;

/**
 * Class Command
 */
class Command
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var string
     */
    private $method;

    /**
     * @param array $data
     * @param string $method
     */
    public function __construct(array $data, $method)
    {
        $this->data = $data;
        $this->method = $method;
    }

    /**
     * @return array Данные отправляемые в телеграм
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return string Метод используемый в телеграм
     */
    public function getMethod()
    {
        return $this->method;
    }
}