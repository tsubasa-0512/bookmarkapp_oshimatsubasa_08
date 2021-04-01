<?php
  session_start();
  if(isset($_SESSION['unique_id'])) {
    header("location: users.php");
  }
?>

<?php  include_once "php/header.php" ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>チャットアプリ</header>
      <form action="#" class="pass-show-hide" enctype="multipart/form-data" id="signup">
        <div class="error-msg">
            これは不正な入力です。
        </div>
        <div class="name-detail">
          <div class="field">
            <label>姓</label>
            <input type="text" placeholder="姓" name="lname" required>
          </div>
          <div class="field">
            <label>名</label>
            <input type="text" placeholder="名" name="fname" required>
          </div>
        </div>
          <div class="field">
            <label>メール</label>
            <input type="text" placeholder="メールアドレス" name="email" required>
          </div>
          <div class="field password">
            <label>パスワード</label>
            <input type="password" placeholder="パスワード" name="password" required>
            <i class="fas fa-eye"></i>
          </div>
          <div class="field password">
            <label>確認用パスワード</label>
            <input type="password" placeholder="パスワード" name="password2" required>
          </div>
          <div class="field image">
            <label>画像</label>
            <input type="file" name="img" required>
          </div>
          <div class="field button">
            <input type="submit" value="送信">
          </div>
      </form>
      <div class="link">ログイン済みですか？<a href="login.php">ログインする</a></div>
    </section>
  </div>
</body>
<script src="javascript/pass-show-hide.js"></script>
<script src="javascript/signup.js"></script>
</html>