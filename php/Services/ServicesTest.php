<?php
declare(strict_types=1);

namespace WordPressActionsAudit\Services;

use PHPUnit\Framework\TestCase;

class ServicesTest extends TestCase
{
    public function testExists(): void
    {
        static::assertInstanceOf(Services::class, new Services());
    }
}
