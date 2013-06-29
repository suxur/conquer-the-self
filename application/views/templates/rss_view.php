<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<rss version="2.0">      
	<channel>
		<title><?php echo $title; ?></title>
		<link><?php echo $link; ?></link>
		<description><?php echo $description; ?></description>
		<copyright>Copyright <?php echo gmdate("Y", time()); ?></copyright>  

		<?php foreach($articles as $article): ?>
			<item>
				<title><?php echo $article->title; ?></title>
				<pubDate><?php echo date('F jS, Y', strtotime($article->pubdate)) ?></pubDate>
				<description><?php echo limit_to_numwords(strip_tags($article->body), 25); ?></description>
				<link><?php echo site_url('articles/' . $article->id . '/' . $article->slug) ?></link>
				<guid><?php echo site_url('articles/' . $article->id . '/' . $article->slug) ?></guid>
			</item>
		<?php endforeach; ?>

	</channel>
</rss>