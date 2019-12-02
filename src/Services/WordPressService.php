<?php

namespace WordPressActionsAudit\Services;

class WordPressService
{
    /**
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
    public function log($message)
    {
        /** @noinspection ForgottenDebugOutputInspection */
        error_log($message);
    }
}
