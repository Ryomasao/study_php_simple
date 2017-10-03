<?php
namespace sub2;
function getGreeting(){
    return 'ohansub2';
}

 class Human{
    protected $name;
    static protected $class_name = "tarou";

    public function __construct(string $name){
        $this->name = $name;
    }

    public static function answerStaticName(){
        //staticで定義したプロパティにはselfでアクセスする。
        echo self::$class_name.PHP_EOL;
    }

    public function answerInstanceName(){
        //staticで定義したプロパティにはselfでアクセスする。
        echo $this->name.PHP_EOL;
    }

    public static function changeClassName(string $name){
        self::$class_name = $name;
    }

}