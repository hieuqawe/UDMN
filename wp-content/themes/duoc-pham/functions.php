<?php 
//Add description product excerpt to archive pages
add_action( 'woocommerce_after_shop_loop_item_title', 'lv_short_description_product_excerpt', 5 );
function lv_short_description_product_excerpt() {
global $post;
echo wp_trim_words ($post->post_excerpt,20); // 10 là số chữ được chỉ định giới hạn.
}


add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
     unset($fields['billing']['billing_postcode']);
unset($fields['billing']['billing_country']);
 unset($fields['billing']['billing_address_2']);
 unset($fields['billing']['billing_company']);
 unset($fields['billing']['billing_address_1']);
     return $fields;
}

function tp_custom_checkout_fields( $fields ) {$fields['city']['label'] = 'Địa chỉ'; return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'tp_custom_checkout_fields' );


// Code đếm số dòng trong văn bản
function count_paragraph( $insertion, $paragraph_id, $content ) {
        $closing_p = '</p>';
        $paragraphs = explode( $closing_p, $content );
        foreach ($paragraphs as $index => $paragraph) {
                if ( trim( $paragraph ) ) {
                        $paragraphs[$index] .= $closing_p;
                }
                if ( $paragraph_id == $index + 1 ) {
                        $paragraphs[$index] .= $insertion;
                }
        }
 
        return implode( '', $paragraphs );
}

//Chèn bài liên quan vào giữa nội dung
 
add_filter( 'the_content', 'prefix_insert_post_ads' );
 
function prefix_insert_post_ads( $content ) {
 
        $related_posts= "<div class='meta-related'>".do_shortcode('[related_posts_by_tax title=""]')."</div>";
 
        if ( is_single() ) {
                return count_paragraph( $related_posts, 1, $content );
        }
 
        return $content;
}

// Add custom Theme Functions here
add_filter('widget_text','execute_php',100);
function execute_php($html){
     if(strpos($html,"<"."?php")!==false){
          ob_start();
          eval("?".">".$html);
          $html=ob_get_contents();
          ob_end_clean();
     }
     return $html;
}

//Tùy chỉnh admin footer
function custom_admin_footer() { 
 echo 'Thiết kế bởi <a href="https://bizhostvn.com/" target="blank">Bizhostvn.com</a>';}
 add_filter('admin_footer_text', 'custom_admin_footer');



//Xóa logo wordpress
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

function the_dramatist_custom_login_css() {
    echo '<style type="text/css">.login h1:after{content:"Thi\1EBF t k\1EBF  website nhanh ch\00F3 ng, chuy\00EA n nghi\1EC7 p";font-size:16px;font-weight:normal;text-align:center}body #login{width:calc(100% - 30px);width:-webkit-calc(100% - 30px);width:-moz-calc(100% - 30px);width:-ms-calc(100% - 30px);width:-o-calc(100% - 30px);max-width:420px;background:#fff;padding:29px 24px 16px 24px!important;box-shadow:0 0 2rem 0 rgba(136,152,170,.15);border-radius:.375rem}body #login form{width:100%;margin:0 auto;box-shadow:none!important;border:0!important;padding:0!important}body #login .message{width:100%;margin-left:auto;margin-right:auto;box-shadow:none!important;color:#155724;background-color:#d4edda;border:1px solid #c3e6cb!important;border-radius:3px}body.login{display:flex;flex-direction:column;justify-content:center;align-items:center}body.login *{box-sizing:border-box}.login #backtoblog,.login #nav{padding:0!important}.login form .input,.login form input[type=checkbox],.login input[type=text]{background:#fff!important;font-size:16px;padding:0 12px;border:1px solid #DCE1E7;box-shadow:none!important}.login form .input:focus,.login form input[type=checkbox]:focus,.login input[type=text]:focus{border-color:#4DA6E8}.login #wp-submit{box-shadow: none !important;padding:2px 20px;background:#4DA6E8;background:linear-gradient(to right,#00d4fd,#338aff);background-image:linear-gradient(135deg,#03cffd 10%,#0396FF 100%);background-size:200% auto;border:0;outline:none!important}.login #wp-submit:hover{background-size:125% auto}.login #backtoblog a:hover,.login #nav a:hover{color:#4DA6E8}.login h1{margin-bottom:15px}.login h1 a{background-image:url('.str_replace("http://","",get_home_url()).'/logo.png)!important;width:150px!important;height:41px!important;background-size:150px 41px!important;margin-bottom:10px!important}</style>';
}
add_action('login_head', 'the_dramatist_custom_login_css');
// Thay doi duong dan logo admin
function wpc_url_login(){
return get_home_url(); // duong dan vao website cua ban
}
add_filter('login_headerurl', 'wpc_url_login');
//Xóa logo wordpress
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );

function remove_wp_logo( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'wp-logo' );
}
// hide update notifications
function remove_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
//add_filter('pre_site_transient_update_core','remove_core_updates'); //hide updates for WordPress itself
//add_filter('pre_site_transient_update_plugins','remove_core_updates'); //hide updates for all plugins
//add_filter('pre_site_transient_update_themes','remove_core_updates'); //hide updates for all themes// hide update notifications