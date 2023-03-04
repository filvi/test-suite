# PHPUnit introduction with example code
## Installation
Requires composer and it is suggested to insert it as a --dev dependency by calling
```shell
composer require --dev phpunit/phpunit ^10
```
The installation can be tested with
```shell
./vendor/bin/phpunit --version
```

## Documentation
Eveything can be found in the [Online Documentation](https://docs.phpunit.de/en/10.0/) or in the [Official website](https://phpunit.de/index.html)
## Performing tests
You can perform one test by calling 
```shell
./vendor/bin/phpunit --filter ClassnameTest
```
or eveyone defined in `/test` folder calling 
```shell
./vendor/bin/phpunit
``` 

### Requirements
To do so automatically one of the following condition should occour:

1. prepend to the test in a PHPDOC 
```php 
/** @test */
```
2.  use the naming convention: `whatAmICheckingTest` please note the final `Test`


### Passing data to TestClass with DataProvider
Sometimes can be useful do be able to pass some dynamic data to a function. To so do you can use a `dataProvider`.
```php
/**
* @test
* @dataProvider customDataProviderFunctionName
* /
```
The PHPDoc alone does nothing but executing a loop over the return value of that function. Therefore, a function with the same name (`customDataProviderFunctionName` in this case) need to be created. Note that in this case the naming convention is not strict, can be named anything meaningful.
#### DataProvider must have ⚠️
In order to work correctly DataProvider has 2 requirements:
- be public
- return an array of array or an `\Iterable` or something that extend `\Iterable::class`



### Organizing tests in suites
Editing the `phpunit.xml` file different suites can be defined: to show available one the command is 
```shell
./vendor/bin/phpunit --list-suites
```
And to execute just one suite with 
```shell
./vendor/bin/phpunit --testsuite integration
```

# ⚠️ Reload the autoload for dev
If you made changes to composer.json call
```shell
 composer dump-autoload 
 ```
