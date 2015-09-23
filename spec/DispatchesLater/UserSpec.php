<?php

namespace spec\EventsExample\DispatchesLater;

use EventsExample\DispatchesLater\User;
use EventsExample\UserNameWasChanged;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class UserSpec
 * @package spec\EventsExample\DispatchesLater
 *
 * @mixin User
 */
class UserSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith('name');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('EventsExample\DispatchesLater\User');
    }

    public function it_should_have_a_name()
    {
        $this->getName()->shouldBe('name');
    }

    public function its_name_should_be_changeable()
    {
        $this->changeName('newName');
        $this->getName()->shouldBe('newName');

        $this->popEvents()[0]->shouldHaveType(UserNameWasChanged::class);
    }
}
