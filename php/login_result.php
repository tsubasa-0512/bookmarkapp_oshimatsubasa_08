<?php
  session_start();
  include_once "config.php";

  $email = mysqli_real_escape_string($con, $_POST['email']);
  $pwd = mysqli_real_escape_string($con, $_POST['password']);
  
  if(!empty($email) && !empty($pwd)) {
    $sql = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$pwd}'");
    if(mysqli_num_rows($sql) > 0) {
      $row = mysqli_fetch_assoc($sql);
      $status = "オンライン";
      $sql2 =mysqli_query($con, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
      if($sql2) {
        $_SESSION['unique_id'] = $row['unique_id'];
        echo'ログイン成功';
      }
    }else {
      echo "メールアドレスかパスワードが不正な値です"; 
    }
  }else {
    echo "全ての項目の入力が必要です";
  }

?>