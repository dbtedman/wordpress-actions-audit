<?php

namespace WordPressActionsAudit\Actions;

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
}
