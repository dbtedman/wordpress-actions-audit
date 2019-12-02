<?php

namespace WordPressActionsAudit\Audit;

use DateTime;

class GenericAudit
{
    /**
     * @var DateTime
     */
    private $timestamp;

    /**
     * @param DateTime $timestamp
     */
    public function __construct($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return DateTime
     */
    public function timestamp(): DateTime
    {
        return $this->timestamp;
    }
}
