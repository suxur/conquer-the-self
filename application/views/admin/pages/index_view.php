<!-- Pages Index -->
<section>
	<h2>Pages</h2>
	<?php echo anchor('admin/pages/edit', '<i class="icon-plus"></i> Add a Page'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Parent</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($pages)) : ?>
				<?php foreach ($pages as $page) : ?>
				<tr>
					<td><?php echo anchor('admin/pages/edit/' . $page->id, $page->title); ?></td>
					<td><?php echo ucfirst($page->parent_slug); ?></td>
					<td><?php echo btn_edit('admin/pages/edit/' . $page->id); ?></td>
					<td><?php echo btn_delete('admin/pages/delete/' . $page->id); ?></td>
				</tr>
				<?php endforeach; ?>
			<?php else : ?>
			<tr class="info">
				<td colspan="4">We could not find any pages.</td>
			</tr>
		<?php endif; ?>
		</tbody>
	</table>
</section>