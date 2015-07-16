<?php if (is_single()): ?>
	<div id="related"><h2>Related <em><?php echo vd_first_category_titles() ?></em> posts </h2>

		<!-- <p>Other interesting posts in this category:</p> -->
		<?php vd_template_post_relatedposts(); ?>
	</div>
<?php endif; ?> 