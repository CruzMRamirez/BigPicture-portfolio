<?php
/*
 * Template Name: Homepage
 * Template Post Type: page
 */
get_header();

$Second_featured_image = get_field('second_featured_image');
$Third_featured_image = get_field('third_featured_image');
$whoiam = get_field('whoiam');
$whatido = get_field('WhatIDo');
?>

<header class="full hero" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
		<div class="text-box">
			<h1><?php the_title(); ?></h1>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
		<?php endwhile; ?>
		<?php else: ?>
			<h1>Hello World!</h1>
		<?php endif; ?>
		</div>
</header>

<div class="wrapper">
    <!-- Who am i section-->
    <a name="Whoiam">
	<?php if( $Second_featured_image ): ?>
        <div class="row full info" style="background-image: url(<?php echo $Second_featured_image['url']; ?>);">
	<?php endif; ?>
            <div class="row justify-content-end">
                <div class="col-sm-7 col-md-5 details-card">
                    <h2>Who I Am</h2>
                    <?php if( $whoiam ): ?>
						<p><?php echo $whoiam; ?></p>
					<?php endif; ?>
                </div>
            </div>
			<!-- <a class="downarrow" href="#Whatido"></a> -->
		</div>
    </a>
    <!-- What I do section-->
    <a name="Whatido">
	<?php if( $Third_featured_image ): ?>
        <div class="row full info" style="background-image: url(<?php echo $Third_featured_image['url']; ?>);">
	<?php endif; ?>
            <div class="row justify-content-start">
                <div class="col-sm-7 col-md-5 details-card">
                    <h2>What I Do</h2>
                    <?php if( $whatido ): ?>
						<p><?php echo $whatido; ?></p>
					<?php endif; ?>
                </div>
            </div>
			<!-- <a class="downarrow" href="#Portfolio"></a> -->
		</div>
    </a>
    <!--Portfolio Section   -->
    <a name="Portfolio">
        <div class="row full info"> </div>
    </a>
</div>


<?php get_footer(); ?>
