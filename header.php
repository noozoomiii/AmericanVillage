<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OJT</title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/reset.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/style.css">
    <?php wp_head();?>
</head>

<body>
<header>
         <!-- ハンバーガーメニュー -->
         <div class="openbtn1"><span></span><span></span><span></span></div>
         <nav id="g-nav">
             <div id="g-nav-list">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/logo.png" alt="">
                <?php 
                    wp_nav_menu( array( 
                    'theme_location' => 'main-menu' 
                ) ); 
                ?>
                 <!--ナビの数が増えた場合縦スクロールするためのdiv※不要なら削除-->
                 <!-- <ul>
                     <li><img src=" <?php //echo get_template_directory_uri();?> /assets/img/logo.png" alt=""></li>
                     <li><a href="#">Menu01</a></li>
                     <li><a href="#">Menu02</a></li>
                     <li><a href="#">Menu03</a></li>
                     <li><a href="#">Menu04</a></li>
                 </ul> -->
             </div>
         </nav>
     <!-- ハンバーガーメニュー終わり -->

        <div class="headerFlex">
            
                <?php 
            wp_nav_menu( array( 
                'theme_location' => 'main-menu' 
            ) ); 
            ?>

            <!-- <a href="">Menu01</a>
            <a href="">Menu02</a>
            <a href="">Menu03</a>
            <a href="">Menu04</a> -->
        </div>
    </header>
