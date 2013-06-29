	<!-- Main Content -->
	<div class="grid_8">
		<?php if (isset($articles[0]->id)) : ?>
		<article class="clearfix">
			<div class="article-img">
				<a href="<?php echo site_url('articles/' . intval($articles[0]->id) . '/' . e($articles[0]->slug)); ?>"><img src="img/uploads/thumbs/<?php echo $articles[0]->filename; ?>" alt="<?php echo $articles[0]->filename; ?>"></a>
			</div>
			<div class="article-content">
				<?php echo get_excerpt($articles[0]); ?>
			</div>
			<?php if ($articles[0]->featured == TRUE) : ?>
				<div class="ribbon-corner"></div>
			<?php endif; ?>
		</article>
		<?php endif; ?>
		<?php if (isset($articles[1]->id)) : ?>
		<article class="clearfix">
			<div class="article-img">
				<a href="<?php echo site_url('articles/' . intval($articles[1]->id) . '/' . e($articles[1]->slug)); ?>"><img src="img/uploads/thumbs/<?php echo $articles[1]->filename; ?>" alt="<?php echo $articles[1]->filename; ?>"></a>
			</div>
			<div class="article-content">
				<?php echo get_excerpt($articles[1]); ?>
			</div>
			<?php if ($articles[1]->featured == TRUE) : ?>
				<div class="ribbon-corner"></div>
			<?php endif; ?>
		</article>
		<?php endif; ?>
		<?php if (isset($articles[2]->id)) : ?>
		<article class="clearfix">
			<div class="article-img">
				<a href="<?php echo site_url('articles/' . intval($articles[2]->id) . '/' . e($articles[2]->slug)); ?>"><img src="img/uploads/thumbs/<?php echo $articles[2]->filename; ?>" alt="<?php echo $articles[2]->filename; ?>"></a>
			</div>
			<div class="article-content">
				<?php echo get_excerpt($articles[2]); ?>
			</div>
			<?php if ($articles[2]->featured == TRUE) : ?>
				<div class="ribbon-corner"></div>
			<?php endif; ?>
		</article>
		<?php endif; ?>
	</div>

	<!-- Sidebar -->
	<?php $this->load->view('components/sidebar_head'); ?>
	<?php $this->load->view('components/sidebar_home'); ?>
</div>

<?php if (isset($articles[3]->id)) : ?>
<div class="container_12 features">
	<div class="grid_12 features-line"></div>
	<div class="grid_4">
		<div class="feature">
			<div class="img_resize">
				<a href="<?php echo site_url('articles/' . intval($articles[3]->id) . '/' . e($articles[3]->slug)); ?>"><img src="img/uploads/<?php echo $articles[3]->filename; ?>" alt="<?php echo $articles[3]->filename; ?>"></a>
			</div>
			<h1><?php echo strtoupper($articles[3]->category); ?></h1>
			<h4><a href="<?php echo site_url('articles/' . intval($articles[3]->id) . '/' . e($articles[3]->slug)); ?>"><?php echo $articles[3]->title; ?></a></h4>
			<p><?php echo strip_tags(limit_to_numwords($articles[3]->body, 10));?><a href="<?php echo site_url('articles/' . intval($articles[3]->id) . '/' . e($articles[3]->slug)); ?>"> {...}</a></p>
		</div>
	</div>
	<?php if (isset($articles[4]->id)) : ?>
	<div class="grid_4">
		<div class="feature">
			<div class="img_resize">
				<a href="<?php echo site_url('articles/' . intval($articles[4]->id) . '/' . e($articles[4]->slug)); ?>"><img src="img/uploads/<?php echo $articles[4]->filename; ?>" alt="<?php echo $articles[4]->filename; ?>"></a>
			</div>
			<h1><?php echo strtoupper($articles[4]->category); ?></h1>
			<h4><a href="<?php echo site_url('articles/' . intval($articles[4]->id) . '/' . e($articles[4]->slug)); ?>"><?php echo $articles[4]->title; ?></a></h4>
			<p><?php echo strip_tags(limit_to_numwords($articles[4]->body, 10));?><a href="<?php echo site_url('articles/' . intval($articles[4]->id) . '/' . e($articles[4]->slug)); ?>"> {...}</a></p>
		</div>
	</div>
	<?php endif; ?>
	<?php if (isset($articles[5]->id)) : ?>
	<div class="grid_4">
		<div class="feature">
			<div class="img_resize">
				<a href="<?php echo site_url('articles/' . intval($articles[5]->id) . '/' . e($articles[5]->slug)); ?>"><img src="img/uploads/<?php echo $articles[5]->filename; ?>" alt="<?php echo $articles[5]->filename; ?>"></a>
			</div>
			<h1><?php echo strtoupper($articles[5]->category); ?></h1>
			<h4><a href="<?php echo site_url('articles/' . intval($articles[5]->id) . '/' . e($articles[5]->slug)); ?>"><?php echo $articles[5]->title; ?></a></h4>
			<p><?php echo strip_tags(limit_to_numwords($articles[5]->body, 10));?><a href="<?php echo site_url('articles/' . intval($articles[5]->id) . '/' . e($articles[5]->slug)); ?>"> {...}</a></p>
		</div>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
