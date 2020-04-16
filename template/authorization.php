
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



<form method="post" action="index.php?authorization">
	<div class="form-group">
		<label>Логин</label>
		<input type="text" name="login" class="form-control" maxlength="55">
		<small>Минимум 6 символов, разрешается использовать латинские буквы и цифры</small>
	</div>
	<div class="form-group">
		<label>Пароль</label>
		<input type="password" name="password" class="form-control">
		<small>Минимум 6 символов</small>
	</div>
	  
	<button type="submit" name="authorization" class="btn btn-primary">Войти</button>
</form>