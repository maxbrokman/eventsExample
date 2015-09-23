## Different Ways of Dispatching Domain Events ##

Following some discussion on the Laravel Doctrine Slack I've made this as an example of two ways I can think
of of dispatching domain events from the model.

#### Use Case ####

In both types we have a simple `User` which wants to raise an event (`UserNameWasChanged`) when its name changes.

#### DispatchesImmediately ####

In `EventsExample\DispatchesImmediately` the `User` dispatches events directly, using a static dispatcher, which simply
wraps a real dispatcher.

We can test events by assigning a mock dispatcher to our wrapping class.

Pros:
* We know that Events will get properly dispatched (or the application will fail hard)

Cons:
* Events are dispatched as soon as they happen, might not be desire able if we immediately roll them back / throw
away our changed objects

#### DispatchesLater ####

In `EventsExample\DispatchesLater` the `User` simply holds a collection of events itself, and waits for something
external to ask for what has happened to it, this could be an ORM, a command, a controller etc.

We test events by checking that the correct type is held against the user object.

Pros:
* We have control over when the events are dispatched

Cons:
* We are reliant on something outside the domain model actually firing our events for us.