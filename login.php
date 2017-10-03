<?php
    session_start();

    $db['host'] = "locahost";
    $db['user'] = "root";
    $db['pass'] = "vagrant";
    $db['dbname'] = "loginManagement";

    //Buttonのvalueもpostデータに含まれるのねね
    if(isset($_POST["login"])){
        echo $_POST["login"];

        $userid = $_POST["userid"];
        $password = $_POST["password"];

        $dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

        try{

            $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $stmt = $pdo->prepare("SELECT * FROM userData WHERE userid = ?");

            $stmt->execute(array($userid));
            
            //IDがユニークじゃないので複数あった
            /*
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo $row['userid'].":".$row['password']."<br/>";
            }
            */
            if($row = $stmt ->fetch(PDO::FETCH_ASSOC)){
                if( $password == $row['password']) {
                    echo "ok";
                    //メインページにリダイレクトする
                    //こう書くみたいだよ
                    header("Location:mainpage.php");

                }else{
                    echo "NG";
                }
            }

        }catch(PDOException $e){
            $erroMessege = 'DB select Erro';
            echo $e->getMessage();
        }

    }else{
        echo "dont push";
    }


    include('./login.html')
?>
