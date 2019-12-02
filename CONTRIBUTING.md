# [WordPress Actions Audit](./README.md) / Contributing

-   [Continuous Integration](#continuous-integration)
-   [Code Formatting](#code-formatting)
-   [Help IDE](#help-ide)
-   [Test](#test)
-   [Integration](#integration)
-   [Publishing](#publishing)

## Continuous Integration

Provided by [GitHub Actions](https://github.com/dbtedman/wordpress-actions-audit/actions?workflow=Test), run on every commit and pull request.

## Code Formatting

Code formatting support provided by [Prettier](https://prettier.io/) and [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer).

```bash
yarn format && composer run-script format
```

Additional formatting assistance is provided by [Php Inspections ​(EA Extended)​](https://plugins.jetbrains.com/plugin/7622-php-inspections-ea-extended-) plugin during development.

## Help IDE

Help IDE understand WordPress functions by downloading a copy of the source code into the `./temp/wordpress` directory so that IDE can index it.

```bash
./bin/help-ide
```

## Test

Tested using [PHPUnit](https://phpunit.de/), using test cases defined in the `src/` directory matching `*Test.php` pattern.

```bash
composer run-script test
```

## Integration

The plugin is loaded into a [Docker](https://www.docker.com/) environment to validate WordPress integration points.

```bash
./bin/local
```

Changes are then immediately reflected inside the local running environment, accessed at [http://localhost:8080](http://localhost:8080).

For interacting with the admin interface for the plugin visit the WordPress Admin [http://localhost:8080/wp-admin/plugins.php](http://localhost:8080/wp-admin/plugins.php).

-   Username: `admin`
-   Password: `admin`

## Publishing

> Content to come.
