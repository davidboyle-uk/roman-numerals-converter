Roman Numerals
==============

PHP class which converts both integers to roman numerals, and roman numerals to integers

# Assumptions

1. from the given RomanNumerals interface, PHP 7 is a requirement in order to utilise scalar type hinting
1. The task at hand will already have been solved, find the best possible example and improve / adapt
1. PSR2 is an acceptable coding standard

# Approach

1. Keep things simple, no autoloader required
1. Write sufficient unit tests wihtout spending too much time
1. Validation of input parameters is handled by dedicated methods rather than within the main parse / generate functions

## Running tests

1. php composer.phar update
1. ./vendor/bin/phpunit --configuration phpunit.xml --coverage-html coverage-report
1. ./vendor/bin/phpcs src

# Resources Used

1. https://getcomposer.org/download/
1. https://phpunit.de/
1. https://github.com/squizlabs/PHP_CodeSniffer
1. https://en.wikipedia.org/wiki/Roman_numerals
1. https://stackoverflow.com/questions/14994941/numbers-to-roman-numbers-with-php
1. https://stackoverflow.com/questions/6265596/how-to-convert-a-roman-numeral-to-integer-in-php
1. https://stackoverflow.com/questions/267399/how-do-you-match-only-valid-roman-numerals-with-a-regular-expression