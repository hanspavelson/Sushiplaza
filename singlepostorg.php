<?php get_header();?>

<?php if(have_posts()): ?>
	<?php while(have_posts()): the_post(); ?>
		<main class="content">
			<section class="blog-post">
				<div class="container">
					<div class="row">
						<?php if (has_post_thumbnail()): ?>
							<div class="col-lg-8 col-lg-push-4 col-md-12 col-md-push-0">
								<div class="blog-post__img s-back-switch">
									<img src="<?=get_the_post_thumbnail_url($post->ID, 'large')?>" class="s-img-switch" alt=""/>
									<div class="blog-post__data">
										<p><?=date('d.m.y',strtotime($post->post_date))?></p>
									</div>
								</div>
							</div>
						
							<div class="col-lg-4 col-lg-pull-8 col-md-12 col-md-pull-0">
								<div class="blog-post__h font-2">
									<h2><?=__($post->post_title)?></h2>
								</div>
								<div class="blog-post__desc font-2">
									<p><?=__($post->post_excerpt)?></p>
								</div>
							</div>
						<?php else: ?>						
							<div class="col-md-12">
								<div class="blog-post__h font-2">
									<h2><?=__($post->post_title)?></h2>
								</div>
								<div class="blog-post__desc font-2">
									<p><?=__($post->post_excerpt)?></p>
								</div>
							</div>
						<?php endif ?>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="blog-post__desc">
								<?php echo apply_filters( 'the_content', $post->post_content ); ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="blog-footer">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="blog-footer__h font-2">
								<h3><?=__('Related posts','plaza')?></h3>
							</div>
						</div>
					</div>
					<div class="row">
						<?php 
							$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID) ) );
						?>
						<div class="col-lg-12">
							<?php if (!empty($related)): ?>
								<div class="blog-slider owl-carousel">
									<?php foreach ($related as $related_post): ?>
										<div class="blog-slider__item">
											<div class="blog-item small">
												<div class="blog-item__data">
													<p><?=date('d.m.y',strtotime($related_post->post_date))?></p>
												</div>
												<?php if (has_post_thumbnail($related_post->ID)): ?>
													<img src="<?=get_the_post_thumbnail_url($related_post->ID, 'large')?>" class="s-img-switch" alt=""/>
												<?php endif ?>
												<div class="blog-item__txt">
													<div class="blog-item__h">
														<h3><?=__($related_post->post_title)?></h3>
													</div>
													<a href="<?=get_the_permalink($related_post->ID)?>" class="blog-item__read"><?=__('Read more','plaza')?></a>
												</div>
											</div>
										</div>
									<?php endforeach ?>
								</div>
							<?php endif ?>

							<div class="blog-count"><span class="blog-count__item">1</span><span class="blog-count__sep">/</span><span class="blog-count__items"><?=count($related)?></span></div>
							<div class="blog-footer-back">
								<div class="blog-footer-back__icon icon-svg">
									<svg>
										<use xlink:href="#right-arrow" class="right-arrow"></use>
									</svg>
								</div>
								<div class="blog-footer-back__desc font-2"><a href="<?=get_post_type_archive_link('post')?>"><?=__('Back to blog','plaza')?></a></div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
	<?php endwhile ?>
<?php endif ?>

<?php get_footer(); ?>
