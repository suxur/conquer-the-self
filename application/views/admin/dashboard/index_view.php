<!-- CLEANED -->
<section>
	<h2>Recently Modified Articles</h2>
	<?php if (count($recent_articles)) : ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Title</th>
				<th>Date</th>
				<th>Time</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($recent_articles as $article) : ?>
			<tr>
				<td><?php echo anchor('admin/articles/edit/' . $article->id, e($article->title)); ?></td>
				<td><?php echo date('M. dS, Y', strtotime(e($article->modified))); ?></td>
				<td><?php echo date('h:i A', strtotime(e($article->modified))); ?></td>
				<td><?php echo btn_edit('admin/articles/edit/' . $article->id); ?></td>
				<td><?php echo btn_delete('admin/articles/delete/' . $article->id); ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
	<?php endif; ?>
</section>