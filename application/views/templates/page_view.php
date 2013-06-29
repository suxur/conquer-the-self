<!-- Main Content -->
<div class="grid_8">
	<article>
		<h1><?php echo e($page->title); ?></h1>
		<hr>
		<p><?php echo $page->body; ?></p>
	</article>
</div>

<!-- Sidebar -->
<?php $this->load->view('components/sidebar_head'); ?>
<?php $this->load->view('components/sidebar'); ?>