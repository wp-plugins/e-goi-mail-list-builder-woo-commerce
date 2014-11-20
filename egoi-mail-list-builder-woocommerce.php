<?php



/**



Plugin Name: e-goi Mail List Builder Woo Commerce



Description: Mail list database populator



Version: 1.0.2



Author: Indot



Author URI: http://indot.pt



Plugin URI: http://indot.pt/egoi-mail-list-builder-woocommerce.zip



License: GPLv2 or later



**/







/**  



	Copyright 2013  Indot  (email : info@indot.pt)







    This program is free software; you can redistribute it and/or modify



    it under the terms of the GNU General Public License, version 2, as 



    published by the Free Software Foundation.







    This program is distributed in the hope that it will be useful,



    but WITHOUT ANY WARRANTY; without even the implied warranty of



    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the



    GNU General Public License for more details.







    You should have received a copy of the GNU General Public License



    along with this program; if not, write to the Free Software



    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA



**/







/**



 * Define some useful constants



**/



define('EGOI_MAIL_LIST_BUILDER_WOOCOMMERCE_VERSION', '1.0.2');



define('EGOI_MAIL_LIST_BUILDER_WOOCOMMERCE_DIR', plugin_dir_path(__FILE__));



define('EGOI_MAIL_LIST_BUILDER_WOOCOMMERCE_URL', plugin_dir_url(__FILE__));



define('EGOI_MAIL_LIST_BUILDER_WOOCOMMERCE_PLUGIN_KEY', '32e2fdda537c84209670c2a2421d6318');



define('EGOI_MAIL_LIST_BUILDER_WOOCOMMERCE_API_KEY', '0038eca8c4fa8e4e140be9cd8f735d8cad634187');



define('EGOI_MAIL_LIST_BUILDER_WOOCOMMERCE_XMLRPC_URL', 'http://api.e-goi.com/v2/xmlrpc.php');



define('EGOI_MAIL_LIST_BUILDER_WOOCOMMERCE_AFFILIATE',' http://bo.e-goi.com/?action=registo&cID=232&aff=267d5afc22');







/**



 * Load files



**/



function egoi_mail_list_builder_woocommerce_activation() {



	set_include_path(EGOI_MAIL_LIST_BUILDER_WOOCOMMERCE_DIR.'library/'. PATH_SEPARATOR . get_include_path());



	require_once(EGOI_MAIL_LIST_BUILDER_WOOCOMMERCE_DIR.'includes/class.xmlrpc.php');



	require_once(EGOI_MAIL_LIST_BUILDER_WOOCOMMERCE_DIR.'library/Zend/XmlRpc/Client.php');



    if(is_admin()) {



        require_once(EGOI_MAIL_LIST_BUILDER_WOOCOMMERCE_DIR.'includes/admin.php');



	}



	



	require_once(EGOI_MAIL_LIST_BUILDER_WOOCOMMERCE_DIR.'includes/class.egoi_mail_list_builder_woocommerce.php');



	$EgoiMailListBuilderWooCommerce = get_option('EgoiMailListBuilderWooCommerceObject');



	if($EgoiMailListBuilderWooCommerce) {



		if($EgoiMailListBuilderWooCommerce->isAuthed() && in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ))	{



			require_once(EGOI_MAIL_LIST_BUILDER_WOOCOMMERCE_DIR.'egoi-widget.php');



		}



	}







}



egoi_mail_list_builder_woocommerce_activation();







/**



 * Activation, Deactivation and Uninstall Functions



**/



register_activation_hook(__FILE__, 'egoi_mail_list_builder_woocommerce_activation');



register_deactivation_hook(__FILE__, 'egoi_mail_list_builder_woocommerce_deactivation');











/**



 * Filter Registration



**/







add_filter('plugin_action_links', 'egoi_mail_list_builder_woocommerce_settings_link', 10, 2);







/**



 * Add Egoi Mail List Builder Settings link to plugin page



**/



function egoi_mail_list_builder_woocommerce_settings_link($links, $file) {



	static $this_plugin;



	



	if (!$this_plugin) {



        $this_plugin = plugin_basename(__FILE__);



    }



	



	if ($file == $this_plugin) {



		$settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/admin.php?page=egoi-mail-list-builder-woocommerce-info">Settings</a>';



		array_unshift($links, $settings_link);



	}



	



	return $links;



}







function egoi_mail_list_builder_woocommerce_register_scripts() {



    wp_enqueue_style( 'egoi-mail-list-builder-woocommerce-admin-css', EGOI_MAIL_LIST_BUILDER_WOOCOMMERCE_URL . 'assets/css/admin.css' );



}



add_action( 'admin_enqueue_scripts', 'egoi_mail_list_builder_woocommerce_register_scripts' );











