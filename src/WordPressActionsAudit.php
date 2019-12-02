<?php

namespace WordPressActionsAudit;

use WordPressActionsAudit\Actions\AdminUserActions;
use WordPressActionsAudit\Services\Services;

class WordPressActionsAudit
{
    /**
     * @var AdminUserActions
     */
    private $adminUserActions;

    /**
     * @param Services $services
     */
    public function __construct($services)
    {
        $this->adminUserActions = new AdminUserActions($services);
    }

    public function load(): void
    {
        $this->adminUserActions->watchActions();
    }
}
