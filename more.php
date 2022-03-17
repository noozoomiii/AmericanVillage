<?php
    require_once("../../../wp-config.php");
    $now_post_num = $_POST['now_post_num'];
    $get_post_num = $_POST['get_post_num'];
    $next_now_post_num = $now_post_num + $get_post_num;
    $next_get_post_num = $get_post_num + $get_post_num;
    $sql = "SELECT
            $wpdb->posts.ID,
            $wpdb->posts.post_title,
            $wpdb->posts.post_content
        FROM 
            $wpdb->posts  
        WHERE 
            $wpdb->posts.post_type = 'post' AND $wpdb->posts.post_status = 'publish'
        ORDER BY 
            $wpdb->posts.post_date DESC 
        LIMIT %d, %d";
        // LIMIT $now_post_num, $get_post_num";

    $pre = $wpdb->prepare($sql,$now_post_num,$get_post_num); // 追記
    $results = $wpdb->get_results($pre);
    // $results = $wpdb->get_results($spl);
     
    $sql = "SELECT
            $wpdb->posts.ID, 
            $wpdb->posts.post_title, 
            $wpdb->posts.post_content 
        FROM 
            $wpdb->posts  
        WHERE 
            $wpdb->posts.post_type = 'post' AND $wpdb->posts.post_status = 'publish'
        ORDER BY 
            $wpdb->posts.post_date DESC 
        LIMIT %d, %d";
        // LIMIT $next_now_post_num, $next_get_post_num";

    $next_pre = $wpdb->prepare($sql,$next_now_post_num,$next_get_post_num); // 追記
    $next_results = $wpdb->get_results($next_pre);
    // $next_results = $wpdb->get_results($spl);
     
    $noDataFlg = 0;
    if ( count($results) < $get_post_num || !count($next_results) ) {
        $noDataFlg = 1;
    }

    $html = "";
     
    foreach ($results as $result) {
        $html .= '<div class="articleMainBox">';
        $html .= '<p><a href="'.get_permalink($result->ID).'" class="over">'.apply_filters('the_title', $result->post_title).'</a></p>';
        $html .= '<p>'.get_post_time('M d, Y','false',$result->ID).'</p>';
        $html .= '<p>'.mb_substr(strip_tags($result->post_content), 0, 108).'...</p>';
        $html .= '<p><a href="'.get_permalink($result->ID).'">Read More</a></p>';
        $html .= '</div>';
    }
    $returnObj = array();
    $returnObj = array(
        'noDataFlg' => $noDataFlg,
        'html' => $html
    );
    $returnObj = json_encode($returnObj);

    echo $returnObj;
?>
