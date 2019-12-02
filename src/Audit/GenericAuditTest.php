<?php

namespace WordPressActionsAudit\Audit;

use PHPUnit\Framework\TestCase;

class GenericAuditTest extends TestCase
{
    public function testCapturesWhenAudit(): void
    {
        $timestamp = new \DateTime();
        $genericAudit = new GenericAudit($timestamp);

        static::assertEquals($timestamp, $genericAudit->timestamp());
    }
}
