<?php get_header(); ?>

    <section class="article">
        <h2>Latest Articles</h2>
        <div class="article_contents">
            <?php
            if (have_posts()):
                while (have_posts()):
            the_post();
            ?>
            <div>
                <p class="article_img"><?php the_post_thumbnail();?></p>
                <p class="article_date"><?php echo get_the_date(); ?></p>
                <p class="article_title"><?php the_title(); ?></p>
                <a href="<?php the_permalink();?>">
                    <p class="readmore">READ MORE</p>         
                </a>
                
            </div>

            <?php endwhile;
                else : ?>
            <section>
                <p>表示する記事がありません</p>
            </section>
            <?php endif; ?>
        </div>
    </section>

<?php get_footer(); ?>    

