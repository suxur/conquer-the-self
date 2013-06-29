<!-- Pages Edit -->
<h2><?php echo (!empty($errors['page']) ? $errors['page'] : (empty($page->id) ? 'Add a New Page:' : 'Edit Page: ' . $page->title)); ?></h2>

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
			<td>Parent:</td>
			<td><?php echo form_dropdown('parent_id', $pages_no_parents, $this->input->post('parent_id') ? $this->input->post('parent_id') : $page->parent_id); ?></td>
		</tr>
		<tr>
			<td>Template:</td>
			<td><?php echo form_dropdown('template', array('page' => 'Page', 'archive' => 'Archive', 'homepage' => 'Homepage'), $this->input->post('template') ? $this->input->post('template') : $page->template); ?></td>
		</tr>
		<tr>
			<td>Title:</td>
			<td><?php echo form_input('title', set_value('title', $page->title, 'required')); ?></td>
		</tr>
		<tr>
			<td>Slug:</td>
			<td><?php echo form_input('slug', set_value('slug', $page->slug)); ?></td>
		</tr>
		<tr>
			<td>Body:</td>
			<td><?php echo form_textarea('body', set_value('body', $page->body), 'id="textarea"'); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
		</tr>
	</table>
<?php echo form_close(); ?>

<script src="<?php echo site_url('js/textarea.js'); ?>"></script>
<script src="<?php echo site_url('js/validation.js'); ?>"></script>