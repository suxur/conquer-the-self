<div class="modal-header">
	<h3>Reset Password</h3>
	<p>Please please enter a new password</p>
</div>
<div class="modal-body">
	<?php if($this->session->flashdata('error')) : ?>
		<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo $this->session->flashdata('error'); ?>
		</div>
	<?php endif; ?>
	<?php echo form_open('', 'class="form-horizontal"'); ?>
		<div class="control-group">
			<label for="username" class="control-label">Password:</label>
			<div class="controls">
				<?php echo form_password('password', '', 'required'); ?>
			</div>
		</div>
		<div class="control-group">
			<label for="password" class="control-label">Confirm Password:</label>
			<div class="controls">
				<?php echo form_password('password_confirm', '', 'required'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<?php echo form_submit('submit', 'Reset', 'class="btn btn-primary btn-login"'); ?>
				<a href="<?php echo site_url('admin/users/login'); ?>" class="btn">Log In</a>
			</div>
		</div>
		<?php

		$data = array(
			'id' 		 => $user->id,
			'first_name' => $user->first_name,
			'last_name'  => $user->last_name,
			'username' 	 => $user->username,
			'email' 	 => $user->email,
			'ip_address' => $this->session->userdata('ip_address')
		);

		echo form_hidden($data);

		?>
	<?php echo form_close(); ?>
</div>
<script src="<?php echo site_url('js/validation.js'); ?>"></script>