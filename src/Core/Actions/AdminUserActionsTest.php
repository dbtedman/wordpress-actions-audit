<?php

namespace WordPressActionsAudit\Core\Actions;

use PHPUnit\Framework\TestCase;
use WordPressActionsAudit\Services\Services;
use WordPressActionsAudit\Services\WordPressService;

class AdminUserActionsTest extends TestCase
{
    public function testExists(): void
    {
        $services = $this->createMock(Services::class);
        $this->assertInstanceOf(AdminUserActions::class, new AdminUserActions($services));
    }

    public function testWatchActions(): void
    {
        $services = $this->createMock(Services::class);

        $wordPressService = $this->createMock(WordPressService::class);
        $wordPressService->expects(static::once())
            ->method('addAction')
            ->withConsecutive(
                [
                    static::isType('string'),
                    static::isType('int'),
                    static::isType('int'),
                    static::isType('callable')
                ]
            );

        $services->method('wordpressService')->willReturn($wordPressService);

        $adminUserActions = new AdminUserActions($services);

        $adminUserActions->watchActions();
    }
}
