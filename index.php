<?php get_header(); ?>
<main class="content">
	<section class="blog parallax">
		<div data-depth="0.20" class="blog-bg-1 layer">
            <div class="img"><img src="<?=TDIR?>/assets/dist/s/images/useful/svg/theme/customer-bg-5.svg" alt=""/></div>
          </div>
          <div data-depth="0.70" class="blog-bg-2 layer"><img src="<?=TDIR?>/assets/dist/s/images/useful/svg/theme/small-img-1.svg" alt=""/></div>
          <div data-depth="0.50" class="blog-bg-3 layer">
            <div class="img"><img src="<?=TDIR?>/assets/dist/s/images/useful/svg/theme/offers-bg-1.svg" alt=""/></div>
          </div>
          <div data-depth="0.10" class="blog-bg-4 layer">
            <div class="img"><img src="<?=TDIR?>/assets/dist/s/images/useful/svg/theme/offers-bg-1.svg" alt=""/></div>
        </div>

		<div class="container">
			<div data-depth="0.60" class="blog-bg-5 layer">
              <div class="img"><img src="<?=TDIR?>/assets/dist/s/images/useful/svg/theme/small-img-3.svg" alt=""/></div>
            </div>
			
			
			<!--<div class="blog-search">
				<form action="" method="GET">
					<input name="s" type="text" value="<?=get_query_var('s')?>" placeholder="<?=__('Search','plaza')?>..."/>
					<button class="blog-search__icon icon-svg">
						<svg>
							<use xlink:href="#search" class="search"></use>
						</svg>
					</button>
				</form>
			</div>
-->

			<div class="row">
				<?php if(have_posts()): ?>
					<?php $counter = 0; ?>
					<?php while(have_posts()): the_post(); ?>
						<a href="<?=get_the_permalink()?>" class="col-sm-6 blog-link">
							<div class="blog-item <?php if ($counter % 2 == 0): ?> right-marg <?php else: ?> left-marg <?php endif ?>">
								<div class="blog-item__data">
									<p><?=date('d.m.y',strtotime($post->post_date))?></p>
								</div>
								<?php if (has_post_thumbnail()): ?>
									<div class="blog-item__img s-back-switch">
										<img src="<?=get_the_post_thumbnail_url($post->ID, 'large')?>" class="s-img-switch" alt=""/>	
									</div>
								<?php endif ?>
								<div class="blog-item__txt">
									<div class="blog-item__h">
										<h3><?=__($post->post_title)?></h3>
									</div>
									<div class="blog-item__desc">
										<p><?=__($post->post_excerpt)?></p>
									</div>
									<span class="blog-item__read"><?=__('Read more','plaza')?></span>
								</div>
							</div>
						</a>
						<?php $counter ++; ?>
					<?php endwhile ?>
				<?php else: ?>
					<h3 style="color: #000; margin-top: 50px; text-align: center;"><?=__('Posts not found','plaza')?></h3>
				<?php endif ?>
			
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="blog-pag">
						<?php 
							global $wp_query;
							$current_page = get_query_var('paged');
							if (!$current_page) {
								$current_page = 1;
							}
						?>
						<?php if ($wp_query->max_num_pages > 1): ?>
							<ul class="blog-pag-list">
								<?php if ($current_page > 1): ?>
									<li class="blog-pag-list__item"><a href="<?=get_pagenum_link($current_page - 1)?>"><i class="arrow left"></i></a></li>
								<?php else: ?>
									<li style="display: none;" class="blog-pag-list__item"></li>
								<?php endif ?>
								<?php for ($i = 1; $i <= $wp_query->max_num_pages; $i++) { ?>
									<li class="blog-pag-list__item <?php if ($i == $current_page): ?> active <?php endif ?>"><a href="<?=get_pagenum_link($i)?>"><?=$i?></a></li>
								<?php } ?>
								<?php if ($current_page != $wp_query->max_num_pages): ?>
									<li class="blog-pag-list__item"><a href="<?=get_pagenum_link($current_page + 1)?>"><i class="arrow right"></i></a></li>
								<?php else: ?>
									<li style="display: none;" class="blog-pag-list__item"></li>
								<?php endif ?>
							</ul>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>
