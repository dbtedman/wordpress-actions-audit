<?php

namespace WordPressActionsAudit\Actions;

use PHPUnit\Framework\TestCase;
use WordPressActionsAudit\Services\WordPressService;

class AdminUserActionsTest extends TestCase
{
    public function testExists(): void
    {
        $wp = $this->createMock(WordPressService::class);
        $this->assertInstanceOf(AdminUserActions::class, new AdminUserActions($wp));
    }
}
