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
$contact_button = get_field('contact_button');
$resume_button = get_field('resume_button');
$contact_me = get_field('contact-me');
?>

<header class="full hero parrallax" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
		<div class="text-box">
			<h1><?php the_title(); ?></h1>
		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
		<?php endwhile; ?>
		<?php else: ?>
			<h1>Hello World!</h1>
		<?php endif; ?>

		<?php if( $contact_button ): ?>
			<a href="<?php echo $contact_button['url']; ?>" class="btn btn-lg btn-outline-warning"> Contact </a>
		<?php endif; ?>

		<?php if( $resume_button ): ?>
			<a href="<?php echo $resume_button['url']; ?>" class="btn btn-lg btn-outline-warning" target="_blank"> Resume </a>
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
    <!-- <a name="Portfolio">
        <div class="row full info"> </div>
    </a> -->


<h2>upcoming</h2>
<!-- Testing ACF Section -->
<?php
// the query
$today = date('Ymd');
$eventpost = new WP_Query(
	array(
		'post_type'=>'Event-Post',
		'post_status'=>'publish',
		'posts_per_page'=>-1,
		'meta_key' => 'event_date',
		'orderby' => 'meta_value_num',
		'order' => 'asc',
		'meta_query' => array(
			array(
				'key' => 'event_date',
				'compare' => '>=',
				'value' => $today,
				'type' => 'numeric'
			)
		)
		)); ?>
<?php if ( $eventpost->have_posts() ) : ?>
<ul>
    <!-- the loop -->
    <?php while ( $eventpost->have_posts() ) : $eventpost->the_post(); ?>
		<?php $Event_date = new DateTime( get_field('event_date') );?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<?php if( $Event_date ): ?>
			<?php echo $Event_date->format('n/j/Y');?>
			<?php  echo $today;?>
		<?php endif; ?>
		</li>
    <?php endwhile; ?>
    <!-- end of the loop -->
</ul>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p><?php _e( 'Sorry, no events found' ); ?></p>
<?php endif; ?>
<!-- End of ACF Testing Section -->

<h2> Past Events </h2>

<!-- Testing ACF Section -->
<?php
// the query
$today = date('Ymd');
$eventpost = new WP_Query(
	array(
		'post_type'=>'Event-Post',
		'post_status'=>'publish',
		'posts_per_page'=>-1,
		'meta_key' => 'event_date',
		'orderby' => 'meta_value_num',
		'order' => 'asc',
		'meta_query' => array(
			array(
				'key' => 'event_date',
				'compare' => '<',
				'value' => $today,
				'type' => 'numeric'
			)
		)
		)); ?>
<?php if ( $eventpost->have_posts() ) : ?>
<ul>
    <!-- the loop -->
    <?php while ( $eventpost->have_posts() ) : $eventpost->the_post(); ?>
		<?php $Event_date = get_field('event_date');?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		<?php if( $Event_date ): ?>
			<?php echo $Event_date;?>
			<?php  echo $today;?>
		<?php endif; ?>
		</li>
    <?php endwhile; ?>
    <!-- end of the loop -->
</ul>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p><?php _e( 'Sorry, no events found' ); ?></p>
<?php endif; ?>
<!-- End of ACF Testing Section -->
	<!-- portfolio section -->
	<a name="PortfolioSection">
		<div class="Portfolio-Section text-center py-5">
			<h3>Portfolio Section</h3>
			<p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis fugit tempora explicabo.</p>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-12 py-3">
						<a href="#">
							<img class="img-fluid" src="https://images.unsplash.com/photo-1542779283-429940ce8336?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=4500&amp;q=80"/>
						</a>
					</div>
					<div class="col-md-6 col-12 py-3">
						<a href="#">
							<img class="img-fluid" src="https://images.unsplash.com/photo-1542779283-429940ce8336?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=4500&amp;q=80"/>
						</a>
					</div>
				</div>
			</div>
		</div>
	</a>
	<!--Contact Section   -->
    <a name="Contact">
        <div class="container contact-full">
			<?php if( $contact_me ): ?>
				<?php echo $contact_me; ?>
			<?php endif; ?>
		<!-- Example of a contact form -->

		</div>
    </a>
</div>


<?php get_footer(); ?>
