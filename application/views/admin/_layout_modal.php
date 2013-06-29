<?php $this->load->view('admin/components/page_head'); ?>
	
	<body class="modal-view">
		<div class="modal show" role="dialog">
			<!-- Subview is set in controller -->
			<?php $this->load->view($subview); ?>
			<div class="modal-footer">
				&copy; <?php echo $meta_title; ?>
			</div>
		</div>

<?php $this->load->view('admin/components/page_tail'); ?>