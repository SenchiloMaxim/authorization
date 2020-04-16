
<?php if($error<>''){ ?>
<div class="alert alert-danger" role="alert">
  <ul>
  <?=$error?>
  </ul>
</div>
<?php } ?>

<?php if($successfully<>''){ ?>
<div class="alert alert-success" role="alert">
  <ul>
  <?=$successfully?>
  </ul>
</div>
<?php } ?>



<form method="post" action="index.php?registration">
	<div class="form-group">
		<label>Логин</label>
		<input type="text" name="login" class="form-control" maxlength="55">
		<small>Минимум 6 символов, разрешается использовать латинские буквы и цифры</small>
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control" maxlength="55">
	</div>
	<div class="form-group">
		<label>Пароль</label>
		<input type="password" name="password" class="form-control">
		<small>Минимум 6 символов</small>
	</div>
	<div class="form-group">
		<label>Повторите Пароль</label>
		<input type="password" name="repassword" class="form-control">
		<small>Минимум 6 символов</small>
	</div>
	<div class="form-group">
		<label>ФИО</label>
		<input type="text" name="fio" class="form-control" maxlength="200">
	</div>
	  
	<button type="submit" name="registration" class="btn btn-primary">Регистрация</button>
</form>