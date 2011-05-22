<div class="content">
	<h1>Account</h1>
	<form action="account.html" method="post">
		<fieldset>
			<p>
			<label for="name">Class Name:</label>
			<input type="text" id="name" name="name" />
			</p>

			<ul id="phonelist">
				<li><label class="phone" >(555) 555-5555:</label> <input type="text" class="phone" name="phone[]" value="First Last"/> <input type="checkbox" name="delete[514]" class="delete" id="label_1"/> <label class="delete" for="label_1">Delete</label></li>
				<li><label class="phone" >(555) 555-5555:</label> <input type="text" class="phone" name="phone[]" value="First Last"/> <input type="checkbox" name="delete[213]" class="delete" id="label_2"/> <label class="delete" for="label_2">Delete</label></li>
				<li><label class="phone" >(555) 555-5555:</label> <input type="text" class="phone" name="phone[]" value="First Last"/> <input type="checkbox" name="delete[123]" class="delete" id="label_3"/> <label class="delete" for="label_3">Delete</label></li>
			</ul>

			<p>
			<input type="submit" name="update" value="Update" />
			</p>
		</fieldset>
	</form>
</div>