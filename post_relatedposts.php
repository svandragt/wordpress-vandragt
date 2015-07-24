<?php if (is_single()): ?>
	<div id="related"><h2>Also in <em><?php echo vd_first_category_titles() ?></em> </h2>

		<?php vd_template_post_relatedposts(); ?>
	</div>
<?php endif; ?> 