<?php

namespace WordPressActionsAudit;

use PHPUnit\Framework\TestCase;
use WordPressActionsAudit\Services\Services;

class WordPressActionsAuditTest extends TestCase
{
    public function testExists(): void
    {
        $services = $this->createMock(Services::class);
        $this->assertInstanceOf(WordPressActionsAudit::class, new WordPressActionsAudit($services));
    }
}
