<?php
/**
 * require php 7.0, some feature need php 7.1
 * valid types: array, bool, callable, class name, float, int, interface name, self, string, void
 * all code here are valid
 */

function return_array(): array
{
    return [];
}
return_array();


function return_bool(): bool
{
    return false;
}
return_bool();


function return_callable(): callable
{
    /**
     * lambda can declare return type as well
     */
    return function (): int {
        return 0;
    };
}
return_callable();


function return_class(): stdClass
{
    return new stdClass;
}
return_class();


function return_float(): float
{
    return 1.23;
}
return_float();


function return_int(): int
{
    return 456;
}
return_int();


/**
 * just pick a interface for demo
 */
class MyCountable implements countable
{
    public function count()
    {
        return 0;
    }
}

function return_interface(): countable
{
    return new MyCountable;
}
return_interface();


/**
 * can declare on class method too
 */
class MyClass
{
    // here self equal to MyClass
    public function getInstance(): self
    {
        return new MyClass(); // or return $this
    }
}
(new MyClass)->getInstance();


function return_string(): string
{
    return "a string";
}
return_string();


/**
 * void return type require php 7.1.0
 * if running on 7.0.x, php will raise fatal error
 * - PHP Fatal error:  Uncaught TypeError: Return value of return_void() must be an instance of void, none returned
 */
if (version_compare(PHP_VERSION, '7.1.0') >= 0) {
    /**
     * void type are checked at compile time
     */
    function return_void(): void
    {
        return; // or no return
    }
    return_void();
}


/**
 * if return value can convert to the return type, it's also valid
 * http://php.net/manual/en/language.types.type-juggling.php
 */
function return_as_string($var): string
{
    return $var;
}
return_as_string(123);
return_as_string(1.23);

class ClassToString
{
    function __toString()
    {
        return "";
    }
}
return_as_string(new ClassToString);


function return_as_int($var): int
{
    return $var;
}
return_as_int("10 dogs"); // PHP Notice:  A non well formed numeric value encountered
echo gettype(return_as_int("30 pigs")), "\n"; // integer


/**
 * generator can only declared as Generator, Iterator or Traversable
 */
function return_generator(): Generator
{
    yield "";
}
return_generator();