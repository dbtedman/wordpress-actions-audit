<?php

namespace WordPressActionsAudit\Interfaces\admin;

use PHPUnit\Framework\TestCase;
use WordPressActionsAudit\Services\Services;

class SettingsInterfaceTest extends TestCase
{
    public function testExists(): void
    {
        $services = $this->createMock(Services::class);
        static::assertInstanceOf(SettingsInterface::class, new SettingsInterface($services));
    }

    public function testPrepare(): void
    {
        $services = $this->createMock(Services::class);
        $settingsInterface = new SettingsInterface($services);
        $html = $settingsInterface->prepare();

        static::assertStringContainsString(SettingsInterface::TITLE, $html);
        static::assertStringContainsString(SettingsInterface::PLUGIN_REPOSITORY, $html);
    }

    public function testRender(): void
    {
        $services = $this->createMock(Services::class);
        $settingsInterface = new SettingsInterface($services);
        /** @noinspection PhpVoidFunctionResultUsedInspection */
        static::assertNull($settingsInterface->render());
    }
}
