<article class="format <?php echo get_post_format(); ?>">
	<?php 
	the_content('Read the rest of this entry &raquo;');
	get_template_part( 'format.date', get_post_format() );
	?>
</article>

<?php if (is_single()): ?>
	<script type="text/javascript">
		document.getElementsByTagName('html')[0].style.height = '100%';
	</script>
<?php endif;?>