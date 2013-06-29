<div class="modal-header">
	<h3>Forgot Password?</h3>
	<p>Please enter your email address.</p>
</div>
<div class="modal-body">
	<!-- Flashdata Error -->
	<?php if($this->session->flashdata('error')) : ?>
		<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo $this->session->flashdata('error'); ?>
		</div>
	<?php endif; ?>

	<!-- Validation Errors -->
	<?php if(validation_errors()) : ?>
		<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo validation_errors(); ?>
		</div>
	<?php endif; ?>

	<!-- Forgot Password Form -->
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