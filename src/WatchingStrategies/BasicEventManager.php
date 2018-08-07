<?php

namespace Imanghafoori\HeyMan\WatchingStrategies;

use Illuminate\Support\Facades\Event;
use Imanghafoori\HeyMan\HeyManSwitcher;

class BasicEventManager
{
    private $events;

    /**
     * BasicEventManager constructor.
     *
     * @param $events
     *
     * @return BasicEventManager
     */
    public function init(array $events): self
    {
        $this->events = $events;

        return $this;
    }

    /**
     * @param $listener
     */
    public function startGuarding(callable $listener)
    {
        Event::listen($this->events, app(HeyManSwitcher::class)->wrapForIgnorance($listener, 'event'));
    }
}
