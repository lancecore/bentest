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
          //Look here!
          <tr>
            <td><?php if ( get_field('lead_status') ) :
              $lead_status = get_field('lead_status');
              foreach ( $lead_status as $lead_stat ) :
            ?>
              <span class="<?php echo $lead_stat->slug; ?>">
                <?php echo $lead_stat->name; ?>
              </span>
              <?php endforeach; endif; ?>
              </td>
            //The end
            <td><?php if ( get_field('client_name') ) : the_field('client_name'); endif; ?></td>
            <td><?php if ( get_field('meeting_time') ) : the_field('meeting_time'); endif; ?></td>
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