# Basic PHPUnit 🧪 introduction with example code

Here you will find the bare minimum to get started to write and execute your first tests with PHPUnit. This requires **
composer** and it is suggested to install it with `--dev` switch calling

```sh
composer require --dev phpunit/phpunit ^10
```

After the installation can be tested with

```shell
./vendor/bin/phpunit --version
```

# 1. Why this repo + documentation links 🙋‍♀️🙋‍♂️

This guide is intended to be a quick and dirty way to get you going with PHPUnit. The main goal is to filter what is
needed to get started. Everything written here is taken from the Documentation itself. This repo provides some code to
take hint from in order to develop your tests and get going. For further information please take a look to
the  [Online Documentation](https://docs.phpunit.de/en/10.0/) or to
the [Official website](https://phpunit.de/index.html).

_**Please do not blindly copy-paste the code but try to use it to understand what is doing**_.

# 2. Performing tests ⚒️

You can perform one test by calling

```shell
./vendor/bin/phpunit --filter ClassnameTest
```

or eveyone defined in `/test` folder calling

```shell
./vendor/bin/phpunit
``` 

## 2.1 Autoload tests 🔃

1. First create a folder called test in the root folder.
    1. Decide if you want to further categorize tests. This will be handy for
       defining [Custom suites](#2.3-organizing-tests-in-suites)
       To do so automatically one of the following condition should occur:

2. Create a file called "someName**Test**" usually the name is composed by the name of the class to test e.g. "someName"
    + "Test"
3. Define the namespace and import and define the class as follows

```php
<? declare(strict_types=1)
...
use PHPUnit\Framework\TestCase;

final class someNameTest extends TestCase{
    ...
}
```

Inside this class we can define all the methods we want to call as tests. To allow the autoload please choose one of the
following option

```php
// Using PHPDoc
/** @test */
public someTestName(){
    ...
}

// Add Test at the end of methodName
public someTestNameTest(){
    ...
}
```

## 2.2 Organizing tests in suites 📂📂📂

Editing the `phpunit.xml` file different suites can be defined. Please take a look at the `phpunit.xml` file in this
repository or in the official documentation. To show available suites you can call

```shell
./vendor/bin/phpunit --list-suites
```

And to execute just one suite with

```shell
./vendor/bin/phpunit --testsuite integration
```

# 3. Passing data to tests with DataProvider 🚌

Sometimes can be useful do be able to pass some dynamic data to a function. To so do you can use a `dataProvider`.

## 3.1 Four way to use a Data Provider in testing 4️⃣
#### 3.1.1 PHP < 8 Using PHPDoc

```php
/**
* @test
* @dataProvider customDataProviderFunctionName
* /
```


#### 3.1.2 PHP >= 8 Using Annotation

```php
#[DataProvider('customDataProviderFunctionName')]
```

#### 3.1.3 PHP < 8 with PHPDoc - file in another namespace / folder

```php
 /**
  * @test
  * @dataProvider \tests\DataProviders\ExampleDataProvider::customDataProviderFunctionName
  */
```

#### 3.1.4 PHP >= 8 Using Annotation - file in another namespace / folder

```php
 #[DataProviderExternal('\tests\DataProviders\ExampleDataProvider','customDataProviderFunctionName')]
```

The PHPDoc/Annotation alone does nothing but executing a loop over the return value of that function. Therefore, a
function with the same name (`customDataProviderFunctionName` in this case) need to be created. Note that in this case
the naming convention is not strict, can be named anything meaningful.

## 3.2 DataProvider must have ☑️

In order to work correctly DataProvider has these requirements:

- be defined as **public**
- be defined as **static**
- return an array of array or an `\Iterable` or something that extend `\Iterable::class`

## 3.3 Organizing DataProviders in folder 📂📂📂

Note that if you are organizing DataProvider in another folder to keep code clean you need to edit `composer.json` and
add some autoload path information for dev environment as follows

```json
{
  "autoload-dev": {
    "psr-4": {
      "tests\\": "tests/"
    }
  }
}
```

After this operation you need to perform this command to update the composer autoloader configuration in order to be
able to import correctly the Classes defined as Data Providers.

```sh
composer dump-autoload
```

# 4. Advanced but useful 🪩🪞

These are used primarily to test certain condition without calling some API, Databases calls or importing a whole class. We can think about them as mirrors that reflect the wanted functionality of the Class to import. But without calling / using that class. 

This can be mandatory in condition like payment and email or SMS send.

## Initialize some classes once per test using Fixtures
The `setUp()` and `tearDown()` template methods are run once for each test method (and on fresh instances) of the test case class.
- setUp() is somehow similar to a test construct in which you can define some classes reused in all tests defined within the class
- tearDown() is callled right before setUp() to clean from the memory what you imported. This is used only in niche condition. 
Those are called even if not defined by the programmer. Fixtures can be shared between classes more info on [Sharing Fixtures Documentation](https://docs.phpunit.de/en/10.0/fixtures.html#sharing-fixture) 
## Mocking - Fake dependency of a class

# 5. Most used methods

```php 
/** @test */
public aAndBareStrictlyEqualsTest(){
    $a = 0;
    $b = false;
    
    ...
    $this->assertEquals($a, $b); // this will pass
    $this->assertSame($a, $b);  // this will fail 
}
```