/*function egoi_mail_list_builder_settings_plugin_link( $links, $file) 



{



	if($file == plugin_basename(EGOI_MAIL_LIST_BUILDER_WOOCOMMERCE_DIR.'/indot-under.php')){



		$in = '<a href="admin.php?page=egoi-mail-list-builder-woocommerce-info">Settings</a>';



        array_unshift($links, $in);



	}



    return $links;



}



add_filter( 'plugin_action_links', 'egoi_mail_list_builder_woocommerce_settings_plugin_link', 10, 2 );*/







/**



 * Plugin deactivation code



**/



function egoi_mail_list_builder_woocommerce_deactivation() {  



	//delete_option('EgoiMailListBuilderObject');



}







function egoi_mail_list_builder_woocommerce_fields_logged_in($fields) {



	$EgoiMailListBuilderWooCommerce = get_option('EgoiMailListBuilderWooCommerceObject');



	if($EgoiMailListBuilderWooCommerce->subscribe_enable){



		global $current_user;



		get_currentuserinfo();



		$status = $EgoiMailListBuilderWooCommerce->checkSubscriber($EgoiMailListBuilderWooCommerce->subscribe_list, $current_user->user_email);



		if($status == -1){



    		$fields .= "<input type='checkbox' name='egoi_mail_list_builder_woocommerce_subscribe' id='egoi_mail_list_builder_woocommerce_subscribe' value='subscribe' checked/> ".$EgoiMailListBuilderWooCommerce->subscribe_text;



    	}



	}



    return $fields;



}



add_filter('comment_form_logged_in','egoi_mail_list_builder_woocommerce_fields_logged_in');











function egoi_mail_list_builder_woocommerce_fields_logged_out($fields) {



	$EgoiMailListBuilderWooCommerce = get_option('EgoiMailListBuilderWooCommerceObject');



	if($EgoiMailListBuilderWooCommerce->subscribe_enable){



    	$fields["subscribe"] = "<input type='checkbox' name='egoi_mail_list_builder_woocommerce_subscribe' id='egoi_mail_list_builder_woocommerce_subscribe' value='subscribe' checked/> ".$EgoiMailListBuilderWooCommerce->subscribe_text;



	}



    return $fields;



}



add_filter('comment_form_default_fields','egoi_mail_list_builder_woocommerce_fields_logged_out');







function egoi_mail_list_builder_woocommerce_comment_process($commentdata) {



    if(isset($_POST['egoi_mail_list_builder_woocommerce_subscribe'])){



    	if($_POST['egoi_mail_list_builder_woocommerce_subscribe'] == "subscribe"){



    		//die();



    		$EgoiMailListBuilderWooCommerce = get_option('EgoiMailListBuilderWooCommerceObject');



			$result = $EgoiMailListBuilderWooCommerce->addSubscriber(



				$EgoiMailListBuilderWooCommerce->subscribe_list,



				$commentdata['comment_author'],



				'',



				$commentdata['comment_author_email']



			);



    	}



    }



    return $commentdata;



}



add_filter( 'preprocess_comment', 'egoi_mail_list_builder_woocommerce_comment_process' );







function egoi_mail_list_builder_woocommerce_register_user_scripts($hook) {



	wp_enqueue_script( 'jquery');



	wp_enqueue_script( 'jquery-ui-datepicker');



	wp_enqueue_style( 'indot-jquery-ui-css', EGOI_MAIL_LIST_BUILDER_WOOCOMMERCE_URL . 'assets/css/jquery-ui.min.css');



	wp_enqueue_script( 'canvas-loader', EGOI_MAIL_LIST_BUILDER_WOOCOMMERCE_URL . 'assets/js/heartcode-canvasloader-min.js');



}



add_action( 'wp_enqueue_scripts', 'egoi_mail_list_builder_woocommerce_register_user_scripts' );















function egoi_mail_list_builder_woocommerce_checkout($checkout ) {



	$EgoiMailListBuilderWooCommerce = get_option('EgoiMailListBuilderWooCommerceObject');



	if($EgoiMailListBuilderWooCommerce->subscribe_enable_checkout){







		$EgoiMailListBuilderWooCommerce = get_option('EgoiMailListBuilderWooCommerceObject');



		if($EgoiMailListBuilderWooCommerce->hide_subscribe == false){



		 	$checked = $checkout->get_value( 'egoi_mail_list_builder_woocommerce_subscribe_field' ) ? $checkout->get_value( 'egoi_mail_list_builder_woocommerce_subscribe_field' ) : 1;



		    woocommerce_form_field( 'egoi_mail_list_builder_woocommerce_subscribe_field', array(



		        'type'          => 'checkbox',



		        'class'         => array('input-checkbox'),



		        'label'         => $EgoiMailListBuilderWooCommerce->subscribe_text,



		        'required'  => false,



		        ), $checked);



	   	}

    }



}



