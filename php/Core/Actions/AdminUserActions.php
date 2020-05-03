<?php
declare(strict_types=1);

namespace WordPressActionsAudit\Core\Actions;

use DateTime;
use WordPressActionsAudit\Core\Audit\UserUpdateAudit;
use WordPressActionsAudit\Services\Services;
use WordPressActionsAudit\Services\WordPressService;

class AdminUserActions
{
    /**
     * @var WordPressService
     */
    private $wordPressService;

    /**
     * @param Services $services
     */
    public function __construct(Services $services)
    {
        $this->wordPressService = $services->wordPressService();
    }

    public function watchActions(): void
    {
        $this->wordPressService->addAction('profile_update', 10, 1, static function ($userId) {
            $timestamp = new DateTime();
            $audit = new UserUpdateAudit($timestamp);
        });
    }
}
