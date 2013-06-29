	<!-- STAFF PICKS -->
	<div class="sidebox-header btn-blue">
		<h3>Staff Picks</h3>
	</div>
	<div class="sidebox">
		<?php foreach ($staff_picks as $staff_pick) :?>
			<div class="ribbon"><h4><a href="<?php echo site_url('articles/' . intval($staff_pick->id) . '/' . e($staff_pick->slug)); ?>"><?php echo $staff_pick->title; ?></a></h4></div>
		<?php endforeach; ?>
	</div>
	<div class="sidebar-ad">
		<script type="text/javascript"><!--
			google_ad_client = "ca-pub-3600916638220496";
			/* CTS - Sidebar */
			google_ad_slot = "8229554576";
			google_ad_width = 300;
			google_ad_height = 250;
			//-->
			</script>
			<script type="text/javascript"
			src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
	</div>
</div>