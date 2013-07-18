<?php
/*
Template Name: Single Ajax Event
*/ 
?>				

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<a id="<?php echo $post->post_name; ?>" class="hook">sss</a>

<div class="event-content">
	<header>
		<h2 class="event-date">
			<?php echo get_post_meta($post->ID, 'event-day', true); ?>
			<span class="event-year">
				<?php echo get_post_meta($post->ID, 'event-year', true); ?>
			</span>	
		</h2>
		<h1 class="event-title title">
			<?php the_title(); ?>
		</h1>
	</header>
	<div>
		<?php the_content(); ?>
	</div>
</div>

<?php endwhile; endif; ?>