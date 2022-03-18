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

  
  /* カスタム投稿一覧の初期表示件数を設定 */
function my_custom_query_vars( $query ) {
	if ( !is_admin() && $query->is_main_query()) {
		if ( is_post_type_archive('post') ) {
			$query->set( 'posts_per_page' , 6 );
		}
	}
	return $query;
}
add_action( 'pre_get_posts', 'my_custom_query_vars' );

/* ajax処理 */
function my_ajax(){
	global $post;
	$args = array(
		'posts_per_page' => $_POST["get_post_num"], // 追加で表示する件数
		'offset' => $_POST["now_post_num"],         //既に表示済みの件数は除外 
		'post_type' => $_POST["post_type"],
		'orderby' => 'date', //日付で並び替え
		'order' => 'DESC',
	);
	$my_posts = get_posts($args);
	foreach ($my_posts as $post) : setup_postdata($post);
	// echo '<li class="item">';

    // $thumbnail = the_post_thumbnail();
    // $date = get_the_date();
    // $title = the_title();
    // $permalink = the_permalink();
    // $template = <<<EOD
    //         <div class="article_box">
    //             <p class="article_img">$thumbnail</p>
    //             <p class="article_date">$date</p>
    //             <p class="article_title">$title</p>
    //             <a href="$permalink">
    //                 <p class="readmore">READ MORE</p>         
    //             </a>
                
    //         </div>


    // EOD;
    // echo $template;
    

    echo '<a href="'.get_the_permalink().'" class="article_box">';
    echo '<p class="article_img"><img src="'.get_the_post_thumbnail_url().'"></p>';
    echo '<p class="article_date">'.get_the_date().'</p>';
    echo '<p class="article_title">'.get_the_title().'</p>';
	echo '<p class="readmore">READ MORE</p>'.'</a>';
	echo '</a>';
                

    // echo '<p>' .the_post_thumbnail().'</p>';
    // echo '<p>' .get_the_date(). '</p>';

	// echo '<a href="'.get_the_permalink().'">'.get_the_title().'</a>';
	// echo '</li>';
	endforeach; wp_reset_postdata();
	wp_die();
}
add_action( 'wp_ajax_my_ajax_action', 'my_ajax' );
add_action( 'wp_ajax_nopriv_my_ajax_action', 'my_ajax' );

  

?>