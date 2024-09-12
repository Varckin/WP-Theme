<?php get_header(); ?>

<main>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article>
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>

            <?php if (have_rows('content')): ?>
                <?php while (have_rows('content')): the_row(); ?>
                    <h2><?php the_sub_field('title'); ?></h2>
                    <?php if (have_rows('posts')): ?>
                        <ul>
                            <?php while (have_rows('posts')): the_row(); ?>
                                <?php $post_object = get_sub_field('post'); ?>
                                <?php if ($post_object): ?>
                                    <?php setup_postdata($post_object); ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        <p><?php the_excerpt(); ?></p>
                                    </li>
                                    <?php wp_reset_postdata(); ?>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </article>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
