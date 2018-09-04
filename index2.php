<?php
    
session_start();

echo $_SESSION['username'];

    $link = mysqli_connect("localhost","root","root","memberapp");
    // サーバー名、データーベースユーザ名、パスワード
    
    if(mysqli_connect_error()){
        die("データベースの接続に失敗しました。");
    }
    
    //$name = "Rob O'Grady";
    //$query = "SELECT = FROM users WHERE name ='".mysqli_real_escape_string($link,$name)."'";

    if(array_key_exists('email',$_POST) OR array_key_exists('password',$_POST)){
        //print_r($_POST);
        //print_r($_POST['email']);
        if($_POST['email'] == ''){
            echo "Eメールアドレスを入力してください";
        } elseif ($_POST['password'] == ''){
            echo "パスワードを入力してください";
        } else {
            $query = "SELECT `id` FROM `users` WHERE `email` = '".mysqli_real_escape_string($link,$_POST['email'])."'";
            $result = mysqli_query($link,$query);
             //print_r($result);
            //echo mysqli_num_rows($result);
            if(mysqli_num_rows($result) > 0){
                echo "すでにそのメールアドレスは使用されています。";
            } else {
                // 未使用の場合の処理を記述
                $query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";
                if(mysqli_query($link,$query)){
                    //echo "登録されました";
                    $_SESSION["email"]=$_POST['email'];
                    header("Location: session.php");
                } else {
                    echo "登録に失敗しました";
                    print_r($result);
                }
                
            }
        }

    }

/*

1. Eメールとパスワードの入力フォーム、「登録する」ボタンを設置する
2. データが入力されているかどうかチェクする
3. メールアドレスが既に使用されていないかチェックする
4. 重複がなければユーザ登録を実行する
5. ユーザ登録に成功しました、というメッセージを表示する。

*/

?>

<form method="post">
    <input name="email" type="text" placeholder="Eメール">
    <input name="password" type="password" placeholder="パスワード">
    <input type="submit" value="登録する">
    
</form>