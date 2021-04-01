<?php
  session_start();
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>

<?php  include_once "php/header.php" ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
      <?php
        include_once "php/config.php";
        $sql = mysqli_query($con, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
        if(mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        }
      ?>
        <div class="content">
          <img src="php/img/<?php echo $row['img'] ?>" alt="">
          <div class="details">
            <span><?php echo $row['lname']." ".$row['fname'] ?></span>
            <p><?php echo $row['status'] ?></p>
          </div>
        </div>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']?>>" class="logout">ログアウト</a>
      </header>
      <div class="search">
        <span class="text">チャットするユーザーを選ぶ</span>
        <input type="text" placeholder="名前を入れてください">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="user-list">
      </div>
    </section>
  </div>
</body>
<script src="javascript/users.js"></script>
</html>