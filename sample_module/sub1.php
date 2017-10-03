<?php
namespace sub1;
function getGreeting(){
    return 'ohansub1';
}



class Car{
    public static function staticHoge(){
        echo 'this is static Hoge'.PHP_EOL;
    }

    public function normalHoge(){
        echo 'this is normalHoge'.PHP_EOL;
    }

    private function privateHoge(){
        echo 'this is private Hoge'.PHP_EOL;
    }

    protected function protectedHoge(){
        echo 'this is protected  public Hoge'.PHP_EOL;
    }
}