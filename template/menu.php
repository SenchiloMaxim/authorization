
<?php if($authorization_check == 0){ ?>
	<a href="<?=$url_link?>/index.php?authorization" class="btn btn-primary">Авторизация</a> <a href="<?=$url_link?>/index.php?registration" class="btn btn-warning">Регистрация</a>
<?php }else{ ?>
	Добро пожаловать <b><?=$fio_user?></b> <a href="index.php?profile" class="btn btn-warning">Профиль</a> <a href="index.php?repass" class="btn btn-info">Пароль</a> <a href="index.php?exit" class="btn btn-danger">Выход</a>
<?php } ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=$url_link?>/index.php">Главная</a></li>
	<?php if(isset($_GET['authorization'])){ ?>
    <li class="breadcrumb-item active">Авторизация</li>
	<?php }elseif(isset($_GET['registration'])){ ?>
	<li class="breadcrumb-item active">Регистрация</li>
	<?php }elseif(isset($_GET['profile'])){ ?>
	<li class="breadcrumb-item active">Профиль</li>
	<?php }elseif(isset($_GET['repass'])){ ?>
	<li class="breadcrumb-item active">Пароль</li>
	<?php }elseif(isset($_GET['exit'])){ ?>
	<li class="breadcrumb-item active">Выход</li>
	<?php } ?>
  </ol>
</nav>