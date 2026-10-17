<?php

// Lab 2C: Constructors, Constants, and Inheritance

echo '<h1>Lab 2C: User and Tutor Classes</h1>';

function cleanText($value)
{
    // trim() removes spaces from the start and end.
    // preg_replace() replaces any run of spaces inside the text with one space.
    return preg_replace('/\s+/', ' ', trim($value));
}

class User
{
    // A class constant has no $ and cannot be changed.
    public const STATUS_ACTIVE = 'active';

    public $name;
    public $email;
    public $status;

    public function __construct($name, $email)
    {
        $this->name = cleanText($name);
        $this->email = strtolower(cleanText($email));

        // self:: accesses a constant defined in this class.
        $this->status = self::STATUS_ACTIVE;
    }
}

// Tutor inherits name, email, status, and the constructor logic from User.
class Tutor extends User
{
    public $subject;

    public function __construct($name, $email, $subject)
    {
        // Run User's constructor so name, email, and status are set.
        parent::__construct($name, $email);

        $this->subject = cleanText($subject);
    }

    public function profileSummary()
    {
        return "Tutor: $this->name | Email: $this->email | Subject: $this->subject | Status: $this->status";
    }
}

// Sample data includes extra spaces and mixed-case email on purpose
// to show that the constructor cleans them.
$tutor = new Tutor('  Maya    Chen ', '  Maya.Chen@Example.COM ', ' IS 6465   Web Based Applications ');

// htmlspecialchars() escapes the output before it reaches the browser.
echo htmlspecialchars($tutor->profileSummary()) . '<br>';
