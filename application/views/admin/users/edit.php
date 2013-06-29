<h2><?php echo empty($user->id) ? 'Add a New User' : 'Edit User'; ?></h2>
<?php echo empty($user->id) ? '' : '<h3>' . $user->first_name . '</h3>'; ?>
<?php echo form_open(); ?>
	<table class="table">
		<tr>
			<td>Group:</td>
			<td>
				<select name="groups">
					<option value="">Select Image:</option>
					<?php foreach ($user->groups as $group) : ?>
						<option value="<?php echo $group['name']; ?>"><?php echo $group['description']; ?></option>
					<?php endforeach; ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Name:</td>
			<td>
				<?php echo form_input('first_name', set_value('first_name', $user->first_name), 'placeholder="First" required'); ?>
				<br>
				<?php echo form_input('last_name', set_value('last_name', $user->last_name), 'class="input-end" placeholder="Last" required'); ?>
			</td>
		</tr>

		<tr>
			<td>Username:</td>
			<td>
				<?php echo form_input('username', set_value('username', $user->username), 'placeholder="Username" required'); ?>
			</td>
		</tr>
		<tr>
			<td>Email:</td>
			<td>
				<?php echo form_input('email', set_value('email', $user->email), 'placeholder="Email" required'); ?>
			</td>
		<tr>
			<td>Password:</td>
			<td>
				<?php echo form_password('password', '', 'placeholder="Password"'); ?>
				<br>
				<?php echo form_password('password_confirm', '', 'class="input-end" placeholder="Confirm Password"'); ?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
		</tr>
	</table>
	<?php echo form_hidden('ip_address', $this->session->userdata('ip_address')); ?>
<?php echo form_close(); ?>
<script src="<?php echo site_url('js/validation.js'); ?>"></script>