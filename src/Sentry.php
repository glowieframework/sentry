<?php

namespace Glowie\Plugins\Sentry;

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
        if (!Env::has('SENTRY_DSN')) throw new PluginException('Sentry plugin requires the SENTRY_DSN env setting');

        \Sentry\init([
            'dsn' => Env::get('SENTRY_DSN'),
            'traces_sample_rate' => floatval(Env::get('SENTRY_TRACES_SAMPLE_RATE', 1.0)),
            'profiles_sample_rate' => floatval(Env::get('SENTRY_PROFILES_SAMPLE_RATE', 1.0)),
        ]);
    }
}
