<?php
// 投稿ページにサムネイルを追加する方法
    add_theme_support('post-thumbnails');

    //functions.php 
    function register_my_menus() { 
        register_nav_menus( array( //複数のナビゲーションメニューを登録する関数
        //'「メニューの位置」の識別子' => 'メニューの説明の文字列',
            'main-menu' => 'Main Menu',
            'footer-menu'  => 'Footer Menu',
        ) );
    }
  add_action( 'after_setup_theme', 'register_my_menus' );
  

?>