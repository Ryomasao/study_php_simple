<?php

class SimpleClass
{
//property
public $name  = 'ayane';
//privateはこれでいいみたい
private $private_name  = 'ayane';


//method
//自身のインスタンスを参照するには$thisをつける。ちょっと罠がありそうだけれども。
public function displayVar(){
    echo $this->name .PHP_EOL;
}

}





/**
*インスタンス作成例
**/
$instance  = new SimpleClass();
$instance2 = $instance;
$instance->displayVar();
$instance2->name = 'mirin';
$instance->displayVar();
$instance2->displayVar();

/**
*あえてのここで別ファイルを参照してみる。
*/
require_once './sample_module/sub1.php';
require_once './sample_module/sub2.php';
require_once './sample_module/sub3.php';
require_once './sample_module/sub4.php';
require_once './sample_module/sub5.php';

echo sub1\getGreeting().PHP_EOL;
echo sub2\getGreeting().PHP_EOL;

echo module1\common\sub3\getGreeting().PHP_EOL;
echo module1\common\sub4\getGreeting().PHP_EOL;

use module1 as m;

echo m\common\sub3\getGreeting().PHP_EOL;

$sampleClass = new m\common\sub5\pref;

echo $sampleClass->getPref().PHP_EOL;


//asがなくてもこれでいける。
//as キーワードを省略すると、一番右にある非修飾名でインポートすることができます
use module1\common;
$sampleClass2 = new common\sub5\pref;
echo $sampleClass2->getPref().PHP_EOL;


//これが重要かも、クラスのインポート


//namespaceがある場合のクラスの作成(useを使わない)

$sampleClass3 = new sub1\Car;
$sampleClass3->staticHoge();
$sampleClass3->normalHoge();
//privateMethodは呼べない
//$sampleClass3->privateHoge();
//protectedMethodは呼べない
//$sampleClass3->protectedHoge();

/*
*privateはそのクラス自身だけ、protectedは継承したクラスもいける。両方外部からのアクセスはできない。
*/


//クラスメソッドっぽくstaticなメソッドを呼んでみる。
sub2\human::answerStaticName();
sub2\human::changeClassName("konsome");
sub2\human::answerStaticName();

$sampleClass4 = new sub2\Human("konbu");
$sampleClass4->answerInstanceName();


require_once './sample_module/sub6.php';


//useで先にインポートしておいてつかう。
//asを省略すると一番右の名前が修飾子として使われる。
//require_once()で読み込んだら、クラスを簡単につかえるとおもったけれども、namespaceをきっている場合は、インポートしなきゃいけないってことなのかな
use module1\common\sub6\SampleClass1;
$sampleClass5 = new SampleClass1();
$sampleClass5->speak();

//インスタンス作成時にかっこつけてもつけなくてもいのね。
$sampleClass6 = new SampleClass1;
$sampleClass6->speak();

//namespaceがないクラス
require_once './sample_module/sub7.php';
$sampleClass7 = new SampleClass3();
$sampleClass7->speak();

//話がそれたけれども、useはこんな感じもいける。

use module1\common\sub6\{
SampleClass2,
SampleClass3
};


$sampleClass8 = new SampleClass2();
$sampleClass8->speak();



//リフレクションをためしてみよう
require_once './reflection/reflection.php';

use reflection\{
SampleClass
};

$A = new SampleClass();
$A->echoOne();


//リフレクションは、ReflectionCassでクラス情報を読み込んで、そっからnewInstance()でインスタンスを作成するんだよ。

$reflector = new ReflectionClass('reflection\SampleClass');
$reflectorClass = $reflector->newInstance();
$reflectorClass->echoOne();

require __DIR__.'/reflection/reflection2.php';

$reflClass = new ReflectionClass('Entity\User');

echo sprintf("%-20s: %s\n", 'getName', $reflClass->getName());
echo sprintf("%-20s: %s\n", 'getNamespaceName', $reflClass->getNamespaceName());
echo sprintf("%-20s: %s\n", 'getShortName', $reflClass->getShortName());
echo sprintf("%-20s: %s\n", 'getFileName', $reflClass->getFileName());


//ここでは配列の勉強をしよう。
require __DIR__.'/functionArg/sample1.php';


?>

<!doctype html>
    <h1><a href="./mainpage.php">メインページ</a></h1>
    <h1><a href="./login.php">ログイン</a></h1>
</html>
