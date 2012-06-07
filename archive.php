<?php
/**
 Wp Bootstrap
 * Archive page
 */

get_header(); ?>

<section class="<?php echo (get_option('wp_bootstrap_fluid') == 0) ? 'row' : 'row-fluid'; ?>">
    <section class="span9">
        <h1 class="page-title">
<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: <span>%s</span>', 'wpbootstrap' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: <span>%s</span>', 'wpbootstrap' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'wpbootstrap' ) ) ); ?>
<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: <span>%s</span>', 'wpbootstrap' ), get_the_date( _x( 'Y', 'yearly archives date format', 'wpbootstrap' ) ) ); ?>
<?php else : ?>
				<?php _e( 'Blog Archives', 'wpbootstrap' ); ?>
<?php endif; ?>
			</h1>
        <?php 
         if(have_posts())
        while(have_posts()) : the_post ();
        ?>
        <hr />
        <article class="<?php echo (get_option('wp_bootstrap_fluid') == 0) ? 'row' : 'row-fluid'; ?>">
            <div class="span2"><?php the_post_thumbnail('thumbnail'); ?></div>
            <div class="span7">
                <?php the_title('<h2>', '</h2>'); ?>
                <?php the_excerpt(); ?>
                <p>
                    <a href="<?php the_permalink(); ?>#comments" class="btn btn-large">
                        <i class="icon-comment"></i>
                        <?php printf( _n( '%1', get_comments_number(), 'wpbootstrap' ), number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' ); ?>
                    </a>
                    
                        <a href="<?php the_permalink(); ?>" class="btn btn-info btn-large"><?php _e('Continue'); ?> &raquo;</a>
                </p>
            </div>
        </article>
        <?php endwhile; ?>
    </section>
    <?php get_sidebar(); ?>
</section>

<?php get_footer(); ?>