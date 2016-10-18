<?php
/*
Template Name: Archives
*/
get_header(); ?>

	<div id="content" role="main" class="index">
		<article class="index">

		<?php the_post(); ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<?php get_search_form(); ?>

		<h2>Archives by Month:</h2>
		<ul class="columns three">
			<?php wp_get_archives('type=monthly'); ?>
		</ul>

		<h2>Archives by Subject:</h2>
		<ul class="columns two">
			 <?php wp_list_categories(); ?>
		</ul>
		</article>

	</div>

<?php get_footer();
