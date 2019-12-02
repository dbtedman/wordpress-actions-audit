<?php

namespace WordPressActionsAudit\Services;

use PHPUnit\Framework\TestCase;

$action = null;

function add_action($name, $callable, $priority, $acceptedArgs)
{
    global $action;
    $action = [
        'name' => $name,
        'priority' => $priority,
        'acceptedArgs' => $acceptedArgs,
        'callable' => $callable,
    ];
}

class WordPressServiceTest extends TestCase
{
    public function testExists(): void
    {
        static::assertInstanceOf(WordPressService::class, new WordPressService());
    }

    public function testAddAction(): void
    {
        global $action;
        $action = null;

        $wp = new WordPressService();

        $name = 'Name';
        $priority = 123;
        $acceptedArgs = 2;
        $callable = static function () {
        };

        $wp->addAction($name, $priority, $acceptedArgs, $callable);

        static::assertEquals($name, $action['name']);
        static::assertEquals($priority, $action['priority']);
        static::assertEquals($acceptedArgs, $action['acceptedArgs']);
        static::assertEquals($callable, $action['callable']);
    }
}
