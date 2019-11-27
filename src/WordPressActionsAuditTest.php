<?php

namespace WordPressActionsAudit;

use PHPUnit\Framework\TestCase;

class WordPressActionsAuditTest extends TestCase
{
    public function testExists(): void
    {
        $this->assertInstanceOf(WordPressActionsAudit::class, new WordPressActionsAudit());
    }
}
