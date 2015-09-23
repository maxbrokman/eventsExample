<?php

namespace EventsExample\DispatchesImmediately;

use EventsExample\Event;

interface EventDispatcherInterface
{

    /**
     * @param Event $event
     * @return void
     */
    public function dispatch(Event $event);

}
