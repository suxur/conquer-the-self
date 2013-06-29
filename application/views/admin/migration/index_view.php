<!-- CLEANED -->
<section>
	<h2>Database Migrations</h2>
	<h3>Migration Version: <?php echo $version; ?></h3>
	<?php if (isset($success) && $success == 1) : ?>
	<div class="alert alert-success">
  		<button type="button" class="close" data-dismiss="alert">&times;</button>
  		<strong>Success!</strong> <?php $this->session->flashdata('message'); ?>
	</div>
	<?php endif; ?>
	
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Database Tables</th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($tables)) : ?>
				<?php foreach ($tables as $table) : ?>
					<tr>
						<td><?php echo $table; ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr>
					<td>Database is empty.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
	<a href="<?php echo site_url('admin/migration/run_migration'); ?>" class="btn btn-primary">Run Migration</a>
</section>