<?php 
	$id = $_GET['id'];
	$time = $_GET['time'];
// var_dump($id);
// var_dump($time);die;
$pdo ="mysql:host=127.0.0.1;dbname=content";
$data=new PDO($pdo,'root','root');

$sql ="UPDATE news SET {$time} = GREATEST({$time}-1,0) WHERE new_id={$id}";
// var_dump($sql);die;
$res =$data->query($sql);
// var_dump($res);die;

if ($res) {
	echo "<script>location.href='show.php'</script>";
}else{
	echo "<script>location.href='show.php'</script>";
}
 ?>