<?php

namespace spec\EventsExample\DispatchesImmediately;

use EventsExample\Event;
use EventsExample\DispatchesImmediately\EventDispatcher;
use EventsExample\DispatchesImmediately\EventDispatcherInterface;
use EventsExample\InvalidStateException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;


/**
 * Class EventDispatcherSpec
 * @package spec\EventsExample\DispatchesImmediately
 *
 * @mixin EventDispatcher
 */
class EventDispatcherSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('EventsExample\DispatchesImmediately\EventDispatcher');
    }

    public function it_should_not_dispatch_without_a_dispatcher(Event $event)
    {
        $this->shouldThrow(InvalidStateException::class)->duringDispatch($event);
    }

    public function it_should_dispatch(EventDispatcherInterface $dispatcherInterface, Event $event)
    {
        $dispatcherInterface->dispatch(Argument::type(Event::class))->shouldBeCalled();

        $this->setDispatcher($dispatcherInterface);

        $this->dispatch($event);
    }
}
