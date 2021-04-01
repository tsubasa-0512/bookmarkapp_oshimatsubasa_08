<?php
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/52f56e28a7.js" crossorigin="anonymous"></script>
  <script src="https://cdn.webrtc.ecl.ntt.com/skyway-4.4.1.js"></script>
  <title>チャットアプリ</title>
</head>
<body>
  <?php
    include_once "php/config.php";
    $user_id = mysqli_real_escape_string($con, $_GET["user_id"]);
    
    $sql = mysqli_query($con, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
    if(mysqli_num_rows($sql) > 0) {
    $row = mysqli_fetch_assoc($sql);
    }

    $sql2 = mysqli_query($con, "SELECT * FROM users WHERE unique_id = {$user_id}");
    if(mysqli_num_rows($sql2) > 0) {
    $row2 = mysqli_fetch_assoc($sql2);
    }
    
  ?>
  <div class="video-view" style="display: flex; background: #fff; padding: 20px;">
    <div class="each-view" style="margin: 5px;">
      <div style="display: flex;">
        <a href="chat.php?user_id=<?php echo $user_id; ?>" class="back-profile"><i class="fas fa-arrow-left"></i></i></a>
        <img src="php/img/<?php echo $row['img'] ?>" style="
          width: 50px;
          height: 50px;
          border-radius: 50%;
          margin: 0 15px;
        ">
        <div class="details">
          <span style=" font-size: 17px; font-weight: 500;"><?php echo $row['lname']." ".$row['fname'] ?></span>
          <p><?php echo $row['status'] ?></p>
        </div>
      </div>
      <video id="my-video" width="400px" autoplay muted playsinline></video>
      <p>以下のキーを相手に共有してください</p>
      <p id="my-id"></p>
      <div style="display: flex; align-items: center;">
        <textarea id="their-id" 
        style="
          box-sizing: border-box;
          height: 30px;
          margin: 5px 0;
          color: #333;
          border: solid 1px #8A6BBE;
          border-radius: 6px;
          outline: 0;
          resize: none;
          ">
        </textarea>
        <button id="make-call"
        style="
          display: inline-block;
          height: 30px;
          padding: 4px;
          margin-left: 10px;
          font-size: 0.8em;
          color: #8A6BBE;
          text-decoration: none;
          user-select: none;
          border: 1px #8A6BBE solid;
          border-radius: 3px;
          cursor: pointer; ">
        発信</button>
      </div>
    </div>
    <div class="each-view" style="margin: 5px;">
      <div style="display: flex;">
        <img src="php/img/<?php echo $row2['img'] ?>" style="
          width: 50px;
          height: 50px;
          border-radius: 50%;
          margin: 0 15px;
        ">
        <div class="details">
          <span style=" font-size: 17px; font-weight: 500;"><?php echo $row2['lname']." ".$row2['fname'] ?></span>
          <p><?php echo $row2['status'] ?></p>
        </div>
      </div>
      <video id="their-video" width="400px" autoplay muted playsinline></video>
    </div>
  </div>
</body>
<script src="https://cdn.webrtc.ecl.ntt.com/skyway-4.4.1.js"></script>
<script src="javascript/video.js"></script>
</html>