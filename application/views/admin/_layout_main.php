<?php $this->load->view('admin/components/page_head'); ?>

<div class="navbar navbar-static-top navbar-inverse">
	<div class="navbar-inner">
		<a class="brand" href="<?php echo site_url('admin/dashboard'); ?>"><?php echo $meta_title; ?></a>
		<ul class="nav">
			<?php echo menu_anchor('admin/dashboard', 'Dashboard'); ?>
			<?php echo menu_anchor('admin/pages', 'Pages'); ?>
			<?php echo menu_anchor('admin/order', 'Order Pages'); ?>
			<?php echo menu_anchor('admin/articles', 'Articles'); ?>
			<?php echo menu_anchor('admin/users', 'Users'); ?>
		</ul>
	</div>
</div>
<div class="container">
	<div class="row">
		<!-- Main Column -->
		<div class="span9">
			<?php $this->load->view($subview); ?>
		</div>
		<!-- Sidebar -->
		<div class="span3">
			<section>
				<h2>User</h2>
				<i class="icon-user"></i> <?php echo anchor('admin/users/edit/' . $this->session->userdata('id'), $this->session->userdata('first_name')); ?><br>
				<i class="icon-off"></i> <?php echo anchor('admin/users/logout', 'Logout'); ?>
			</section>
		</div>
	</div>
</div>

<?php $this->load->view('admin/components/page_tail'); ?>