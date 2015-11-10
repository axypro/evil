# axy\evil

* GitHub: [axypro/evil](https://github.com/axypro/evil)
* Composer: [axy/evil](https://packagist.org/packages/axy/evil)

PHP 5.4+

The library does not require any dependencies.

### Evil

#### eval()

```php
Evil::execCode('2 + 2'); // 4
```

#### exit()

```php
Evil::stop(); // exit
Evil::stop(5); // exit with code 5
```

#### breakpoint

```php
breakpoint(string $message [, bool $line [, bool $file [, int $status]);
```

Shows debugging information and terminates the current script (with the status from `$status`).

If specified `$line`: shows the line number of the breakpoint.
For `$file` shows the file name.

```php
Evil::breakpoint('point'); // point
Evil::breakpoint('point', true); // 15: point
Evil::breakpoint('point', true, true); // /path/to/script.php:15: point
```

In CLI mode the `$message` completes new line.
In HTTP mode the `$message` enclosed in `<pre>`.

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
