<?php
/**
 * here are all invalid code
 * you can uncomment code by remove the # to see errors
 */

/**
 * can not return null if type are declared
 */
function can_not_return_null(): stdClass
{
    return null;
}
// PHP Fatal error:  Uncaught TypeError: Return value of can_not_return_null() must be an instance of stdClass, null returned
#can_not_return_null();

/**
 * void return type require php 7.1.0
 * if running on 7.0.x, php will raise fatal error
 * - PHP Fatal error:  Uncaught TypeError: Return value of return_void() must be an instance of void, none returned
 */
if (version_compare(PHP_VERSION, '7.1.0') >= 0) {
    function even_void_can_not_return_null(): void
    {
        // PHP Fatal error:  A void function must not return a value (did you mean "return;" instead of "return null;"?)
        // because void type are checked at compile time, so I comment this line
        #return null;
    }
}


/**
 * generator can only declared as Generator, Iterator or Traversable
 * checked at compile time, will raise fatal error
 * - PHP Fatal error:  Generators may only declare a return type of Generator, Iterator, Traversable, or iterable, array is not permitted
 */
function return_generator()#: array
{
    yield "";
}

