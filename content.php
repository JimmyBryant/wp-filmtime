<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post">
			<?php _e( 'Featured post', 'twentytwelve' ); ?>
		</div>
		<?php endif; ?>
		<header class="entry-header">

			<?php if ( is_search() ) : // 展示搜索结果?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div>
			<?php else :
				$douban=get_post_meta($post->ID,'douban_rating',true);
				$IMDb=get_post_meta($post->ID,'IMDb_rating',true);
			?>
				<?php if(is_home()): //首页?>

					<?php if ( has_post_thumbnail())://有缩略图?>
						<div>
							<a class="entry-thumbnail" href="<?php the_permalink(); ?>" title="<?php the_title_attribute()?>" rel="movie">
								<?php the_post_thumbnail('thumbnail'); ?>
							</a>
							<p class="entry-title"><a href="<?php the_permalink();?>"><?php the_title_attribute()?></a></p>
							<p class="entry-rating"><?php  if($douban):?><span>豆瓣</span><em><?php echo $douban;endif;?></em></p>
							<!-- <p class="entry-rating"><?php $IMDb=get_post_meta($post->ID,'IMDb_rating',true); if($IMDb) echo 'IMDb'.$IMDb ;?></p> -->
						</div>
					<?php endif; ?>
				<?php elseif (is_single()): //文章页?>
					<h1 class="entry-title"><span><?php the_title(); ?></span></h1>
					<div class="clear top">
						<a class="entry-poster" title="点击查看原图" target="_blank" href="<?php echo get_post_thumbnail_url($post->ID,'large'); ?>">
							<?php the_post_thumbnail('medium'); ?>
						</a>
						<div class="entry-info">
							<ul>
								<li><label>导演</label><span><?php echo get_post_meta($post->ID,'director',true); ?></span></li>
								<li><label>编剧</label><span><?php echo get_post_meta($post->ID,'writers',true); ?></span></li>
								<li><label>类型</label><span><?php echo get_post_meta($post->ID,'type',true); ?></span></li>
								<li><label>制片国家/地区</label><span><?php echo get_post_meta($post->ID,'region',true); ?></span></li>
								<li><label>片长</label><span><?php echo get_post_meta($post->ID,'length',true); ?>分钟</span></li>
								<li><label>主演</label><span><?php echo get_post_meta($post->ID,'stars',true); ?></span></li>
								<li><label>评分</label><?php if($douban) :?><span class="douban_rate" title="豆瓣"><?php echo $douban;?></span><?php endif; ?><?php if($IMDb) :?><span class="IMDb_rate" title="IMDb"><?php echo $IMDb;?></span><?php endif; ?></li>
							</ul>
							<div class="btn-action"><a href="#" class="btn btn-primary">普通下载</a></div>
						</div>
					</div>
					<div class="entry-summary">
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
					</div>
				<?php endif; ?>
			<?php endif; ?>


			<!-- 如果是文章页
			<?php if ( is_single() ) : ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif;?>

			<?php if ( comments_open() ) : ?>
				<div class="comments-link">
					<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentytwelve' ) . '</span>', __( '1 Reply', 'twentytwelve' ), __( '% Replies', 'twentytwelve' ) ); ?>
				</div>
			<?php endif; // comments_open() ?>
		</header>

		<?php if ( is_search() ) : // 展示搜索结果时用缩略?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div>
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div>
		<?php endif; ?>

		<footer class="entry-meta">
			<?php twentytwelve_entry_meta(); ?>
			<?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
			<?php if ( is_singular() && get_the_author_meta( 'description' ) && is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries. ?>
				<div class="author-info">
					<div class="author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentytwelve_author_bio_avatar_size', 68 ) ); ?>
					</div>
					<div class="author-description">
						<h2><?php printf( __( 'About %s', 'twentytwelve' ), get_the_author() ); ?></h2>
						<p><?php the_author_meta( 'description' ); ?></p>
						<div class="author-link">
							<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
								<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentytwelve' ), get_the_author() ); ?>
							</a>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</footer>-->
	</article><!-- #post -->
