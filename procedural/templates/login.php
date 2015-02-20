<!doctype html>
<html>
	<head> 
		<meta charset="utf-8"/>
		<title>Регистрация</title> 
		
		<style>
			.error, .success {
				font-size: 14px;
				
				padding: 8px;
			}
			
			.error {
				background-color: #fee;
				color: #800;
			}
			
			.success {
				background-color: #efe;
				color: #080;
			}
		</style>
	</head>
	
	<body>
		<h1>Регистрация нового пользователя:</h1>
		<?php if (is_string($error)): ?> 
		<div class="error"><?php echo $error ?></div>
		<?php elseif ($error === true): ?> 
		<div class="success">Регистрация прошла успешно!</div>
		<?php endif; ?> 
		<form method="post">
			<p>
				Логин: <input type="text" name="username" maxlength="20">
			</p>
		
			<p>
				Пароль: <input type="password" name="password" maxlength="20">
			</p>

			<button>Отправить</button>
		</form>
	</body>
</html>