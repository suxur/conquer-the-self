<!-- Articles Edit -->
<h2><?php echo (!empty($errors['article']) ? $errors['article'] : (empty($article->id) ? 'Add a New Article:' : 'Edit Article: ' . $article->title)); ?></h2>

<!-- Validation Errors -->
<?php if(validation_errors()) : ?>
	<div class="alert alert-box alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<h4>Oops!</h4>
		<?php echo validation_errors(); ?>
	</div>
<?php endif; ?>

<!-- Edit Form -->
<?php echo form_open_multipart(); ?>
	<table class="table">
		<tr>
			<td>Featured:</td>
			<td><?php echo form_checkbox('featured', '1', ($article->featured == 1)); ?></td>
		</tr>
		<tr>
			<td>Staff Pick:</td>
			<td><?php echo form_checkbox('staff_pick', '1', ($article->staff_pick == 1)); ?></td>
		</tr>
		<tr>
			<td>Category:</td>
		<td><?php echo form_dropdown('category_id', array('1' => 'Article', '2' => '7 Days', '3' => 'Tips', '4' => 'Journey'), $article->category_id); ?></td>
		</tr>
		<tr>
			<td>Publication Date:</td>
			<td><?php echo form_input('pubdate', set_value('pubdate', $article->pubdate), 'class="datepicker" required'); ?></td>
		</tr>

		<tr>
			<td>Author:</td>
			<td><?php echo form_input('author', set_value('author', $article->author), 'required'); ?></td>
		</tr>
		<tr>
			<td>Title:</td>
			<td><?php echo form_input('title', set_value('title', $article->title), 'id="title" required'); ?></td>
		</tr>
		<tr>
			<td>Slug:</td>
			<td><?php echo form_input('slug', set_value('slug', $article->slug), 'id="slug" required'); ?></td>
		</tr>
		<tr>
			<td>Upload Image:</td>
			<td>
				<div class="fileupload fileupload-new" data-provides="fileupload">
					<div class="input-append image-upload">
						<div class="uneditable-input">
							<i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"><?php echo $article->filename; ?></span>
						</div>
						<span class="btn btn-file">
							<span class="fileupload-new">Select file</span>
							<span class="fileupload-exists">Change</span>
							<?php echo form_upload('image', '', 'id="input-upload-00"'); ?>
						</span>
					</div>
					<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
					<button id="btn-upload-00" class="btn btn-success fileupload-exists"><i class="icon-upload icon-white"></i> Upload</button>
				</div>
				<div id="response-00"></div>
				<input type="hidden" name="filename" id="filename" value="<?php echo $article->filename; ?>">
			</td>
		</tr>
		<tr>
			<td>Meta Tags:</td>
			<td>
				<?php echo form_input('tags', set_value('tags', $article->tags), 'class="input-xxlarge" id="tags"'); ?>
				<span class="help-block">Enter meta tags in a comma separated list.</span>	
			</td>
		</tr>
		<tr>
			<td>Body:</td>
			<td><?php echo form_textarea('body', set_value('body', $article->body), 'id="textarea"'); ?></td>
		</tr>
		<tr>
			<td></td>
			<td><?php echo form_submit('submit', 'Save', 'class="btn btn-primary"'); ?></td>
		</tr>
	</table>
<?php echo form_close(); ?>

<!-- Crop Modal -->
<div class="modal hide fade" id="crop-modal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>Crop Image</h3>
	</div>
	<div class="modal-body" id="modal-body">
		<img id="img-preview" class="img-preview" src="" alt="">
		<input type="hidden" id="x1" name="x1">
		<input type="hidden" id="y1" name="y1">
		<input type="hidden" id="x2" name="x2">
		<input type="hidden" id="y2" name="y2">
		<input type="hidden" id="w" name="w">
		<input type="hidden" id="h" name="h">
	</div>
	<div class="modal-footer">
		<button type="button" id="btn-crop" class="btn btn-primary">Crop</a>
		<button type="button" class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	</div>
</div>

<!-- Article Scripts -->
<script src="<?php echo site_url('js/articles.edit.js'); ?>"></script>
<script src="<?php echo site_url('js/textarea.js'); ?>"></script>
<script src="<?php echo site_url('js/validation.js'); ?>"></script>