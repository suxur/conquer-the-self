<!-- SOCIAL -->
<div class="grid_1">
	<a class="btn btn-social btn-brown" href="https://www.facebook.com/conquertheself1" target="_blank">
		<div class="social facebook"></div>
	</a>
</div>
<div class="grid_1">
	<a class="btn btn-social btn-brown" href="https://www.twitter.com/ConquerTheSelf1" target="_blank">
		<div class="social twitter"></div>
	</a>
</div>
<div class="grid_1">
	<a class="btn btn-social btn-brown" href="https://plus.google.com/108620236658091759762/posts" target="_blank">
		<div class="social google"></div>
	</a>
</div>
<div class="grid_1">
	<a class="btn btn-social btn-brown" href="<?php echo site_url('rss'); ?>">
		<div class="social rss"></div>
	</a>
</div>

<div class="grid_4">
	<!-- SEARCH -->
	<?php echo form_open('search'); ?>
		<div class="input-append">
			<?php echo form_input('search'); ?>
			<?php echo form_submit('submit', 'Search', 'class="btn btn-append btn-brown"'); ?>
		</div>
	<?php echo form_close(); ?>