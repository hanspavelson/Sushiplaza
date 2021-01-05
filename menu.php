<?php 
	// Template Name: Menu
?>

<?php get_header();?>

<?php if(have_posts()): ?>
	<?php while(have_posts()): the_post(); ?>
		<main class="content">
			<?php echo apply_filters( 'the_content', $post->post_content ); ?>
		</main>
	<?php endwhile ?>
<?php endif ?>

<?php get_footer(); ?>
