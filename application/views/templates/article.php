<!-- Main Content -->
<div class="container_12">
	<div class="grid_8">
		<article>
			<h1><?php echo e($article->title); ?></h1>
			<h4><?php echo date('F jS, Y', strtotime($article->pubdate)) ?> | <?php echo e($article->author); ?></h4>
			<div class="addthis_toolbox addthis_default_style" style="height: 25px; padding-top: 10px;">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet" style="width: 90px;"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium" style="width: 75px"></a> 
				<a class="addthis_counter addthis_pill_style"></a>
			</div>
			<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-51441575320c1c2d"></script>
			<p><?php echo $article->body; ?></p>
		</article>
		<div id="disqus_thread"></div>
		<script type="text/javascript">
			/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
			var disqus_shortname = 'conquertheself'; // required: replace example with your forum shortname

			/* * * DON'T EDIT BELOW THIS LINE * * */
			(function() {
				var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
				(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
			})();
		</script>
		<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
	</div>
<!-- Sidebar -->
<?php $this->load->view('sidebar'); ?>