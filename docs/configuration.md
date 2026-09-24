# Configuration reference

Laravel reads environment settings through the files in `config`. `.env.example` contains development defaults and optional framework integration settings, never production secrets. This website does not use database, mail, Redis, or AWS integrations.

| Environment variable | Configuration key and consumer | Meaning |
| --- | --- | --- |
| `APP_NAME` | `app.name`, `config/app.php` | Application name used by Laravel. The company text lives in the Blade view. |
| `APP_ENV` | `app.env`, `config/app.php` | Runtime environment. Set to `production` on the host. |
| `APP_KEY` | `app.key`, `config/app.php` | Secret encryption key. Generate once and store in host settings. |
| `APP_DEBUG` | `app.debug`, `config/app.php` | Detailed error output. Must be `false` in production. |
| `APP_URL` | `app.url`, `config/app.php` | Base URL used when generating URLs outside a request. Use the deployment's HTTPS URL. |
| `APP_LOCALE`, `APP_FALLBACK_LOCALE` | `app.locale`, `app.fallback_locale`, `config/app.php` | Framework language settings, defaulting to English. |
| `APP_MAINTENANCE_DRIVER` | `app.maintenance.driver`, `config/app.php` | Maintenance-mode storage. Default `file` needs no database. |
| `LOG_CHANNEL`, `LOG_LEVEL` | `logging.default`, channel levels in `config/logging.php` | Log destination and minimum severity. The example sends logs to stderr for hosting platforms. |
| `CACHE_STORE` | `cache.default`, `config/cache.php` | Default `file` cache, requiring writable storage but no database. |
| `SESSION_DRIVER` | `session.driver`, `config/session.php` | Default `array`. Homepage bypasses session middleware and sends no session cookies. |
| `QUEUE_CONNECTION` | `queue.default`, `config/queue.php` | Default `sync`. No background worker is required. |
| `DB_CONNECTION` | `database.default`, `config/database.php` | Unused by this website. Laravel's optional default is SQLite. No migrations are required. |

The example file retains Laravel's optional integration settings for future use. If an integration is enabled, document its actual settings and update the website privacy notice before deployment.

`filesystems.disks.local.serve` in `config/filesystems.php` is `false`. The website exposes no temporary file upload or download routes.
