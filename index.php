<?php get_header(); ?>

<!-- キーヴィジュアル -->
<section class="keyVisual">
        <div>
            <img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png" alt="" class="kv-Logo">
            <div class="picPosition">
                <!-- イメージ　フェードイン　フェードアウト -->
                <picture>
                <?php
echo do_shortcode('[smartslider3 slider="2"]');
?>
                    <!-- <source srcset="<?php echo get_template_directory_uri();?>/assets/img/visual_1_sp.png" media="(max-width: 767px)">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/visual_1_pc.png" alt="" class="kv-main"> -->
                </picture>
                <picture>
                    <source srcset="<?php echo get_template_directory_uri();?>/assets/img/visual_text_sp.png" media="(max-width: 767px)">
                    <img src="<?php echo get_template_directory_uri();?>/assets/img/visual_text_pc.png" alt="" class="kv-text">
                </picture>
            </div>
            <p class="kvtext">進化し続ける「街」アメリカンビレッジマガジン</p>
        </div>
    </section>
    <!-- キーヴィジュアル -->

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

