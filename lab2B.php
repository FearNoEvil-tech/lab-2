<?php

// Lab 2B: PHP Functions and Basic Objects

echo '<h1>Lab 2B: Functions and Objects</h1>';

// 1. Function with Parameters and Return Value
echo '<h2>1. Function with Parameters and Return Value</h2>';

function formatName($first, $middle, $last)
{
    // strtolower() makes every letter lowercase,
    // then ucfirst() capitalizes only the first letter.
    $first = ucfirst(strtolower(trim($first)));
    $middle = ucfirst(strtolower(trim($middle)));
    $last = ucfirst(strtolower(trim($last)));

    return "$first $middle $last";
}

echo formatName('mARIA', 'eLENA', 'CHEN') . '<br>';

// 2. Function That Returns an Array
echo '<h2>2. Function That Returns an Array</h2>';

function cleanNameParts($first, $middle, $last)
{
    // A function can return only one value, so the three
    // cleaned parts are returned together as one array.
    return [
        ucfirst(strtolower(trim($first))),
        ucfirst(strtolower(trim($middle))),
        ucfirst(strtolower(trim($last))),
    ];
}

$nameParts = cleanNameParts('  jAMES ', 'lEE', 'pARK  ');

echo 'First name from the array: ' . $nameParts[0] . '<br>';
echo 'Last name from the array: ' . $nameParts[2] . '<br>';

// 3. Variable Scope
echo '<h2>3. Variable Scope</h2>';

$first = 'Maria';
$last = 'Chen';

function buildFullName()
{
    // Variables created outside a function are not visible inside it.
    // The global keyword gives this function access to them.
    global $first, $last;

    return "$first $last";
}

echo 'Using global: ' . buildFullName() . '<br>';

function buildFullName2($first, $last)
{
    // These $first and $last are local parameters. They are separate
    // variables that happen to share the global variables' names.
    return "$first $last";
}

echo 'Using parameters: ' . buildFullName2('David', 'Lopez') . '<br>';

// Passing values as parameters is the preferred approach: the function
// depends only on what it receives, not on outside variables.

// 4. Static Variable
echo '<h2>4. Static Variable</h2>';

function nextTicketNumber()
{
    // A static variable is initialized only once and keeps its value
    // between calls. A normal local variable would reset to 0 every time.
    static $ticket = 0;
    $ticket++;

    return $ticket;
}

echo 'Ticket #' . nextTicketNumber() . '<br>';
echo 'Ticket #' . nextTicketNumber() . '<br>';
echo 'Ticket #' . nextTicketNumber() . '<br>';

// 5. User Class
echo '<h2>5. User Class</h2>';

class User
{
    public $name;
    public $email;

    public function display()
    {
        // $this refers to the object the method was called on.
        return $this->name;
    }
}

$user = new User();                 // create an object from the class
$user->name = 'Maria Chen';         // -> accesses a property
$user->email = 'maria.chen@example.com';

echo 'User name: ' . $user->display() . '<br>';

// 6. Constructor and Password Hashing
echo '<h2>6. Constructor and Password Hashing</h2>';

class User2
{
    public $name;
    private $passwordHash;

    // __construct() runs automatically when the object is created with new.
    public function __construct($name, $password)
    {
        $this->name = $name;

        // password_hash() stores a one-way, salted hash, never the
        // plain-text password. PASSWORD_DEFAULT uses bcrypt.
        $this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
    }
}

$user2 = new User2('James Park', 'SamplePassword123');

// print_r() shows the object's structure. It displays the private hash here
// only for this demonstration; a real application would never print it.
echo '<pre>';
print_r($user2);
echo '</pre>';
