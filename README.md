# axy\evil

* GitHub: [axypro/evil](https://github.com/axypro/evil)
* Composer: [axy/evil](https://packagist.org/packages/axy/evil)

PHP 5.4+

The library does not require any dependencies.

## Purposes

Some language features are not recommended for frequent use.
`eval()`, `exit`, global variables, direct access to super-global arrays.

But sometimes it is necessary.
If you use static code analyzer, it will swear.
We'll have to suppress messages.

```php
/** @SuppressWarnings(PHPMD.Superglobals) */
$x = $_POST['x'];
```

This library encapsulates the "evil" features.
You simply call methods and disclaims any sin.

## API

Classes are in the namespace `axy\evil`.

### Evil

It contains calls of "evil" functions.
So how `exit`, `echo` and etc is keywords methods have other names.

#### eval - execCode

```php
Evil::execCode('2 + 2'); // 4
```

#### exit - stop

```php
Evil::stop(); // exit
Evil::stop(5); // exit with code 5
```

#### breakpoint()

```php
breakpoint(mixed $message [, bool $line [, bool $file [, int $status]);
```

Shows debugging information and terminates the current script (with the status from `$status`).

If `$message` is not a scalar then used `print_r()`.

If specified `$line`: shows the line number of the breakpoint.
For `$file` shows the file name.

```php
Evil::breakpoint('point'); // point
Evil::breakpoint('point', true); // 15: point
Evil::breakpoint('point', true, true); // /path/to/script.php:15: point
```

In CLI mode the `$message` completes new line.
In HTTP mode the `$message` enclosed in `<pre>`.

#### echo - out

```php
Evil::out($message);
```

Sends a string to the stdout stream.

### Superglobals

Static methods of `axy\evil\Superglobals`:

* `getSERVER()`
* `getGET()`
* `getPOST()`
* `getREQUEST()`
* `getCOOKIE()`
* `getFILES()`
* `getSESSION()`
* `getENV()`

Return the corresponding superglobals arrays.
The data is returned by reference.

```php
$session = Supeglobals::getSESSION();
$session['var'] = 'value'; // no effect

$session = &Supeglobals::getSESSION();
$session['var'] = 'value'; // success
```

### Globals

Static methods:

* `getGLOBALS()`: returns `$_GLOBALS` by reference
* `get($name [, $default])`: returns the value of a global variable (or `$default` if the variable not found)
* `set($name, $value)`: set
* `remove($name)`: unset
