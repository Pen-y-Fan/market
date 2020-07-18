# Market

Based on a code along of [Code School: From Form to Table with Laravel](https://app.pluralsight.com/library/courses/code-school-from-form-to-table-with-laravel/table-of-contents)

- The majority of the code along is complete, with the exception to the final demo, which had a bootstrap layout.
- Instead of finishing the code along I wrote testes:
  - To prove the **Farm** and **Market** relationship is working
  - Test what happens if a market is deleted after a relationship was made.

## Installation

This is a laravel 7 project, the installation is similar to laravel.

The project uses:

- [PHP 7.2+](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org)

Recommended:

- [Git](https://git-scm.com/downloads)

Clone the repository

```sh
git clone git@github.com:pen-y-fan/market.git
```

or

```shell script
git clone https://github.com/pen-y-fan/market.git
```

Install all the dependencies using composer:

```sh
cd .\market
composer install
```

Configure **.env**, e.g.

```shell script
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=market
DB_USERNAME=root
DB_PASSWORD=
```

Run the tests:

```shell script
composer test
```

**Note:** the tests run using sqlite in memory, the `pdo_sqlite` extension needs to be enabled.

## Dependencies

The project uses composer to install:

- [PHPUnit](https://phpunit.de/)
- [PHPStan](https://github.com/phpstan/phpstan)
- [Easy Coding Standard (ECS)](https://github.com/symplify/easy-coding-standard) 
- [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer/wiki)

## Folders

Project files and folders of note.

- `app` 
    - Contains the **Farm** and **Market** model class
- `app/Http/Controllers`
    - Contains the **FarmController** and **MarketController**
- `views`
    - `farms`, `markets` and `layouts` blade templates
- `routes`
   - **web.php** routing file
- `tests/Feature` 
    - **FarmTest** confirms the relationship between Farm and Market

## Testing

PHPUnit can be used to run tests, to help this can be run using a composer script. To run the unit tests, from the root of
 the project run:

```shell script
composer test
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias pu="composer test"`), the same
 PHPUnit `composer test` can be run:

```shell script
pu
```

## Code Standard

Easy Coding Standard (ECS) is used to check for style and code standards,
 **[PSR-12](https://www.php-fig.org/psr/psr-12/)** is used. Tip: Only periodically run ECS, when tests are green, to
 keep the focus on writing tests, refactoring the code and adding new features.

### Check Code

To check code, but not fix errors:

```shell script
composer check-cs
``` 

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias cc="composer check-cs"`), the
 same ECS `composer check-cs` can be run:

```shell script
cc
```

### Fix Code

ECS provides many code fixes, if advised to run --fix, the following script can be run:

```shell script
composer fix-cs
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias fc="composer fix-cs"`), the same
 ECS `composer fix-cs` can be run:

```shell script
fc
```

## Static Analysis

PHPStan is used to run static analysis checks. As the code is constantly being refactored only run static analysis
  checks once the chapter is complete. Tip: Only periodically run PHPStan, when tests are green, to keep the focus on
   writing tests, refactoring the code and adding new features.

```shell script
composer phpstan
```

On Windows a batch file has been created, similar to an alias on Linux/Mac (e.g. `alias ps="composer phpstan"`), the
 same PHPStan `composer phpstan` can be run:

```shell script
ps
```
