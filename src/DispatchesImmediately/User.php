<?php

namespace EventsExample\DispatchesImmediately;

use EventsExample\Event;
use EventsExample\UserNameWasChanged;

class User
{

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @param $name
     */
    public function __construct($name)
    {
        $this->id = uniqid();
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $newName
     */
    public function changeName($newName)
    {
        $oldName = $this->name;
        $this->name = $newName;

        $this->raise(new UserNameWasChanged($this->id, $oldName, $newName));
    }

    /**
     * @param Event $event
     * @throws \EventsExample\InvalidStateException
     */
    private function raise(Event $event)
    {
        EventDispatcher::dispatch($event);
    }

}
