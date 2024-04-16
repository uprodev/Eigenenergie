<?php get_header(); ?>

<?php if ( have_rows('content') ) :

	get_template_part( 'template-parts/content', 'builder' );

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>
	
<?php get_footer(); ?>