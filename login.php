<?php  include_once "php/header.php" ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>チャットアプリ</header>
      <form action="#" class="pass-show-hide" id="login">
        <div class="error-msg">
            これは不正な入力です。
        </div>
          <div class="field">
            <label>メール</label>
            <input type="text" name="email" placeholder="メールアドレス">
          </div>
          <div class="field password">
            <label>パスワード</label>
            <input type="password" name="password" placeholder="パスワード">
            <i class="fas fa-eye"></i>
          </div>
          <div class="field button">
            <input type="submit" value="送信">
          </div>
      </form>
      <div class="link">アカウントをお持ちでない方はこちらから</br><a href="signup.php">登録する</a></div>
    </section>
  </div>
</body>
<script src="javascript/pass-show-hide.js"></script>
<script src="javascript/login.js"></script>
</html>