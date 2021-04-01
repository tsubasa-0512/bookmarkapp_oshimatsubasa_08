<?php
  session_start();
  include_once "config.php";

  $fname = mysqli_real_escape_string($con, $_POST['fname']);
  $lname = mysqli_real_escape_string($con, $_POST['lname']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $pwd = mysqli_real_escape_string($con, $_POST['password']);
  $pwd2 = mysqli_real_escape_string($con, $_POST['password2']);

  if(!empty($fname) && !empty($lname) && !empty($email) && !empty($pwd) && !empty($pwd2)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $sql = mysqli_query($con, "SELECT email FROM users WHERE email = '{$email}'");
      if(mysqli_num_rows($sql) > 0){
        echo "$email + 既に存在するメールアドレスです";
      }else {
        if($pwd != $pwd2) {
          echo"パスワードが一致しません";
        }else {

          if(isset($_FILES['img'])){
            $img_name = $_FILES['img']['name'];
            $tmp_name = $_FILES['img']['tmp_name'];

            $img_explode = explode('.', $img_name);
            $img_ext =  end($img_explode);
            
            $extensions = ['png','jpeg','jpg'];
            if(in_array($img_ext,$extensions) === true) {
              $time = time();
              $new_img_name = $time.$img_name;

              if(move_uploaded_file($tmp_name, "img/".$new_img_name)) {
                $status = "オンライン";
                $random_id = rand(time(), 10000000);
                
                $sql2 = mysqli_query($con, "INSERT INTO users (unique_id, fname, lname, email, password, img, status) 
                        VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$pwd}', '{$new_img_name}','{$status}')");
                if($sql2) {
                  $sql3 = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}'");
                  if(mysqli_num_rows($sql3) > 0) {
                    $row = mysqli_fetch_assoc($sql3);
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo'登録成功';
                  }
                }else {
                  echo'入力に誤りがあります';
                }
              }
            }else {
              echo'画像ファイルを選択してください';
            }
          }else {
            echo'ファイルを選択してください';
          }
        }
        }
    }else {
      echo "$email + これは不正なメールアドレスです";
    }
  }else {
    echo "全ての項目の入力が必要です";
  }

?>