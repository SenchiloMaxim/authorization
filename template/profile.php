
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



<form method="post" action="index.php?profile">
	<div class="form-group">
		<label>Логин</label>
		<input type="text" name="login" class="form-control" maxlength="55" readonly="readonly" value="<?=$login_user?>">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control" maxlength="55" readonly="readonly" value="<?=$email_user?>">
	</div>
	
	<div class="form-group">
		<label>ФИО</label>
		<input type="text" name="fio" class="form-control" maxlength="200" value="<?=$fio_user?>">
	</div>
	  
	<button type="submit" name="refresh_profile" class="btn btn-primary">Обновить</button>
</form>