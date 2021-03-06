<?php get_header() ?>
    
    <div id="content" class="posts-list">
    	<div class="middle">
            <div class="main">
            	<div class="marginRight20">
                <?php 
					$paged = get_query_var( 'paged' );
					$query = new WP_Query('posts_per_page=20&paged='.$paged);
					
                	if( $query->have_posts() ) :
				?>
					<?php if(is_category()) : ?>
                        <h1>Posts da categoria "<?php single_cat_title(); ?>"</h1>
                    <?php elseif(is_tag()) : ?>
                        <h1>Posts com a tag "<?php single_tag_title(); ?>"</h1>
                    <?php elseif(is_day()) : ?>
                        <h1>Posts de "<?php the_time('d, m, Y') ?>"</h1>
                    <?php elseif(is_month()) : ?>
                        <h1>Posts de "<?php the_time('F, Y') ?>"</h1>
                    <?php elseif(is_year()) : ?>
                        <h1>Posts de "<?php the_time('Y') ?>"</h1>
                    <?php elseif(is_author()) : ?>
                        <h1>Posts do autor "<?php the_author_link() ?>"</h1>
                    <?php endif; ?>
                    
                    <ul class="posts">
                    <?php while( $query->have_posts() ) : $query->the_post(); ?>
                        <li class="post">
                            <?php if(the_thumb("thumbnail", "") != '') echo '<a class="thumb" href="'. get_permalink() .'">'. the_thumb('thumbnail', 'width="63" height="65"') .'</a>'; else  echo '<a class="thumb" href="'. get_permalink() .'"><img src="'. get_bloginfo('template_directory') .'/global/img/graph/graph_labblog.jpg" alt="'. get_the_title() .'" /></a>'; ?>
                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                            <span class="date">em <?php the_time("d \d\e F \d\e Y"); ?></span>
                            <p><?php the_excerpt(); ?></p>
                            <div class="clear"></div>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                    
					<?php wp_pagenavi(); ?>
                <?php else : ?>
                	<h1>Nada encotrado.</h1>
                    <p>Tente outros termos!</p>
                <?php endif; ?>
                </div>
            </div>
            
			<?php locate_template( array( 'sidebar.php' ), true ) ?>
            <div class="clear"></div>
        </div>
    </div>
            
<?php get_footer() ?>
