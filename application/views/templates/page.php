<!-- Main Content -->
<div class="span9">
	<article>
		<h2><?php echo e($page->title); ?></h2>
		<p><?php echo $page->body; ?></p>
	</article>
</div>
<!-- Sidebar -->
<div class="span3 sidebar">
	<h2>Recent News</h2>
	<?php $this->load->view('sidebar'); ?>
</div>