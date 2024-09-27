<?php

namespace Glowie\Plugins\Sentry;

use Config;
use Env;
use Glowie\Core\Exception\PluginException;
use Glowie\Core\Plugin;

/**
 * Sentry integration plugin for Glowie Framework.
 * @category Plugin
 * @package glowieframework/sentry
 * @author Glowie
 * @copyright Copyright (c) Glowie
 * @license MIT
 * @link https://gabrielsilva.dev.br/glowie
 */
class Sentry extends Plugin
{
    /**
     * Initializes the plugin.
     */
    public function register()
    {
        // Checks for the DSN setting
        if (empty(Env::get('SENTRY_DSN'))) throw new PluginException('Sentry plugin requires the SENTRY_DSN env setting');

        // Setup Sentry
        \Sentry\init([
            'dsn' => Env::get('SENTRY_DSN'),
            'environment' => Config::get('env', Env::get('APP_ENV', 'development')),
            'sample_rate' => floatval(Env::get('SENTRY_SR', 1.0))
        ]);
    }
}
