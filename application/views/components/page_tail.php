		
		</div>
		<br>
		<footer class="drop-shadow-inverse">
			<div class="container_12">
				<h1 class="logo-small ir">Conquer The Self</h1>
				<p>
					<?php echo anchor('disclaimer', 'Disclaimer'); ?> | <?php echo anchor('privacy-policy', 'Privacy Policy'); ?>
				</p>
				<p>Powered by (mt) Media Temple</p>
				<p>&copy 2013 Conquer The Self</p>
			</div>
		</footer>
		<?php $this->load->view('templates/contact_view'); ?>

		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script>window.jQuery || document.write("<script src=\"<?php echo site_url('js/vendor/jquery-1.9.1.min.js'); ?>\"><\/script>")</script>
		<script src="<?php echo site_url('js/modal.js'); ?>"></script>
		<script src="<?php echo site_url('js/contact.js'); ?>"></script>

		<!-- Google Analytics -->
		<script>
			var _gaq=[['_setAccount','UA-39819709-1'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
	</body>
</html>