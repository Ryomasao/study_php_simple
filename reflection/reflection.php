<?php
namespace reflection;


Class SampleClass 
{
    public $one = 'one';
    public $two = 'two';

    //Constructor
    public function __construct()
    {

    }

    public function echoOne()
    {
        print $this->one.PHP_EOL;
    }

    public function echoTwo()
    {
        print $this->two.PHP_EOL;
    }

    public static function echoAll()
    {
        $this->echoOne();
        $this->echoTwo();
    }
}

print "load reflaction.php".PHP_EOL;