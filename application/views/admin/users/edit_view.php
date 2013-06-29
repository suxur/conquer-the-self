<!-- Users Edit -->
<h2><?php echo (!empty($errors['user']) ? $errors['user'] : (empty($user->id) ? 'Add a New User:' : 'Edit User: ' . $user->first_name . ' ' . $user->last_name)); ?></h2>

<!-- Validation Errors -->
<?php if(validation_errors()) : ?>
	<div class="alert alert-box alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4>Oops!</h4>
		<?php echo validation_errors(); ?>
	</div>
<?php endif; ?>

<!-- Edit Form -->
<?php echo form_open(); ?>
	<table class="table">
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

<!-- User Scripts -->
<script src="<?php echo site_url('js/validation.js'); ?>"></script>