<!-- Main Content -->
<div class="grid_8">
	<article class="clearfix">
		<div class="article-img">
			<img src="img/uploads/thumbs/<?php echo $articles[0]->filename; ?>" alt="">
		</div>
		<div class="article-content">
			<?php echo get_excerpt($articles[0]); ?>
		</div>
		<?php if ($articles[0]->featured == TRUE) : ?>
			<div class="ribbon-corner"></div>
		<?php endif; ?>
	</article>
	<article class="clearfix">
		<div class="article-img">
			<img src="img/uploads/thumbs/<?php echo $articles[1]->filename; ?>" alt="">
		</div>
		<div class="article-content">
			<?php echo get_excerpt($articles[1]); ?>
		</div>
		<?php if ($articles[1]->featured == TRUE) : ?>
			<div class="ribbon-corner"></div>
		<?php endif; ?>
	</article>
	<article class="clearfix">
		<div class="article-img">
			<img src="img/uploads/thumbs/<?php echo $articles[2]->filename; ?>" alt="">
		</div>
		<div class="article-content">
			<?php echo get_excerpt($articles[2]); ?>
		</div>
		<?php if ($articles[2]->featured == TRUE) : ?>
			<div class="ribbon-corner"></div>
		<?php endif; ?>
	</article>
</div>


<!-- Sidebar -->
<?php $this->load->view('sidebar'); ?>
	</div>
		<div class="container_12 features">
			<div class="grid_12 features-line"></div>
			<div class="grid_4">
				<div class="feature">
					<div class="img_resize">
						<img src="img/uploads/<?php echo $articles[0]->filename; ?>" alt="">
					</div>
					<h1>Articles</h1>
					<p>Because they taste fucking awesome and are good for you! <a href="#">{...}</a></p>
				</div>
			</div>
			<div class="grid_4">
				<div class="feature">
					<div class="img_resize">
						<img src="img/uploads/<?php echo $articles[1]->filename; ?>" alt="">
					</div>
					<h1>Articles</h1>
					<p>Because they taste fucking awesome and are good for you! <a href="#">{...}</a></p>
				</div>
			</div>
			<div class="grid_4">
				<div class="feature">
					<div class="img_resize">
						<img src="img/uploads/<?php echo $articles[2]->filename; ?>" alt="">
					</div>
					<h1>Articles</h1>
					<p>Because they taste fucking awesome and are good for you! <a href="#">{...}</a></p>
				</div>
			</div>
		</div>
		<div class="container_12 features">
			<div class="grid_12 features-line"></div>
			<div class="grid_4">
				<div class="feature">
					<div class="img_resize">
						<img src="img/blueberries.jpg" alt="">	
					</div>
					<h1>Articles</h1>
					<p>Because they taste fucking awesome and are good for you! <a href="#">{...}</a></p>
				</div>
			</div>
			<div class="grid_4">
				<div class="feature">
					<div class="img_resize">
						<img src="img/blueberries.jpg" alt="">	
					</div>
					<h1>Articles</h1>
					<p>Because they taste fucking awesome and are good for you! <a href="#">{...}</a></p>
				</div>
			</div>
			<div class="grid_4">
				<div class="feature">
					<div class="img_resize">
						<img src="img/blueberries.jpg" alt="">	
					</div>
					<h1>Articles</h1>
					<p>Because they taste fucking awesome and are good for you! <a href="#">{...}</a></p>
				</div>
			</div>
		</div>