<?php

namespace EventsExample\DispatchesLater;

use EventsExample\Event;
use EventsExample\UserNameWasChanged;

class User
{
    private $id;

    private $name;

    /**
     * @var Event[]
     */
    private $events = [];

    public function __construct($name)
    {
        $this->id = uniqid();
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function changeName($newName)
    {
        $oldName = $this->name;
        $this->name = $newName;

        $this->raise(new UserNameWasChanged($this->id, $oldName, $newName));
    }

    public function popEvents()
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }

    private function raise(Event $event)
    {
        $this->events[] = $event;
    }
}
