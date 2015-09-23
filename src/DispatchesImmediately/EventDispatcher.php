<?php


namespace EventsExample\DispatchesImmediately;


use EventsExample\Event;
use EventsExample\InvalidStateException;

class EventDispatcher
{

    /**
     * @var EventDispatcherInterface
     */
    private static $dispatcher;

    /**
     * @param EventDispatcherInterface $dispatcher
     */
    public static function setDispatcher(EventDispatcherInterface $dispatcher)
    {
        self::$dispatcher = $dispatcher;
    }

    /**
     * @param Event $event
     * @throws InvalidStateException
     */
    public static function dispatch(Event $event)
    {
        if (!self::$dispatcher) {
            throw new InvalidStateException("No Dispatcher Set");
        }

        self::$dispatcher->dispatch($event);
    }

}