<?php
/**
 * Plugin Name: Aragon Connect
 * Plugin URI: 
 * Description: Aragon Connect.
 * Version: 1.0
 * Author: Jamil Bashir
 * Author URI: 
 */
/**
 * WordPress Setting Page for a React.
 *
*/
/*if directly call this file its abort */
 
if (!defined('tmg_plugin_version')) {
	define('tmg_plugin_version','1.0.0');
}

/* define path of the files */

if (!defined('tmg_plugin_dir')) {
	define('tmg_plugin_dir',plugin_dir_url(__FILE__));
}

if (!function_exists('tmg_plugin_scripts')) {
	function tmg_plugin_scripts()
	{
		wp_enqueue_style('tmg-css',tmg_plugin_dir.'assets/css/style.css');
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script('tmg-js',tmg_plugin_dir.'assets/js/main.js','jQuery','1.0.0',true);
		wp_enqueue_script('tmg-ajax',tmg_plugin_dir.'assets/js/ajax.js','jQuery','1.0.0',true);
		wp_enqueue_script('tmg-ajax',tmg_plugin_dir.'./index.js','jQuery','1.0.0',true);
		
		// For admin ajax Run
		wp_localize_script('tmg-ajax', 'tmg_ajax_url', array(
		   'ajax_url' => admin_url('admin-ajax.php')
		));
	}
	add_action('wp_enqueue_scripts','tmg_plugin_scripts');
}
 
function tmg_register_aragon_settings_html() {
     ?>
     <div class="wrap">
     	<h1 style="padding: 10px;background: #333;color: #fff"><?= esc_html(get_admin_page_title()); ?></h1>
     	<form method="post" action="options.php">
     		<?php 
     			settings_fields('tmg-settings');
     			do_settings_sections('tmg-settings');
     			submit_button('Save Changes');
     		?>
     	</form>
     </div>
<?php } 

function aragon_register_menu_page() {
	add_menu_page('Aragon Voting','Aragon Settings','manage_options','tmg-settings','tmg_register_aragon_settings_html','dashicons-thumbs-up',30);
}

add_action('admin_menu','aragon_register_menu_page');

/* Label Settings */
function tmg_plugin_settings() {
	register_setting('tmg-settings','tmg_vote_btn_label');
	add_settings_section('tmg_lable_settings_section','Tmg Button Labels','tmg_plugin_settings_section_cb','tmg-settings');
	add_settings_field('tmg_vote_label_field','Vote Button Label','tmg_vote_label_cb','tmg-settings','tmg_lable_settings_section');
}

add_action('admin_init','tmg_plugin_settings');

function tmg_plugin_settings_section_cb() {
	echo "Define Button Label";
}
function tmg_vote_label_cb(){
	$settings = get_option('tmg_vote_btn_label'); ?>
	<input type="text" name="tmg_vote_btn_label" value="<?php echo isset($settings) ? esc_attr($settings) : ''; ?>">

<?php }

function tmg_vote_table(){
	global $wpdb;
	$table_name = $wpdb->prefix . "aragonVoting"; 
	$charset_collate = $wpdb->get_charset_collate();
	$sql = "CREATE TABLE IF NOT EXISTS $table_name (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
	  user_id mediumint(9) NOT NULL,
	  post_id mediumint(9) NOT NULL,
	  vote_count mediumint(9) NOT NULL,
	  PRIMARY KEY  (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

register_activation_hook( __FILE__, 'tmg_vote_table' );


function tmg_vote_button($content){
	$user_id = get_current_user_id();
	$post_id = get_the_ID();
	$vot_label_val = get_option('tmg_vote_btn_label','Vote');
	$vote_btn_wrap = '<div class="tmg-buttons-controller">';
	$vote_btn = '<a href="javascript:;" onclick="tmg_vote_btn_ajax('.$post_id.','.$user_id.')" class="tmg-btn tmg-vote-btn">'.$vot_label_val.'</a>';
	
	$vote_btn_wrap_end = '</div>'; 

	$tmg_ajax_response = '<div id="tmgAjaxResponse" class="tmg-ajax-response"><span>Thanks</span></div>';

	$content .= $vote_btn_wrap;
	$content .= $vote_btn;
	$content .= $vote_btn_wrap_end;
	$content .= $tmg_ajax_response;
	return $content;
}

add_filter('the_content','tmg_vote_button');

function tmg_vote_btn_ajax_action(){
	global $wpdb;
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    $table_name = "wp_aragonvoting";
    if(isset($_POST['pid']) && isset($_POST['uid'])) {

        $user_id = $_POST['uid'];
        $post_id = $_POST['pid'];

        $check_like = $wpdb->get_var( "SELECT COUNT(*) FROM $table_name WHERE user_id='$user_id' AND post_id='$post_id' AND vote_count=1 " );

        if($check_like > 0) {
            echo "Sorry, buyt you already liked this post!";
        }
        else {
            $wpdb->insert( 
                ''.$table_name.'', 
                array( 
                    'post_id' => $_POST['pid'], 
                    'user_id' => $_POST['uid'],
                    'vote_count' => 1
                ), 
                array( 
                    '%d', 
                    '%d',
                    '%d'
                )
            );
            if($wpdb->insert_id) {
                echo "Thank you for loving this post!";
            }
        }
        
    }
    wp_die();
}
add_action('wp_ajax_tmg_vote_btn_ajax_action','tmg_vote_btn_ajax_action');
add_action('wp_ajax_nopriv_tmg_vote_btn_ajax_action','tmg_vote_btn_ajax_action');

register_deactivation_hook( __FILE__, 'tmg_remove_db_table_deactive' );
function tmg_remove_db_table_deactive() {
     global $wpdb;
     $table_name = 'wp_aragonvoting';
     $sql = "DROP TABLE IF EXISTS $table_name";
     $wpdb->query($sql);
     delete_option("my_plugin_db_version");
} 
?>
<div id="root"></div>