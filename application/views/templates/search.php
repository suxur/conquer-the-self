<!-- Main Content -->
<div class="grid_8">
	<h2><?php echo isset($articles) ? 'Search Results' : 'No Results Found'; ?></h2>
	<?php if (isset($articles)) : ?>
		<?php foreach ($articles as $article) : ?>
			<article class="clearfix">
				<div class="article-img">
					<img src="<?php echo site_url('img/uploads/thumbs/' . $article->filename); ?>" alt="">
				</div>
				<div class="article-content">
					<?php echo get_excerpt($article); ?>
				</div>
				<?php if ($article->featured == TRUE) : ?>
					<div class="ribbon-corner"></div>
				<?php endif; ?>
			</article>
		<?php endforeach; ?>
	<?php endif; ?>
	<?php if (isset($pagination)) : ?>
		<section class="pagination pagination-right"><?php echo $pagination; ?></section>
	<?php endif; ?>
</div>

<!-- Sidebar -->
<div class="span3 sidebar">
	<h2>Recent News</h2>
	<?php $this->load->view('sidebar'); ?>
</div>