<!-- Main Content -->
<div class="grid_8">
	<?php if (count($articles)) : ?>
		<?php foreach ($articles as $article) : ?>
			<article class="clearfix">
				<div class="article-img">
					<a href="<?php echo site_url('articles/' . intval($article->id) . '/' . e($article->slug)); ?>"><img src="<?php echo site_url('img/uploads/thumbs/' . $article->filename); ?>" alt="<?php echo $article->filename; ?>"></a>
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
<?php $this->load->view('components/sidebar_head'); ?>
<?php $this->load->view('components/sidebar_articles'); ?>