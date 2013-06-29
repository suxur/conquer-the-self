<!-- Articles Index -->
<section>
	<h2>Articles</h2>
	<?php echo anchor('admin/articles/edit', '<i class="icon-plus"></i> Add an Article'); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Publish Date</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php if(count($articles)) : ?>
				<?php foreach ($articles as $article) : ?>
				<tr>
					<td><?php echo anchor('admin/articles/edit/' . $article->id, $article->title); ?></td>
					<td><?php echo date('M. dS, Y', strtotime($article->pubdate)); ?></td>
					<td><?php echo btn_edit('admin/articles/edit/' . $article->id); ?></td>
					<td><?php echo btn_delete('#deleteModal' . $article->id); ?></td>
				</tr>
				<?php echo delete_modal($article->id, $article->title); ?>
			<?php endforeach; ?>
		<?php else : ?>
			<tr class="info">
				<td colspan="4">We could not find any articles.</td>
			</tr>
		<?php endif; ?>
		</tbody>
	</table>
</section>