<?php



<div class="flexslider">			
	<ul class="slides">
	<?php $my_query = new WP_Query('post_type=wood_slider&posts_per_page=3');
	      while ($my_query->have_posts()) : $my_query->the_post(); ?>  
		<li>
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail('full'); } ?>
			<div class="slide-text">
      <h2><?php the_title(); ?></h2>		
			<?php the_content(); ?></div> <!--/.slide-text-->
		</li>	
	<?php endwhile; ?> 	
	</ul>
</div>

?>