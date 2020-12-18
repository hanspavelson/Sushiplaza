<?php get_header();?>

<?php if(have_posts()): ?>
	<?php while(have_posts()): the_post(); ?>
		<main class="content">
			<div class="intro parallax">
				<div class="container">
					<?php echo apply_filters( 'the_content', $post->post_content ); ?>
					
				</div>
			</div>
		</main>
	<?php endwhile ?>
<?php endif ?>

<?php get_footer(); ?>
