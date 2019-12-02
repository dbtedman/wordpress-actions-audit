<?php

namespace WordPressActionsAudit\Services;

use PHPUnit\Framework\TestCase;

class WordPressServiceTest extends TestCase
{
    public function testExists(): void
    {
        static::assertInstanceOf(WordPressService::class, new WordPressService());
    }
}
