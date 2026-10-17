<?php

// Lab 2: PHP Expressions and Control Structures

echo '<h1>Lab 2A: Expressions and Control Structures</h1>';

// 1. Expressions and Operators
echo '<h2>1. Expressions and Operators</h2>';

$x = -5;

// y = 3(abs(2x) + 4)
// abs() returns the absolute value, so abs(2 * -5) = abs(-10) = 10.
// The parentheses force the addition to happen before the multiplication.
$y = 3 * (abs(2 * $x) + 4);

echo "The value of y is: $y<br>";

// 2. Boolean Comparisons
echo '<h2>2. Comparisons</h2>';

// var_dump() shows both the type and the value, so true/false is visible.
var_dump(2 > 1);     // bool(true)
echo '<br>';
var_dump(2 == 3);    // bool(false)
echo '<br>';
var_dump("5" == 5);  // bool(true):  == compares values after type juggling
echo '<br>';
var_dump("5" === 5); // bool(false): === also requires the same type (string vs. int)
echo '<br>';

// 3. Unary Operators
echo '<h2>3. Unary Operators</h2>';

$c = 5;

$negative = -$c;   // unary minus flips the sign
$positive = +$c;   // unary plus leaves the value as a number
$preIncrement = ++$c; // pre-increment adds 1 to $c first, then returns the new value

echo "Unary minus: $negative<br>";
echo "Unary plus: $positive<br>";
echo "Pre-increment result: $preIncrement<br>";
echo "\$c after incrementing: $c<br>";

// 4. Operator Precedence
echo '<h2>4. Operator Precedence</h2>';

$withoutParentheses = 2 + 3 * 4;  // * runs before +, so 2 + 12 = 14
$withParentheses = (2 + 3) * 4;   // parentheses run first, so 5 * 4 = 20

echo "2 + 3 * 4 = $withoutParentheses<br>";
echo "(2 + 3) * 4 = $withParentheses<br>";

// 5. Assignment Associativity
echo '<h2>5. Assignment Associativity</h2>';

// Assignment is right-associative: $time = 0 runs first,
// then $score gets that result, then $level gets that result.
$level = $score = $time = 0;

echo "Level: $level<br>";
echo "Score: $score<br>";
echo "Time: $time<br>";

// 6. Equality and Assignment
echo '<h2>6. Equality and Assignment</h2>';

$first = 10;       // = assigns a value
$second = 10;
$third = '10';     // same value, but a string
$fourth = 20;

var_dump($first == $second);  // bool(true):  same value
echo '<br>';
var_dump($first === $third);  // bool(false): same value, different type
echo '<br>';
var_dump($first == $third);   // bool(true):  == ignores the type difference
echo '<br>';
var_dump($first == $fourth);  // bool(false): different values
echo '<br>';

// 7. Logical Operators
echo '<h2>7. Logical Operators</h2>';

$a = 1;
$b = 0;

var_dump($a && $b); // bool(false): AND needs both sides to be true
echo '<br>';
var_dump($a || $b); // bool(true):  OR needs only one side to be true
echo '<br>';
var_dump(!$a);      // bool(false): NOT reverses true to false
echo '<br>';

// 8. Scholarship Decision with if...else
echo '<h2>8. Scholarship Decision with if...else</h2>';

$gpa = 3.59;

if ($gpa >= 3.5) {
    echo "GPA $gpa: The student receives a scholarship.<br>";
} else {
    echo "GPA $gpa: The student does not receive a scholarship.<br>";
}

// 9. Scholarship Decision with if...elseif...else
echo '<h2>9. Scholarship Decision with if...elseif...else</h2>';

// The highest threshold is checked first. Once one condition is true,
// PHP skips the remaining branches.
if ($gpa >= 3.7) {
    echo "GPA $gpa: Full scholarship.<br>";
} elseif ($gpa >= 3.5) {
    echo "GPA $gpa: Partial scholarship.<br>";
} else {
    echo "GPA $gpa: No scholarship.<br>";
}

// 10. Access Status
echo '<h2>10. Access Status</h2>';

$status = 'pending';

switch ($status) {
    case 'approved':
        echo 'Access approved. Welcome!<br>';
        break;
    case 'pending':
        echo 'Your access request is pending review.<br>';
        break;
    default:
        echo 'Access denied.<br>';
        break;
}

// 11. While Loop
echo '<h2>11. While Loop</h2>';

$fuel = 10;

// The condition is checked before each repetition.
// Decreasing $fuel each time is what eventually ends the loop.
while ($fuel > 1) {
    echo "Fuel level $fuel: There is enough fuel<br>";
    $fuel--;
}

echo "Fuel level $fuel: Time to refuel.<br>";

// 12. Multiplication Table
echo '<h2>12. Multiplication Table</h2>';

// for (start; condition; update)
for ($i = 1; $i <= 12; $i++) {
    $product = 12 * $i;
    echo "12 x $i = $product<br>";
}
