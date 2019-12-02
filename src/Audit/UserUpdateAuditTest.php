<?php

namespace WordPressActionsAudit\Audit;

use DateTime;
use PHPUnit\Framework\TestCase;

class UserUpdateAuditTest extends TestCase
{
    public function testExists(): void
    {
        $timestamp = $this->createMock(DateTime::class);
        static::assertInstanceOf(UserUpdateAudit::class, new UserUpdateAudit($timestamp));
    }
}
