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

function error_log($message)
{
    global $errorLogMessage;
    $errorLogMessage = $message;
}

function add_menu_page($pageTitle, $menuTitle, $capability, $menuSlug, $callable, $iconURL, $position)
{
    global $menuPage;
    $menuPage = [
        'pageTitle' => $pageTitle,
        'menuTitle' => $menuTitle,
        'capability' => $capability,
        'menuSlug' => $menuSlug,
        'callable' => $callable,
        'iconURL' => $iconURL,
        'position' => $position
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

    public function testLog(): void
    {
        global $errorLogMessage;
        $errorLogMessage = null;
        $messageToLog = "Something is happening.";

        $wp = new WordPressService();
        $wp->log($messageToLog);

        static::assertEquals($errorLogMessage, $messageToLog);
    }

    public function testAddMenuPage(): void
    {
        global $menuPage;
        $menuPage = null;

        $pageTitle = 'Something';
        $menuTitle = 'Something';
        $capability = 'manage_options';
        $menuSlug = 'something';
        $callable = static function () {
        };
        $iconURL = 'https://example.com/icon.jpg';
        $position = 10;

        $wp = new WordPressService();
        $wp->addMenuPage($pageTitle, $menuTitle, $capability, $menuSlug, $callable, $iconURL, $position);

        static::assertEquals($menuPage['pageTitle'], $pageTitle);
        static::assertEquals($menuPage['menuTitle'], $menuTitle);
        static::assertEquals($menuPage['capability'], $capability);
        static::assertEquals($menuPage['menuSlug'], $menuSlug);
        static::assertEquals($menuPage['callable'], $callable);
        static::assertEquals($menuPage['iconURL'], $iconURL);
        static::assertEquals($menuPage['position'], $position);
    }
}
