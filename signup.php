<?php
    $db['host'] = "locahost";
    $db['user'] = "root";
    $db['pass'] = "vagrant";
    $db['dbname'] = "loginManagement";

    //Buttonのvalueもpostデータに含まれるのねね
    if(isset($_POST["signup"])){
        echo $_POST["signup"];

        $username = $_POST["userid"];
        $password = $_POST["password"];

        $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

        try{

            $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $stmt = $pdo->prepare("INSERT INTO userData(userid, password) VALUES (?, ?)");

            $stmt->execute(array($username, $password));
            //autoincrementの値を取得する。特にいらない。
            //$userid = $pdo->lastInsertId();

            $signUpMessage = "無事、登録されたよ";

        }catch(PDOException $e){
            $erroMessege = 'DB Insert Erro';
            echo $e->getMessage();
        }

    }else{
        echo "dont push";
    }



    include('signup.html');