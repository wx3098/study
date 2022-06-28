<?php
$err = [];

if(!$username =filter_input(INPUT_POST, 'username')){
    $err[] = '名前を記入して下さい。';
}
if(!$mail = filter_input(INPUT_POST, 'mail')){
    $err[] = 'メールアドレスを記入して下さい';
}
$password = filter_input(INPUT_POST,'password');

if(!preg_match("/\A[a-z\d]{8,100}+\z/i",$password)){
    $err[] = 'パスワードは英数字8文字以上100文字以下にして下さい。';
}
$password_conf = filter_input(INPUT_POST,'password_conf');
if($password !== $password_conf){
    $err[] = '確認用パスワードと異なっています。';
}

if(count($err) === 0){
    UserLogic::createUser();
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録完了画面</title>
</head>
<body>
<?php if(count($err) > 0) :?>
<?php foreach($err as $e) :?>
    <p><?php echo $e ?></p>
    <?php endforeach ?>
    <?php else : ?>
<p>ユーザー登録が完了しました。</p>
<?php endif ?>
<a href="./signup_form.php">戻る</a>
</body>
</html>
