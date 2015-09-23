<?php

namespace spec\EventsExample\DispatchesImmediately;

use EventsExample\DispatchesImmediately\EventDispatcher;
use EventsExample\DispatchesImmediately\EventDispatcherInterface;
use EventsExample\DispatchesImmediately\User;
use EventsExample\UserNameWasChanged;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class UserSpec
 * @package spec\EventsExample\DispatchesImmediately
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
        $this->shouldHaveType('EventsExample\DispatchesImmediately\User');
    }

    public function it_should_have_a_name()
    {
        $this->getName()->shouldBe('name');
    }

    public function its_name_should_be_changeable(EventDispatcherInterface $dispatcher)
    {
        $dispatcher->dispatch(Argument::type(UserNameWasChanged::class))->shouldBeCalled();

        $dispatcher = $dispatcher->getWrappedObject();

        EventDispatcher::setDispatcher($dispatcher);

        $this->changeName('newName');
        $this->getName()->shouldBe('newName');
    }
}
