## Sentry for Glowie

Sentry for Glowie is a plugin that seamlessly integrates [Sentry](https://sentry.io) error tracking and monitoring into your Glowie application.

## Installation

Install the plugin in your Glowie project using Composer:

```shell
composer require glowieframework/sentry
```

Then register the Sentry plugin in the `plugins` array inside `app/config/Config.php`:

```php
'plugins' => [
    // ... other plugins here
    \Glowie\Plugins\Sentry\Sentry::class,
],
```

## Configuration

Create a **PHP project** in your Sentry dashboard.
Copy the provided **DSN URL** and add it to your application’s `.env` file:

```env
SENTRY_DSN=https://mysentryapp.ingest.us.sentry.io/123456
```

Once configured, you can verify the integration by throwing an exception in your application and checking whether it appears in your Sentry dashboard.

## Credits

The Sentry plugin and Glowie framework are currently developed by [Gabriel Silva](https://gabrielsilva.dev.br).
