<?php

namespace Glowie\Plugins\Sentry;

use Config;
use Env;
use Throwable;
use Glowie\Core\Plugin;

/**
 * Sentry integration plugin for Glowie Framework.
 * @category Plugin
 * @package glowieframework/sentry
 * @author Glowie
 * @copyright Copyright (c) Glowie
 * @license MIT
 * @link https://glowie.gabrielsilva.dev.br
 */
class Sentry extends Plugin
{
    /**
     * Initializes the plugin.
     */
    public function register()
    {
        // Checks for the DSN setting
        $dsn = Env::get('SENTRY_DSN');
        if (empty($dsn) || $dsn === 'false') return;

        // Setup Sentry
        \Sentry\init([
            'dsn' => $dsn,
            'environment' => Config::get('env', Env::get('APP_ENV', 'development')),
            'sample_rate' => floatval(Env::get('SENTRY_SR', 1.0))
        ]);
    }

    /**
     * Captures an exception and sends it to Sentry.
     * @param Throwable $th An exception to be captured.
     */
    public static function capture(Throwable $th)
    {
        return \Sentry\captureException($th);
    }
}
