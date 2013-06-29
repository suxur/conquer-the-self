<?php $this->load->view('components/page_head'); ?>
	<body>
		<!--[if lt IE 7]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->
		<header class="drop-shadow">
			<div class="container_12">
				<div class="grid_8">
					<?php echo anchor('', '<h1 class="ir logo">' . $this->config->item('site_name') . '</h1>'); ?> 
					<nav>
						<?php echo get_menu($menu); ?>
					</nav>
				</div>
				<!--
				<div class="grid_4">
					<div class="input-append search">
						<input type="text" placeholder="user@email.com">
						<button class="btn btn-append" type="button">Subscribe</button>
					</div>
				</div>
				-->
			</div>
		</header>
		<div class="container_12">
			<?php $this->load->view('templates/' . $subview); ?>
		</div>
<?php $this->load->view('components/page_tail'); ?>