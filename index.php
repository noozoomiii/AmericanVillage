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
            <p>進化し続ける「街」アメリカンビレッジマガジン</p>
        </div>
    </section>
    <!-- キーヴィジュアル -->

    <section class="article">
        <h2>Latest Articles</h2>
        <?php global $wp_query; $count = $wp_query->found_posts;?>
        <div class="article_contents load" data-count="<?php echo $count; ?>">
        <?php query_posts('posts_per_page=6'); ?>

            <?php
            if (have_posts()):
                while (have_posts()):
            the_post();
            ?>
            <div class="article_box">
                <p class="article_img"><?php the_post_thumbnail();?></p>
                <p class="article_date"><?php echo get_the_date(); ?></p>
                <p class="article_title"><?php the_title(); ?></p>
                <a href="<?php the_permalink();?>">
                    <p class="readmore">READ MORE</p>         
                </a>
                
            </div>

            <?php endwhile;?>

    <!-- この部分がajaxで追加読み込みする箇所 -->
    <!-- javascript側に渡したい値は、data属性を使って指定 -->
    <!-- <div class="load" data-count="<?php //echo $count; ?>" data-post-type="post" >
    </div> -->

            <!-- カスタム投稿全件数取得 -->
        <?php global $wp_query; $count = $wp_query->found_posts;?>




    <!-- END if (have_posts()) -->
                <?php else : ?>
            <section>
                <p>表示する記事がありません</p>
            </section>

            <?php endif; ?> 
            
            <?php wp_reset_query(); ?>
            
             
     
        </div>

            <!-- 初期表示件数が全件数より少ない場合、もっと読み込むボタンを表示 -->
    <?php if($count > 6): ?>
        <?php wp_reset_query(); ?>
        <div class="btn">
           <button class="more_btn">もっと見る</button>
        </div>
    
    <?php endif; ?>

        <!-- <div class="more">
          <button id="more_disp"><a href="#">もっと見る</a></button>
        </div> -->

        
    </section>


  
<?php get_footer(); ?>