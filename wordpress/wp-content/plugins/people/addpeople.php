<?php
require_once('../../../wp-config.php');
require_once('../../../wp-include/wp-dp.php');
global $wpdb;
echo $_POST['name-people'];
echo $_POST['tieusu-people'];
$wpdb->insert('wp_people',array( 'name' => $_POST['name-people'], 'tieusu' => $_POST['tieusu-people'] ),array( '%s', '%s' ) );

?>