<?php
function __autoload($class){
    //根据类名确定文件名
    $file =$class.'DB.class.php';
    if (file_exists($file)) {
        include$file;//引入php文件
    }
}

$news_biao =$_POST['news_biao'];
$news_fen =$_POST['news_fen'];
$news_show =$_POST['news_show'];

$pdo = "mysql:host=127.0.0.1;dbname=month12";
$data = new PDO($pdo,'root','root');

$sql ="insert into news (news_biao,news_fen,,news_show)values ('$news_biao','$news_fen','$news_show')";
echo $sql;die();
$res = $data->query($sql);
var_dump($res);die();
if ($res) {
    echo "<script>alert('添加成功');location.href='show.php'</script>";
}else{
    echo "<script>('添加失败');location.href='news.html'</script>";
}





?>