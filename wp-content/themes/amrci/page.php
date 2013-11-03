<?php get_header(); ?>

<?php if (has_post_thumbnail( $post->ID ) ): ?>
    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
    <style>
    body{
        background-image: url("<?php echo $image[0]; ?>") !important;
        background-size: cover;
    }
    </style>
<?php endif; ?>

<div id="content" class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <a title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>">
            <?php if(of_get_option('branding_logo','')!='') { ?>
                <img class='img-responsive hidden-xs' src="<?php echo of_get_option('branding_logo'); ?>" alt="<?php echo get_bloginfo('description'); ?>">
            <?php } ?>
        </a>
    </div>
	<div id="main" class="col-sm-8 col-md-8 col-lg-8" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">
			
			<header>
				
				<!-- <div class="page-header"> -->
                    <h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1>
                <!-- </div> -->
			
			</header> <!-- end article header -->
		
			<section class="post_content" itemprop="articleBody">
				<?php the_content(); ?>
		
			</section> <!-- end article section -->
			
			<footer>

				<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","bonestheme") . ':</span> ', ', ', '</p>'); ?>
				
			</footer> <!-- end article footer -->
		
		</article> <!-- end article -->

		<?php endwhile; ?>		
		
		<?php else : ?>
		
		<article id="post-not-found">
		    <header>
		    	<h1><?php _e("Not Found", "bonestheme"); ?></h1>
		    </header>
		    <section class="post_content">
		    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
		    </section>
		    <footer>
		    </footer>
		</article>
		
		<?php endif; ?>

	</div> <!-- end #main -->

</div> <!-- end #content -->

<?php get_footer(); ?>