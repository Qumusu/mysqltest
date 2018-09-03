<?php
$link = mysqli_connect("localhost","root","root","memberapp");
// サーバー名、データベース名、パスワード

if(mysqli_connect_error()){
    die("データベースへの接続に失敗しました。");
}

$query = "SELECT * FROM users";

if($result = mysqli_query($link,$query)){
    echo "クエリの発行に成功しました";
}
$row = mysqli_fetch_array($result);

//print_r($row);

echo "あなたのメールアドレスは".$row['email']."、パスワードは".$row['password']."です。";

echo "<p>";

echo "あなたのメールアドレスは".$row['1']."、パスワードは".$row['2']."です。";

echo "<p>";

echo "あなたのIDは".$row['id']."です。";





/*else{
    echo "データベースへの接続に成功しました。";
};
*/
?>