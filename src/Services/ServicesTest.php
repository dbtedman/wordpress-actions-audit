<?php

namespace WordPressActionsAudit\Services;

use PHPUnit\Framework\TestCase;

class ServicesTest extends TestCase
{
    public function testExists(): void
    {
        static::assertInstanceOf(Services::class, new Services());
    }
}
