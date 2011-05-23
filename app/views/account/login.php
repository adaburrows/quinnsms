<div class="content">
	<h1>Login</h1>
	<form action="<?php echo site_url('account/login')?>" method="post">
		<fieldset>
			<p>
			<label for="phone_number">Phone Number:</label>
			<input type="text" id="phone_number" name="phone_number" />
			</p>

			<p>
			<label for="code">Verification Code:</label>
			<input type="text" id="code" name="code" />
			</p>

			<p>
			<input type="submit" name="login" value="Login" />
			</p>
		</fieldset>
	</form>
</div>