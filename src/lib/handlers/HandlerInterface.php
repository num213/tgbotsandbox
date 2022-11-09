<?php

namespace Bot\handlers;

use Bot\Command;

interface HandlerInterface
{
    /**
     * @return Command
     */
    public function buildCommand();

    /**
     * @param string $chatID
     * @return void
     */
    public function setChatID($chatID);
}