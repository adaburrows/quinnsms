<div class="content">
	<h1>Account</h1>
	<form action="account.html" method="post">
		<fieldset>
			<p>
			<label for="name">Class Name:</label>
			<input type="text" id="name" name="name" value="<?=$name?>"/>
			</p>

			<ul id="phonelist">
<?php		foreach($users as $i => $user): ?>
				<li>
					<label class="phone" ><?=$user['sms_number']?>:</label>
					<input type="text" class="phone" name="user[<?=$user['id']?>]" value="<?=$user['name']?>" />
					<input type="checkbox" name="delete[<?=$user['id']?>]" class="delete" id="label_<?=$i?>"/>
					<label class="delete" for="label_<?=$i?>">Delete</label>
				</li>
<?php		endforeach; ?>
			</ul>

			<p>
			<input type="hidden" name="update" value="Update" />
			<input type="submit" value="Update" />
			</p>
		</fieldset>
	</form>
</div>