	<div class="sidebar-ad" style="margin-bottom: 15px;">
		<script type="text/javascript">
		<!--
			google_ad_client = "ca-pub-3600916638220496";
			/* CTS - Sidebar */
			google_ad_slot = "8229554576";
			google_ad_width = 300;
			google_ad_height = 250;
		//-->
		</script>
		<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
	</div>	
	<!-- RECENT ARTICLES -->
	<div class="sidebox-header btn-blue">
		<h3>Recent Articles</h3>
	</div>
	<div class="sidebox">
		<?php foreach ($recent_articles as $recent) :?>
			<div class="ribbon"><h4><a href="<?php echo site_url('articles/' . intval($recent->id) . '/' . e($recent->slug)); ?>"><?php echo $recent->title; ?></a></h4></div>
		<?php endforeach; ?>
	</div>
<script type="text/javascript"><!--
google_ad_client = "ca-pub-3600916638220496";
/* CTS-Sidebar-02 */
google_ad_slot = "4663652578";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>