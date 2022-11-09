<?php

namespace Bot\handlers;

/**
 * Class BaseHandler
 */
abstract class BaseHandler implements HandlerInterface
{
    /**
     * @var string
     */
    protected $chatID;

    /**
     * @param string $chatID
     * @return void
     */
    public function setChatID($chatID)
    {
        $this->chatID = $chatID;
    }
}