add_filter('woocommerce_after_order_notes','egoi_mail_list_builder_woocommerce_checkout');







function egoi_mail_list_builder_woocommerce_checkout_meta( $order_id ) {



	$EgoiMailListBuilderWooCommerce = get_option('EgoiMailListBuilderWooCommerceObject');



	echo($EgoiMailListBuilderWooCommerce->subscribe_enable_checkout);

	echo ($EgoiMailListBuilderWooCommerce->hide_subscribe);



    if ($_POST['egoi_mail_list_builder_woocommerce_subscribe_field'] || ($EgoiMailListBuilderWooCommerce->subscribe_enable_checkout && $EgoiMailListBuilderWooCommerce->hide_subscribe)){

    	



    	$result = $EgoiMailListBuilderWooCommerce->addSubscriber(



			$EgoiMailListBuilderWooCommerce->subscribe_list,



			$_POST['billing_first_name'],



			$_POST['billing_last_name'],



			$_POST['billing_email'],



			$_POST['billing_phone'],



			$_POST['billing_country']



		);

    	



    };



}



add_action('woocommerce_checkout_update_order_meta', 'egoi_mail_list_builder_woocommerce_checkout_meta');















function egoi_mail_list_builder_woocommerce_myaccount(){



	$EgoiMailListBuilderWooCommerce = get_option('EgoiMailListBuilderWooCommerceObject');



	if($EgoiMailListBuilderWooCommerce->subscribe_enable_myaccount){



		global $current_user;



		get_currentuserinfo();



		$status = $EgoiMailListBuilderWooCommerce->checkSubscriber($EgoiMailListBuilderWooCommerce->subscribe_list, $current_user->user_email);



		if($status == -1){



			echo "<form name='egoi_mail_list_builder_woocommerce_myaccount_form' method='POST' action='".$_SERVER['REQUEST_URI']."'>";



			echo "<input type='submit' name='egoi_mail_list_builder_woocommerce_subscribe_field' value='".$EgoiMailListBuilderWooCommerce->subscribe_text."' />";



			echo "</form>";



		}



	}



}



add_action('woocommerce_after_my_account', 'egoi_mail_list_builder_woocommerce_myaccount');







function egoi_mail_list_builder_woocommerce_before_myaccount(){



	if (isset($_POST['egoi_mail_list_builder_woocommerce_subscribe_field'])){



		$EgoiMailListBuilderWooCommerce = get_option('EgoiMailListBuilderWooCommerceObject');



		global $current_user;



		get_currentuserinfo();



		$result = $EgoiMailListBuilderWooCommerce->addSubscriber(



			$EgoiMailListBuilderWooCommerce->subscribe_list,



			$current_user->display_name,



			'',



			$current_user->user_email



		);



	}



}



add_action('woocommerce_before_my_account', 'egoi_mail_list_builder_woocommerce_before_myaccount');







function egoi_mail_list_builder_woocommerce_registration(){



	$EgoiMailListBuilderWooCommerce = get_option('EgoiMailListBuilderWooCommerceObject');



	if($EgoiMailListBuilderWooCommerce->subscribe_enable_checkout){



		global $current_user;



		get_currentuserinfo();



		$status = $EgoiMailListBuilderWooCommerce->checkSubscriber($EgoiMailListBuilderWooCommerce->subscribe_list, $current_user->user_email);



		if($status == -1){



    		//echo "<input type='checkbox' name='egoi_mail_list_builder_woocommerce_subscribe' id='egoi_mail_list_builder_woocommerce_subscribe' value='subscribe' checked/> ".$EgoiMailListBuilderWooCommerce->subscribe_text;



			echo "<input type='checkbox' name='egoi_mail_list_builder_woocommerce_subscribe' id='egoi_mail_list_builder_woocommerce_subscribe' value='subscribe'/> ".$EgoiMailListBuilderWooCommerce->subscribe_text;



    	}



	}



}



add_action('register_form','egoi_mail_list_builder_woocommerce_registration');







function egoi_mail_list_builder_woocommerce_registration_validation($user_id) {



    if (isset($_POST['egoi_mail_list_builder_woocommerce_subscribe'])){



		$EgoiMailListBuilderWooCommerce = get_option('EgoiMailListBuilderWooCommerceObject');



		$result = $EgoiMailListBuilderWooCommerce->addSubscriber(



			$EgoiMailListBuilderWooCommerce->subscribe_list,



			$_POST['user_login'],



			'',



			$_POST['user_email']



		);



	}



}



add_action('user_register', 'egoi_mail_list_builder_woocommerce_registration_validation');



?>