<?php
/**-----------------------------------------------------------------------------
 *
 * Author URI:      https://danieltedman.com
 * Author:          Daniel Tedman
 * Description:     A WordPress plugin that makes a permanent record of actions that occur on the platform for the purpose of auditing them at a later stage.
 * Plugin Name:     WordPress Actions Audit
 * Plugin URI:      https://github.com/dbtedman/wordpress-actions-audit
 * Text Domain:     wordpress-actions-audit
 * Version:         0.0.0
 *
 *----------------------------------------------------------------------------*/

use WordPressActionsAudit\WordPressActionsAudit;

// Load external PHP modules from composer. Modules are installed in the project
// root and linked into the theme when docker compose runs.
include_once(__DIR__ . '/vendor/autoload.php');

$plugin = new WordPressActionsAudit();
