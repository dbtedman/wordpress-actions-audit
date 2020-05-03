<?php
declare(strict_types=1);

namespace WordPressActionsAudit\Services;

class WordPressService
{
    /**
     * @see https://developer.wordpress.org/reference/functions/add_action/
     * @param string $name
     * @param int $priority
     * @param int $acceptedArgs
     * @param callable $callable
     */
    public function addAction($name, $priority, $acceptedArgs, $callable): void
    {
        add_action($name, $callable, $priority, $acceptedArgs);
    }

    /**
     * @param $message
     */
    public function log($message): void
    {
        /** @noinspection ForgottenDebugOutputInspection */
        error_log($message);
    }

    /**
     * @see https://developer.wordpress.org/reference/functions/add_menu_page/
     * @param string $pageTitle
     * @param string $menuTitle
     * @param string $capability
     *      @see https://wordpress.org/support/article/roles-and-capabilities/
     * @param string $menuSlug
     * @param callable|null $callable
     * @param string|null $iconURL
     * @param int|null $position
     */
    public function addMenuPage(
        $pageTitle,
        $menuTitle,
        $capability,
        $menuSlug,
        $callable = null,
        $iconURL = null,
        $position = null
    ): void {
        add_menu_page($pageTitle, $menuTitle, $capability, $menuSlug, $callable, $iconURL, $position);
    }
}
