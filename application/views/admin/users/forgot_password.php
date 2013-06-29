<div class="modal-header">
	<h3>Forgot Password?</h3>
	<p>Please enter your email address.</p>
</div>
<div class="modal-body">
	<p class="text-error"><?php echo $this->session->flashdata('error'); ?></p>
	<?php echo validation_errors(); ?>
	<?php echo form_open('', 'class="form-horizontal"'); ?>
		<div class="control-group">
			<label for="email" class="control-label">Email:</label>
			<div class="controls">
				<?php echo form_input('email'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<?php echo form_submit('submit', 'Submit', 'class="btn btn-primary btn-login"'); ?>
				<a href="<?php echo site_url('admin/users/login'); ?>" class="btn">Return</a>
			</div>
		</div>
	<?php echo form_close(); ?>
</div>