<?php if (isset($articles[6]->id)) : ?>
<div class="container_12 features">
	<div class="grid_12 features-line"></div>
	<div class="grid_4">
		<div class="feature">
			<div class="img_resize">
				<a href="<?php echo site_url('articles/' . intval($articles[6]->id) . '/' . e($articles[6]->slug)); ?>"><img src="img/uploads/<?php echo $articles[6]->filename; ?>" alt="<?php echo $articles[6]->filename; ?>"></a>
			</div>
			<h1><?php echo strtoupper($articles[6]->category); ?></h1>
			<h4><a href="<?php echo site_url('articles/' . intval($articles[6]->id) . '/' . e($articles[6]->slug)); ?>"><?php echo $articles[6]->title; ?></a></h4>
			<p><?php echo strip_tags(limit_to_numwords($articles[6]->body, 10));?><a href="<?php echo site_url('articles/' . intval($articles[6]->id) . '/' . e($articles[6]->slug)); ?>"> {...}</a></p>
		</div>
	</div>
	<?php if (isset($articles[7]->id)) : ?>
	<div class="grid_4">
		<div class="feature">
			<div class="img_resize">
				<a href="<?php echo site_url('articles/' . intval($articles[7]->id) . '/' . e($articles[7]->slug)); ?>"><img src="img/uploads/<?php echo $articles[7]->filename; ?>" alt="<?php echo $articles[7]->filename; ?>"></a>
			</div>
			<h1><?php echo strtoupper($articles[7]->category); ?></h1>
			<h4><a href="<?php echo site_url('articles/' . intval($articles[7]->id) . '/' . e($articles[7]->slug)); ?>"><?php echo $articles[7]->title; ?></a></h4>
			<p><?php echo strip_tags(limit_to_numwords($articles[7]->body, 10));?><a href="<?php echo site_url('articles/' . intval($articles[7]->id) . '/' . e($articles[7]->slug)); ?>"> {...}</a></p>
		</div>
	</div>
	<?php endif; ?>
	<?php if (isset($articles[8]->id)) : ?>
	<div class="grid_4">
		<div class="feature">
			<div class="img_resize">
				<a href="<?php echo site_url('articles/' . intval($articles[8]->id) . '/' . e($articles[8]->slug)); ?>"><img src="img/uploads/<?php echo $articles[8]->filename; ?>" alt="<?php echo $articles[8]->filename; ?>"></a>
			</div>
			<h1><?php echo strtoupper($articles[8]->category); ?></h1>
			<h4><a href="<?php echo site_url('articles/' . intval($articles[8]->id) . '/' . e($articles[8]->slug)); ?>"><?php echo $articles[8]->title; ?></a></h4>
			<p><?php echo strip_tags(limit_to_numwords($articles[8]->body, 10));?><a href="<?php echo site_url('articles/' . intval($articles[8]->id) . '/' . e($articles[8]->slug)); ?>"> {...}</a></p>
		</div>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>