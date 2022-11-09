<?php

namespace Bot;

use Bot\commands\AboutCommand;
use Bot\commands\ArtistCommand;
use Bot\commands\ContactsCommand;
use Bot\commands\EventsCommand;
use Bot\commands\MenuCommand;
use Bot\commands\ReviewCommand;
use Bot\commands\SpaceCommand;
use Bot\commands\StartCommand;
use Bot\commands\StartVisitingCommand;

/**
 * Class CommandBuilder
 */
class CommandBuilder
{
    /**
     * @var string
     */
    private $userCommand = null;

    /**
     * @var int
     */
    private $chatID;

    /**
     * @var string
     */
    private $userFirstName;

    /**
     * @var string
     */
    private $userLastName;

    /**
     * @param array $message
     */
    public function __construct(array $message)
    {
        $this->chatID = $message['chat']['id'];
        $this->userFirstName = $message['from']['first_name'];
        $this->userLastName = $message['from']['last_name'];
        $this->setUserCommand($message['text']);
    }

    /**
     * @return Command
     */
    public function build()
    {
        if ($this->isUserSentEmail()) {
            // Если пользователь отпраляет свой email
            list($data, $method) = [
                ['text' => sprintf('Спасибо. Мы вышлем вам материалы на почту %s', $this->userCommand)],
                'sendMessage'
            ];
        } else {
            // Если это команда
            list($data, $method) = $this->getData();
        }

        $data['chat_id'] = $this->chatID;

        return new Command($data, $method);
    }

    /**
     * @return array
     */
    private function getData()
    {
        $method = 'sendMessage';
        switch ($this->userCommand) {
            case '/start':
                $data = StartCommand::getData($this->userFirstName, $this->userLastName);
                $method = StartCommand::METHOD;
                break;
            case '/contacts':
                $data = ContactsCommand::getData();
                break;
            case '/events':
                $data = EventsCommand::getData();
                break;
            case '/menu':
            case 'меню':
                $data = MenuCommand::getData();
                break;
            case 'о выставке':
                $data = AboutCommand::getData();
                $method = AboutCommand::METHOD;
                break;
            case 'ксения воскобойникова':
                $data = ArtistCommand::getData($this->userCommand);
                $method = ArtistCommand::METHOD;
                break;
            case 'начать осмотр':
            case 'выбор зала':
                $data = StartVisitingCommand::getData();
                break;
            case 'зал № 1':
            case 'зал № 2':
                $data = SpaceCommand::getData($this->userCommand);
                break;
            case 'матерьбург':
            case 'детскоград':
            case 'ямамаямногое':
            case 'экспрессивное рисование':
            case 'книга':
                $upperCase = mb_strtoupper($this->userCommand, 'UTF-8');
                $data = ['text' => "$this->userCommand \n$upperCase"]; // Два раза пишем ответ
                break;
            case 'отзыв':
                $data = ReviewCommand::getData();
                break;
            default:
                $data = ['text' => 'Я пока не умею обрабатывать такие команды :('];
                break;
        }

        return [$data, $method];
    }

    /**
     * @param $text
     * @return void
     */
    private function setUserCommand($text)
    {
        $this->userCommand = mb_strtolower($text, 'utf-8');
    }

    /**
     * @return bool
     */
    private function isUserSentEmail()
    {
        return is_string($this->userCommand)
            && (bool)preg_match("/^[a-zA-Z0-9_\-.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9]+$/", $this->userCommand) !== false;
    }
}