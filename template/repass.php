
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



<form method="post" action="index.php?repass">
	
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
	
	  
	<button type="submit" name="refresh_profile" class="btn btn-primary">Обновить</button>
</form>