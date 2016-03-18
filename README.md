Luhn Validator
==============

Validate a number using the Luhn algorithm (https://en.wikipedia.org/wiki/Luhn_algorithm).

### Examples:

The validator can be used within a PHP application:
```php
$luhnValidator = new \kunalp\LuhnValidator();

$number = '79927398713';

if ($luhnValidator->validate($number)) {
    echo "$number is valid.".PHP_EOL;
} else {
    echo "$number is not valid.".PHP_EOL;
}
```

There is also a CLI wrapper to use it from the command line:

    $ ./bin/luhn 79927398713
    79927398713 is valid.
    $ ./bin/luhn 79927398710
    79927398710 is not valid.

### Run tests:

You can run this library's unit tests by simply running phpunit from the project root.

    $ composer install
    $ ./bin/phpunit