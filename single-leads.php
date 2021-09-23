<?php get_header(); ?>

<main class="container">

  <div class="starter-template py-5 px-3">
	<h1>Lead: <?php if ( get_field('client_name') ) : the_field('client_name'); endif; ?></h1>
	
		<?php 
		  if ( have_posts() ) : 
			  while ( have_posts() ) : the_post();
		  ?>
		  
			<p><strong>Lead Status: </strong>
				<span class="<?php echo get_field('lead_status')->slug; ?>">
					<?php if ( get_field('lead_status') ) : print_r(get_field('lead_status')->name); endif; ?>
				</span>
			</p>
			<p><strong>Meeting time: </strong><?php if ( get_field('meeting_time') ) : the_field('meeting_time'); endif; ?></p>
		  
		<?php
			endwhile;
		  endif;
		  wp_reset_postdata(); 
		?>

  </div>

</main>

<?php get_footer(); ?>