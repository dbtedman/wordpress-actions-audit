<?php

namespace WordPressActionsAudit\Actions;

use DateTime;
use WordPressActionsAudit\Audit\UserUpdateAudit;
use WordPressActionsAudit\Services\WordPressService;

class AdminUserActions
{
    /**
     * @var WordPressService
     */
    private $wp;

    /**
     * @param WordPressService $wordPressService
     */
    public function __construct($wordPressService)
    {
        $this->wp = $wordPressService;
    }

    public function watchActions(): void
    {
        $this->wp->addAction('profile_update', 10, 1, function ($userId) {
            $timestamp = new DateTime();
            $audit = new UserUpdateAudit($timestamp);
        });
    }
}
