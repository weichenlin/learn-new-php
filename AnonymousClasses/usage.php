<?php
/**
 * require php 7.0
 */

$anonObj = new class
{
    public function __toString()
    {
        return "My First Anonymous Class";
    }
}; // Don't forgot the semicolon like this

echo $anonObj, "\n";


/**
 * constructor and argument
 */
$namedObj = new class("Bob") // "Bob" is argument for constructor
{
    protected $name;

    public function __construct(string $name) // here we got "Bob"
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
};

echo 'name of $namedObj is ', $namedObj->getName(), "\n";


/**
 * can do extend as normal class
 */
$child = new class extends stdClass
{
    /* do something */
};

echo 'is $child instanceof stdClass? ', $child instanceof stdClass ? "true" : "false", "\n";


/**
 * traits works as well
 */
trait Hello
{
    public function sayHelloTo($name)
    {
        echo "Hello $name", "\n";
    }
}

$traitObj = new class
{
    use Hello;
};
$traitObj->sayHelloTo("Alice");