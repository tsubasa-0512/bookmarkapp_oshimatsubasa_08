<?php 
  $con = mysqli_connect('localhost', 'root', '',  'chat');
  if(!$con){
    echo '接続に失敗しました。'.mysqli_connect_error();
 }

?>