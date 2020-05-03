<?php
declare(strict_types=1);

namespace WordPressActionsAudit\Core\Audit;

use DateTime;
use PHPUnit\Framework\TestCase;

class GenericAuditTest extends TestCase
{
    public function testCapturesWhenAudit(): void
    {
        $timestamp = new DateTime();
        $genericAudit = new GenericAudit($timestamp);

        static::assertEquals($timestamp, $genericAudit->timestamp());
    }
}
