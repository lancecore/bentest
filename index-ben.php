<?php get_header(); ?>

<main class="container">

  <div class="starter-template py-5 px-3">
    <h1>Leads</h1>
    
    <table>
      <thead>
        <tr>
          <td>Lead Status</td>
          <td>Name</td>
          <td>Meeting time</td>
          <td>Link demo</td>
        </tr>
      </thead>
        <?php 
          $args = array(  
            'post_type' => 'leads',
          );
          
          $loop = new WP_Query( $args );
          if ( $loop->have_posts() ) :
            while ( $loop->have_posts() ) : $loop->the_post();
          ?>
          
          <tr>
            <td><?php if ( get_field('lead_status') ) : ?>
              <span class="<?php echo get_field('lead_status')->slug; ?>">
                <?php echo get_field('lead_status')->name; endif; ?>
              </span>
              </td>
            <td><?php if ( get_field('clients_name') ) : the_field('clients_name'); endif; ?></td>
            <td><?php if ( get_field('meeting_timedate') ) : the_field('meeting_timedate'); endif; ?></td>
            <td><a href="<?php the_permalink(); ?>">View this one</a></td>
          </tr>
          
        <?php
            endwhile;
          endif;
          wp_reset_postdata(); 
        ?>
        
    </table>
  </div>

</main>

<?php get_footer(); ?>