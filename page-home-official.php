<?php
/*
 * Template Name: Official Home Page
 * Template Post Type: page
 */
get_header();

$Second_featured_image = get_field('second_featured_image');
$Third_featured_image = get_field('third_featured_image');
$whoiam = get_field('whoiam');
$whatido = get_field('WhatIDo');
$contact_button = get_field('contact_button');
$resume_button = get_field('resume_button');
$contact_me = get_field('contact-me');
$Section_title = get_field('section-title');
$Section_excerpt = get_field('section-excerpt');
?>
<div class="official-home">
<div class="full hero parrallax" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
	<header>
		<h1><?php the_title(); ?></h1>
	</header>
	<div class="headercontent row justify-content-center">
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
		<?php else: ?>
			<p>Hello World!</p>
		<?php endif; ?>
		</div>
	<div class="text-center py-3">
		<?php if( $contact_button ): ?>
			<a href="<?php echo $contact_button['url']; ?>" class="btn btn-lg btn-outline-warning"> Contact </a>
		<?php endif; ?>

		<?php if( $resume_button ): ?>
			<a href="<?php echo $resume_button['url']; ?>" class="btn btn-lg btn-outline-warning" target="_blank"> Resume </a>
		<?php endif; ?>
	</div>
</div>


<div class="wrapper">

	<div class="Main_Container m-0 p-0">
		<a name="Whoiam">
		<?php if( $Second_featured_image ): ?>
			<div class="content_row flex-row-reverse">
				<div class="bg_row" style="background-image:url('<?php echo $Second_featured_image['url']; ?>');"><img class="img-fluid" src="<?php echo $Second_featured_image['url']; ?>" /></div>
		<?php endif; ?>
				<div class="card_row align-self-center">
				<h3>Who I Am</h3>
                    <?php if( $whoiam ): ?>
						<p><?php echo $whoiam; ?></p>
					<?php endif; ?>
				</div>
			</div>
		</a>
		<!-- What I do section-->
		<a name="Whatido">
			<div class="content_row">
		<?php if( $Third_featured_image ): ?>
				<div class="bg_row" style="background-image:url('<?php echo $Third_featured_image['url']; ?>');"><img class="img-fluid" src="<?php echo $Third_featured_image['url']; ?>" /></div>
		<?php endif; ?>
				<div class="card_row align-self-center">
					<h2>What I Do</h2>
                    <?php if( $whatido ): ?>
						<p><?php echo $whatido; ?></p>
					<?php endif; ?>
				</div>
			</div>
		</a>
	</div>
	<!-- portfolio section -->
	<a name="Portfolio">
		<div class="Portfolio-Section text-center py-5 px-2">
		<?php if($Section_title):?>
			<h3><?php echo $Section_title; ?></h3>
		<?php endif;?>
		<?php if($Section_excerpt):?>
			<p class="mb-5"><?php echo $Section_excerpt; ?></p>
		<?php endif;?>
			<div class="container">
				<div class="row">
					<?php
						if( have_rows('portfolio_link_1') ):
						while( have_rows('portfolio_link_1') ): the_row();
						$Preview_image = get_sub_field('preview_image');
						$portfolio_link = get_sub_field('portfolio_url');
					?>
					<div class="col-md-6 col-12 py-3">
						<a href="<?php echo $portfolio_link;?>">
							<img class="img-fluid" src="<?php echo $Preview_image; ?>"/>
						</a>
					</div>
					<?php endwhile; endif; ?>
					<?php
						if( have_rows('portfolio_link_2') ):
						while( have_rows('portfolio_link_2') ): the_row();
						$Preview_image2 = get_sub_field('preview_image_2');
						$portfolio_link2 = get_sub_field('portfolio_url_2');
					?>
					<div class="col-md-6 col-12 py-3">
						<a href="<?php echo $portfolio_link2;?>">
							<img class="img-fluid" src="<?php echo $Preview_image2; ?>"/>
						</a>
					</div>
					<?php endwhile; endif; ?>
					<?php
						if( have_rows('portfolio_link_3') ):
						while( have_rows('portfolio_link_3') ): the_row();
						$Preview_image3 = get_sub_field('preview_image_3');
						$portfolio_link3 = get_sub_field('portfolio_url_3');
					?>
					<div class="col-md-6 col-12 py-3">
						<a href="<?php echo $portfolio_link3;?>">
							<img class="img-fluid" src="<?php echo $Preview_image3; ?>"/>
						</a>
					</div>
					<?php endwhile; endif; ?>
					<?php
						if( have_rows('portfolio_link_4') ):
						while( have_rows('portfolio_link_4') ): the_row();
						$Preview_image4 = get_sub_field('preview_image_4');
						$portfolio_link4 = get_sub_field('portfolio_url_4');
					?>
					<div class="col-md-6 col-12 py-3">
						<a href="<?php echo $portfolio_link4;?>">
							<img class="img-fluid" src="<?php echo $Preview_image4; ?>"/>
						</a>
					</div>
					<?php endwhile; endif; ?>

					<!-- <div class="col-md-6 col-12 py-3">
						<a href="#">
							<img class="img-fluid" src="https://images.unsplash.com/photo-1542779283-429940ce8336?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=4500&amp;q=80"/>
						</a>
					</div> -->
				</div>
			</div>
		</div>
	</a>
	<!--Contact Section   -->
    <a name="ContactMe">
        <div class="container contact-full">
			<?php if( $contact_me ): ?>
				<?php echo $contact_me; ?>
			<?php endif; ?>
		<!-- Example of a contact form -->

		</div>
    </a>
</div>

</div>
<?php get_footer(); ?>
