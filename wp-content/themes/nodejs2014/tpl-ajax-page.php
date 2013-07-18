<?php
/*
Template Name: Single Ajax Page
*/ 
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<a id="<?php echo $post->post_name; ?>" class="hook">sss</a>

<header>
	<h1 class="title">
		<?php the_title() ?>
	</h1>
</header>
<div>
	<?php the_content() ?>
</div>

<?php endwhile; endif; ?>