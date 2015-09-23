<?php

namespace spec\EventsExample;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InvalidStateExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('EventsExample\InvalidStateException');
        $this->shouldHaveType('Exception');
    }
}
