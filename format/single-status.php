<article class="format <?php echo get_post_format(); ?>">
	<?php
    get_template_part('format/date', get_post_format());
	the_content('Continue reading &raquo;');
	?>

</article>

<?php if (is_single()): ?>
	<script type="text/javascript">
		document.getElementsByTagName('html')[0].style.height = '100%';
	</script>
<?php endif;?>