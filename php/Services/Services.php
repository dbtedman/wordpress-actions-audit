<?php
declare(strict_types=1);

namespace WordPressActionsAudit\Services;

class Services
{
    /**
     * @var WordPressService
     */
    private $wordPressService;

    public function __construct()
    {
        $this->wordPressService = new WordPressService();
    }

    public function wordPressService(): WordPressService
    {
        return $this->wordPressService;
    }
}
