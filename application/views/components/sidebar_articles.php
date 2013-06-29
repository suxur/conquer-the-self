	<!-- FEATURED ARTICLES -->
	<div class="sidebox-header btn-blue">
		<h3>Featured Articles</h3>
	</div>
	<div class="sidebox">
		<?php foreach ($featured as $feature) :?>
			<div class="ribbon"><h4><a href="<?php echo site_url('articles/' . intval($feature->id) . '/' . e($feature->slug)); ?>"><?php echo $feature->title; ?></a></h4></div>
		<?php endforeach; ?>
	</div>
	<div class="sidebar-ad">
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
	