<?php

namespace WordPressActionsAudit;

use WordPressActionsAudit\Actions\AdminUserActions;
use WordPressActionsAudit\Services\WordPressService;

class WordPressActionsAudit
{
    /**
     * @var AdminUserActions
     */
    private $adminUserActions;

    public function __construct()
    {
        $wordPressService = new WordPressService();
        $this->adminUserActions = new AdminUserActions($wordPressService);
    }

    public function load()
    {
        $this->adminUserActions->watchActions();
    }
}
