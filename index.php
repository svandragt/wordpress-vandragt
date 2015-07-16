<?php get_header(); ?>

<div class="container">
	<div id="content" role="main" class="index">
		<?php  
		// todo group by category, then limit to only x per cat; keeping paging ok
		if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part( 'format.single', get_post_format() ); ?>
		<?php endwhile; else: ?>
		<div class="warning">
			<p>Sorry, but you are looking for something that isn't here.</p>
		</div>
		<?php endif; ?>
		<div class="previousnext">
			<?php posts_nav_link('','&laquo; Newer','Older &raquo;'); ?>
		</div>
	</div>

	<div id="sidebar">
		<h2>Categories</h2>
		<ul class="plain">
			<?php wp_list_categories( 'title_li=&depth=1' ); ?> 
		</ul>

		<h2>Stay updated</h2>
		<p>Around <?php echo vd_posts_per_month_count(); ?> entries per month.</p>
		<ul class="plain">
			<li><a href="/rss.xml">Posts feed</a></li> 
			<li><a href="/snippets.xml">Snippets feed</a></li>
			<li><a href="https://duckduckgo.com/?q=rss+via+email">Mailing list</a></li>
		</ul> 

	</div>
</div>

<?php get_footer(); ?> 
