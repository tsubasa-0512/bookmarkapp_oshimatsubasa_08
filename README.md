# bookmarkapp_oshimatsubasa_08
【大まかな機能の流れ】
①会員登録
signup.php：入力フォーム
↓
javascript/signup.js：非同期処理
↓
signup_result.php：メールアドレスの妥当性、パスワード一致等のバリデーション、DBへのユーザ情報登録等
↓（会員登録成功）
users.php
↓
users.js：500ミリ秒毎に「php/users_data.php」をかませてユーザ状態を更新

②ログイン
login.php：入力フォーム
↓
javascript/login.js：非同期処理
↓
login_result.php：パスワード一致等のバリデーション
↓（会員登録成功）
users.php

③チャット
users.php
↓
chat.php：チャット画面
↓
chat.js：500ミリ秒毎に「php/get-chat.php」をかませてチャットログを更新
↓(入力送信)
insert-chat.php：非同期で送信内容をDBに保存
↓
chat.php：チャット画面

その他
pass-show-hide.js：会員登録・ログイン時のパスワード可視化
chat.sql：スキーマ
video.php：ビデオ通話機能。skyway使用（チャット経由でビデオ画面下のkeyを相手に共有し、相手がそれを画面下のフォームから発信することで双方向の通話が可能）
