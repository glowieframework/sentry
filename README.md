## Sentry for Glowie
This plugin integrates [Sentry](https://sentry.io) error profiler with your Glowie application.

## Installation
Install in your Glowie project using Composer:

```shell
composer require glowieframework/sentry
```

Then add the Sentry class to the `app/config/Config.php` file, into the `plugins` array:

```php
'plugins' => [
    // ... other plugins here
    \Glowie\Plugins\Sentry\Sentry::class,
],
```

## Configuration
Create a **PHP** project in Sentry, then copy the _DSN URL_ and paste it in your application `.env` file.

```env
SENTRY_DSN=https://mysentryapp.ingest.us.sentry.io/123456
```

## Credits
Sentry plugin and Glowie are currently being developed by [Gabriel Silva](https://gabrielsilva.dev.br).