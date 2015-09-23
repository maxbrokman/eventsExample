<?php

namespace spec\EventsExample;

use EventsExample\Event;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserNameWasChangedSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(uniqid(), 'oldName', 'newName');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('EventsExample\UserNameWasChanged');
        $this->shouldHaveType(Event::class);
    }

    public function it_should_have_the_change_info()
    {
        $this->getUserId()->shouldBeString();
        $this->getOldName()->shouldBe('oldName');
        $this->getNewName()->shouldBe('newName');
    }

}
