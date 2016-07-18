# PHPConsistentor

## Content
- [Introduction](#introduction)
- [Installation](#installation)
- [Getting Started](#getting_started)

<a name="introduction"></a>
## Introduction

One of the worst things of PHP is its lack of consistency in function names, even between similar/related functions:

```php
<?php

/*
 * Some functions use underscores (_) to separate words
 * while other similar functions don't
 */
gettype("foo");            // No separation between words
get_class(new stdClass()); // Words separated by underscores

/*
 * Other functions mix `to` with 2
 */
bin2hex("foo");    // 2
strtolower("FOO"); // to
```

This library provides a quick and simple fix for those issues, it's as easy to use as this:

```php
<?php
/**
 * Load PHPConsistentor
 */
require_once("PHPConsistentor.php");

// Call `PHPConsistentor::init` with the preferred settings
PHPConsistentor::init([
    "word_separation" => PHPConsistentor::WORD_SEPARATION_UNDERSCORE,
    "word_cut"        => PHPConsistentor::WORD_CUT_NO_CUT,
    "to_2"            => PHPConsistentor::TO_2_TO,
]);

get_type("foo");           //gettype
get_class(new stdClass()); //get_class

binary_to_hexadecimal("foo"); //bin2hex
string_to_lowercase("FOO");   //strtolower
new_line_to_br("f
o
o");                          //nl2br
```

And that's all, now you can code without worrying about function names consistency.

<a name="installation"></a>
## Installation

You can either download it directly through github, composer or by downloading [Alexya Framework](https://github.com/manulaiko/alexya)

### Manual installation

To manual install `PHPConsistentor` just clone this repository (or [download the latest release]()) and include the file in your PHP script:

```php
<?php
/**
 * Load PHPConsistentor
 */
require_once("path/to/PHPConsistentor.php");

// Pretty hard, right?
```

### Composer

The easiest way is probably install it through composer, so just add the followin lines to your `composer.php` file and execute `composer update`:

```json
{
    "require": {
        "manulaiko/phpconsistentor": "^1.0"
    }
}

```

### Alexya Framework

`PHPConsistentor` comes prebuild with the latest [Alexya Framework]() version and is located under the namespace `\Alexya\PHPConsistentor`:

```php
<?php
/**
 * Load Alexya's core
 */
require_once("bootstrap.php");

\Alexya\PHPConsistentor::init([
    "word_separation" => PHPConsistentor::WORD_SEPARATION_UNDERSCORE,
    "word_cut"        => PHPConsistentor::WORD_CUT_NO_CUT,
    "to_2"            => PHPConsistentor::TO_2_TO,
]);
```

<a name="getting_started"></a>
## Getting Started

Getting started with `PHPConsistentor` is as easy as including the `PHPConsistentor.php` file in your script and calling the `PHPConsistentor::init` method.

This method will automatically add the aliases of the function based on the configuration array (which is sent as a parameter).

The array may contain the followin indexes:

```php
<?php
/**
 * Load PHPConsistentor
 */
require_once("PHPConsistentor.php");

/**
 * PHPConsistentor's configuration array
 */
$configuration = [
    /**
     * The way on which word separation will look.
     *
     * Possible values:
     *
     * - `PHPConsistentor::WORD_SEPARATION_UNDERSCORE`
     *       Separates the words with underscores like `get_class()`
     * - `PHPConsistentor::WORD_SEPARATION_NO_SEPARATION`
     *       Don't separates the words like `getclass()`
     * - `PHPConsistentor::WORD_SEPARATION_CAMEL_CASE`
     *       Separates the words with camelCase like `getClass()`
     */
    "word_separation" => PHPConsistentor::WORD_SEPARATION_UNDERSCORE, //Default

    /**
     * The way on which words will be cutted
     *
     * Possible values:
     *
     * - `PHPConsistentor::WORD_CUT_NO_CUT`
     *       Don't cuts the words like `binary2hexadecimal()`
     * - `PHPConsistentor::WORD_CUT_CUT`
     *       Conserves the default word cuts like `bin2hex()`
     */
    "word_cut" => PHPConsistentor::WORD_CUT_CUT, // Default

    /**
     * The way on which `2`, `to` functions should look
     *
     * Possible values:
     *
     * - `PHPConsistentor::TO_2_TO`
     *        Translates `2` functions to `to` functions like `nltobr()`
     *
     * - `PHPConsistentor::TO_2_2`
     *       Translates `to` functions to `2` functions like `str2lower()`
     */
    "to_2" => PHPConsistentor::TO_2_TO // Default
];

PHPConsistentor::init($configuration);
```

If you're using `PHPConsistentor` through the [Alexya Framework](https://github.com/manulaiko/alexya) the default
settings can be edited in `config/alexya.php` under the `PHPConsistentor` index.git
