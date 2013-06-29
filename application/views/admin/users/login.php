<div class="modal-header">
	<h3>Log In</h3>
	<p>Please log in using your credentials.</p>
</div>
<div class="modal-body">
	<?php if($this->session->flashdata('error')) : ?>
		<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo $this->session->flashdata('error'); ?>
		</div>
	<?php endif; ?>
	<?php if($this->session->flashdata('success')) : ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo $this->session->flashdata('success'); ?>
		</div>
	<?php endif; ?>
	<?php if(validation_errors()) : ?>
		<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo validation_errors(); ?>
		</div>
	<?php endif; ?>
	
	<?php echo form_open('', 'class="form-horizontal"'); ?>
		<div class="control-group">
			<label for="username" class="control-label">Username:</label>
			<div class="controls">
				<?php echo form_input('username'); ?>
			</div>
		</div>
		<div class="control-group">
			<label for="password" class="control-label">Password:</label>
			<div class="controls">
				<?php echo form_password('password'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<?php echo form_submit('submit', 'Log In', 'class="btn btn-primary btn-login"'); ?>
				<a href="<?php echo site_url('admin/users/forgot_password'); ?>" class="btn">Forgot Password?</a>
			</div>
		</div>
	<?php echo form_close(); ?>
</div>