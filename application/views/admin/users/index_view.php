<!-- Users Index -->
<section>
	<h2>Users</h2>
	<?php echo anchor('admin/users/edit', '<i class="icon-plus"></i> Add a User'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Email</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($users)) : ?>
				<?php foreach ($users as $user) : ?>
				<tr>
					<td><?php echo anchor('admin/users/edit/' . $user->id, $user->email); ?></td>
					<td><?php echo btn_edit('admin/users/edit/' . $user->id); ?></td>
					<td><?php echo btn_delete('admin/users/delete/' . $user->id); ?></td>
				</tr>
			<?php endforeach; ?>
		<?php else : ?>
			<tr>
				<td clospan="3">We Could Not Find Any Users.</td>
			</tr>
		<?php endif; ?>
		</tbody>
	</table>
</section>