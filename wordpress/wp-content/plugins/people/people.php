<?php
/*
/**
 * Plugin Name: People 
 * Plugin URI: http://hocwp.net // Địa chỉ trang chủ của plugin
 * Description: Đây là plugin đầu tiên mà tôi viết dành riêng cho WordPress, chỉ để học tập mà thôi. // Phần mô tả cho plugin
 * Version: 1.0 // Đây là phiên bản đầu tiên của plugin
 * Author: NoPu // Tên tác giả, người thực hiện plugin này
 * Author URI: http://sauhi.com // Địa chỉ trang chủ của tác giả
 * License: GPLv2 or later // Thông tin license của plugin, nếu không quan tâm thì bạn cứ để GPLv2 vào đây
 */

function register_mysettings() {
        register_setting( 'mfpd-settings-group', 'mfpd_option_name' );
}
 
function people_create_menu() {
        add_menu_page('My First Plugin Settings','Chúng tôi', 'administrator', __FILE__, 'people_add_page',plugins_url('/images/users-icon.png', __FILE__), 1);
        add_action( 'admin_init', 'register_mysettings' );
}
add_action('admin_menu', 'people_create_menu'); 

  
function people_add_page() {
?><?php
	if(isset($_POST["save"])){
		global $wpdb;
		$name = $_POST["name-people"];
		$tieusu = $_POST["tieusu-people"];
		$s = $wpdb->insert('wp_people',array( 'name' => $name, 'tieusu' => $tieusu ),array( '%s', '%s' ) );
		if($s){
			echo "success";
		}
		else
			echo "false";
	}
	else{ ?>
		<div class="wrap">
		<h2>Thêm Nhân Viên</h2>
		<form method="post" action="">
		    <?php settings_fields( 'mfpd-settings-group' ); ?>
		    <table class="form-table" border="1">
		        <tr valign="top">
		        	<th scope="row">Tên Nhân Viên</th>
		        	<td><input type="text" name="name-people" value="<?php echo get_option('mfpd_option_name'); ?>" /></td>
		        </tr>
		        <tr>
		        	<th>Tiểu sử</th>
		        	<td><textarea name="tieusu-people" id="tieusu" cols="30" rows="10" style="margin:2px; width:930px; height:205px"></textarea></td>
		        </tr>
		    </table>
		    <input type="submit" name="save" value="Lưu">
		</form>
		</div>
    <?php } ?>
<?php } ?>
