<div id="contactModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h1 id="contactHeader">Contact Us</h1>
	</div>
	<div id="contactBody" class="modal-body">
		<?php echo form_open(); ?>
			<!-- Name Field -->
			<?= form_label('Name <span class="warning hide" id="nameError">*</span>', 'name') ?>
			<?= form_input('name', '', 'id="name"') ?>

			<!-- E-Mail Field -->
			<?= form_label('E-Mail <span class="warning hide" id="emailError">*</span>', 'email') ?>
			<?= form_input('email', '', 'id="email"') ?>

			<!-- Comments Textarea -->
			<?= form_label('Comments <span class="warning hide" id="commentsError">*</span>', 'comments') ?>
			<?= form_textarea('comments', '', 'id="comments"') ?>
			
		<?= form_close() ?>
	</div>
	<div class="modal-footer btn-brown">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button id="btnContact" class="btn btn-primary">Submit</button>
	</div>
</div>