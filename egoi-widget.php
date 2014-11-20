<?php
/**
 * Egoi Mail List Builder Widget Class
**/
class EgoiMailListBuilderWooCommerceWooCommerceWidget extends WP_Widget {
	
	private $egoiMailListBuilderWooCommerceErrorCodes = array();

	private $egoiMailListBuilderWooCommerceID;

	function __construct() {
		require_once(EGOI_MAIL_LIST_BUILDER_WOOCOMMERCE_DIR.'includes/error_codes.php');
		$this->egoiMailListBuilderWooCommerceErrorCodes = $errorCodes;

		$widget_ops = array(
			'classname' => 'EgoiMailListBuilderWooCommerceWooCommerceWidget',
			'description' => 'Egoi Mail List Builder Woo Commerce Populator'
		);
		$this->WP_Widget(false, $name = 'Egoi Mail List Builder Woo Commerce Widget', $widget_ops);
		wp_enqueue_script('jquery');
	}
	
	function widget($args, $instance) {
		$EgoiMailListBuilderWooCommerce = get_option('EgoiMailListBuilderWooCommerceObject');

		extract( $args );
		$widgetid = $args['widget_id'];
		$this->egoiMailListBuilderWooCommerceID = $widgetid;
		
		$title = apply_filters('widget_title', $instance['title']);
		$fname = $instance['fname'];
		$lname = $instance['lname'];
		$email = $instance['email'];
		$mobile = $instance['mobile'];
		$language = $instance['language'];
		$bdate = $instance['bdate'];
		$list = $instance['list'];
		
		echo $before_widget;
		
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		?>
		<script type="text/javascript">
			jQuery(document).ready(function($){
				var cl = new CanvasLoader("LoadingImage<?php echo $this->egoiMailListBuilderWooCommerceID; ?>");
				cl.setColor('#ababab'); // default is '#000000'
				cl.setShape('spiral'); // default is 'oval'
				cl.setDiameter(28); // default is 40
				cl.setDensity(77); // default is 40
				cl.setRange(1); // default is 1.3
				cl.setSpeed(5); // default is 2
				cl.show(); // Hidden by default
				$("#egoi-mail-list-builder-woocommerce-submit-sub<?php echo $this->egoiMailListBuilderWooCommerceID; ?>").click(function() {  
					$(".error<?php echo $this->egoiMailListBuilderWooCommerceID; ?>").empty();
					$("#LoadingImage<?php echo $this->egoiMailListBuilderWooCommerceID; ?>").show();
					$.ajax({
						type : "POST",
						url : "index.php",
						data : { egoi_mail_list_builder_woocommerce_subscribe      : "submited",
									widget_postfname : $("input#egoi-mail-list-builder-woocommerce-woocommerce-fname-sub<?php echo $this->egoiMailListBuilderWooCommerceID; ?>").val(),
									widget_postlname : $("input#egoi-mail-list-builder-woocommerce-lname-sub<?php echo $this->egoiMailListBuilderWooCommerceID; ?>").val(),
									widget_postemail : $("input#egoi-mail-list-builder-woocommerce-email-sub<?php echo $this->egoiMailListBuilderWooCommerceID; ?>").val(),
									widget_postmobile : $("input#egoi-mail-list-builder-woocommerce-mobile-sub<?php echo $this->egoiMailListBuilderWooCommerceID; ?>").val(),
									widget_postlanguage : $("select#egoi-mail-list-builder-woocommerce-language-sub<?php echo $this->egoiMailListBuilderWooCommerceID; ?>").val(),
									widget_postbdate : $("input#egoi-mail-list-builder-woocommerce-bdate-sub<?php echo $this->egoiMailListBuilderWooCommerceID; ?>").val(),
									widget_postlist : $("input#egoi-mail-list-builder-woocommerce-list-sub<?php echo $this->egoiMailListBuilderWooCommerceID; ?>").val(),
									widget_postid : $("input#egoi-mail-list-builder-woocommerce-id-sub<?php echo $this->egoiMailListBuilderWooCommerceID; ?>").val()
						},
						success : function(response) {
							// The server has finished executing PHP and has returned something,
							// so display it!
							$("#LoadingImage<?php echo $this->egoiMailListBuilderWooCommerceID; ?>").hide();
							$("#<?php echo $widgetid; ?>").append(response);
						}
					});
					return false;
				});
			});
		</script>
		<?php
		
		echo "<form name='egoi-mail-list-builder-woocommerce-widget-form".$this->egoiMailListBuilderWooCommerceID."' id='egoi-mail-list-builder-woocommerce-widget-form".$this->egoiMailListBuilderWooCommerceID."' action='' method='post'>";
		if ( $fname ) {
			echo "<label>".$EgoiMailListBuilderWooCommerce->FIRST_NAME."</label>";
			if($EgoiMailListBuilderWooCommerce->FIRST_NAME_F) echo "<label style='color:red;'>*</label>";
			echo "<div class='widget-text'><input style='width:100%; margin-bottom: 10px;' type='text' name='egoi-mail-list-builder-woocommerce-fname-sub".$this->egoiMailListBuilderWooCommerceID."' id='egoi-mail-list-builder-woocommerce-fname-sub".$this->egoiMailListBuilderWooCommerceID."' /></div>";
		}
		if ( $lname ) {
			echo "<label>".$EgoiMailListBuilderWooCommerce->LAST_NAME."</label>";
			if($EgoiMailListBuilderWooCommerce->LAST_NAME_F) echo "<label style='color:red;'>*</label>";
			echo "<div class='widget-text'><input style='width:100%; margin-bottom: 10px;' type='text' name='egoi-mail-list-builder-woocommerce-lname-sub".$this->egoiMailListBuilderWooCommerceID."' id='egoi-mail-list-builder-woocommerce-lname-sub".$this->egoiMailListBuilderWooCommerceID."' /></div>";
		}
		echo "<label>".$EgoiMailListBuilderWooCommerce->EMAIL."</label>";
		echo "<label style='color:red;'>*</label>";
		echo "<div class='widget-text'><input style='width:100%; margin-bottom: 10px;' type='text' name='egoi-mail-list-builder-woocommerce-email-sub".$this->egoiMailListBuilderWooCommerceID."' id='egoi-mail-list-builder-woocommerce-email-sub".$this->egoiMailListBuilderWooCommerceID."' /></div>";
		if ( $mobile ) {
			echo "<label>".$EgoiMailListBuilderWooCommerce->MOBILE."</label>";
			if($EgoiMailListBuilderWooCommerce->MOBILE_F) echo "<label style='color:red;'>*</label>";
			echo "<div class='widget-text'><input style='width:100%; margin-bottom: 10px;' type='text' name='egoi-mail-list-builder-woocommerce-mobile-sub".$this->egoiMailListBuilderWooCommerceID."' id='egoi-mail-list-builder-woocommerce-mobile-sub".$this->egoiMailListBuilderWooCommerceID."' /></div>";
		}
		if ( $language ) {
			echo "<label>".$EgoiMailListBuilderWooCommerce->LANGUAGE."</label>";
			if($EgoiMailListBuilderWooCommerce->LANGUAGE_F) echo "<label style='color:red;'>*</label>";
			echo "<div class='widget-text' style='margin-bottom: 10px;'>";
			echo "<select style='padding-top: 5px; padding-bottom: 5px; padding-right: 6px; width: 100%;' name='egoi-mail-list-builder-woocommerce-language-sub".$this->egoiMailListBuilderWooCommerceID."' id='egoi-mail-list-builder-woocommerce-language-sub".$this->egoiMailListBuilderWooCommerceID."'>";
			echo "<option value='en'>".$EgoiMailListBuilderWooCommerce->LANGUAGE_T_EN."</option>";
			echo "<option value='fr'>".$EgoiMailListBuilderWooCommerce->LANGUAGE_T_FR."</option>";
			echo "<option value='de'>".$EgoiMailListBuilderWooCommerce->LANGUAGE_T_DE."</option>";
			echo "<option value='pt'>".$EgoiMailListBuilderWooCommerce->LANGUAGE_T_PT_PT."</option>";
			echo "<option value='br'>".$EgoiMailListBuilderWooCommerce->LANGUAGE_T_PT_BR."</option>";
			echo "<option value='es'>".$EgoiMailListBuilderWooCommerce->LANGUAGE_T_ES."</option>";
			echo "</select>";
			echo "</div>";
		}
		if ( $bdate ) {
			echo "<label>".$EgoiMailListBuilderWooCommerce->BIRTH_DATE."</label>";
			if($EgoiMailListBuilderWooCommerce->BIRTH_DATE_F) echo "<label style='color:red;'>*</label>";
			echo "<div class='widget-text'><input style='width:100%; margin-bottom: 10px;' type='text' name='egoi-mail-list-builder-woocommerce-bdate-sub".$this->egoiMailListBuilderWooCommerceID."' id='egoi-mail-list-builder-woocommerce-bdate-sub".$this->egoiMailListBuilderWooCommerceID."' /></div>";
			echo "<script>";
			  echo "jQuery(function() {";
			  echo "jQuery( '#egoi-mail-list-builder-woocommerce-bdate-sub".$this->egoiMailListBuilderWooCommerceID."' ).datepicker();";
			  echo "jQuery( '#egoi-mail-list-builder-woocommerce-bdate-sub".$this->egoiMailListBuilderWooCommerceID."' ).datepicker( 'option', 'dateFormat', 'yy-mm-dd' );";
			  echo "});";
			 echo "</script>";
		}
		echo "<input type='hidden' name='egoi-mail-list-builder-woocommerce-list-sub".$this->egoiMailListBuilderWooCommerceID."' id='egoi-mail-list-builder-woocommerce-list-sub".$this->egoiMailListBuilderWooCommerceID."' value='".$list."' />";
		echo "<input type='hidden' name='egoi-mail-list-builder-woocommerce-id-sub".$this->egoiMailListBuilderWooCommerceID."' id='egoi-mail-list-builder-woocommerce-id-sub".$this->egoiMailListBuilderWooCommerceID."' value='".$this->egoiMailListBuilderWooCommerceID."' />";
		echo "<br /><input type='submit' style='margin-bottom: 15px; width:100%;' name='egoi-mail-list-builder-woocommerce-submit-sub".$this->egoiMailListBuilderWooCommerceID."' id='egoi-mail-list-builder-woocommerce-submit-sub".$this->egoiMailListBuilderWooCommerceID."' value='".$EgoiMailListBuilderWooCommerce->SUBSCRIBE."' />";
		echo "</form>";
		echo "<div id='LoadingImage".$this->egoiMailListBuilderWooCommerceID."'style='display: none; width: 24px; margin: 0 auto;'>";
		echo "</div>";
		echo "<style>";
		echo ".errorcenter{text-align:center;}";
		echo "</style>";
        echo $after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['fname'] = strip_tags($new_instance['fname']);
		$instance['lname'] = strip_tags($new_instance['lname']);
		$instance['email'] = strip_tags($new_instance['email']);
		$instance['mobile'] = strip_tags($new_instance['mobile']);
		$instance['language'] = strip_tags($new_instance['language']);
		$instance['bdate'] = strip_tags($new_instance['bdate']);
		$instance['list'] = strip_tags($new_instance['list']);
		return $instance;
	}
	
	function form($instance) {
		 $instance = wp_parse_args( 
            (array)$instance, 
				array( 
					'title' => '', 
					'fname' => '',
					'lname' => '',
					'email' => '',
					'mobile' => '',
					'language' => '',
					'bdate' => '',
					'list' => ''
            )
        ); 
		
		$title = esc_attr($instance['title']);
		$fname = esc_attr($instance['fname']);
		$lname = esc_attr($instance['lname']);
		$email = esc_attr($instance['email']);
		$mobile = esc_attr($instance['mobile']);
		$language = esc_attr($instance['language']);
		$bdate = esc_attr($instance['bdate']);
		$list = esc_attr($instance['list']);
		
		$EgoiMailListBuilderWooCommerce = get_option('EgoiMailListBuilderWooCommerceObject');
		$result = $EgoiMailListBuilderWooCommerce->getLists();
		 ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Widget Title'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
			<label>List: </label>
			<select class="widefat" id="<?php echo $this->get_field_id('list'); ?>" name="<?php echo $this->get_field_name('list'); ?>">
			<?php
			for($x = 0;$x < count($result); $x++) {
				?>
				<option <?php if ($list == $result[$x]['listnum']) echo 'selected'; ?> value='<?php echo $result[$x]['listnum']; ?>'><?php echo $result[$x]['title']; ?></option>
				<?php
			}
			?>
			</select>
		</p>
		<p>
			<input class="checkbox" id="<?php echo $this->get_field_id('fname'); ?>" name="<?php echo $this->get_field_name('fname'); ?>" type="checkbox" <?php if($fname){ echo 'checked="checked"';} ?> value="First Name" />
			<label for="<?php echo $this->get_field_name('fname'); ?>">First Name: </label>
			
		</p>
		<p>
			<input class="checkbox" id="<?php echo $this->get_field_id('lname'); ?>" name="<?php echo $this->get_field_name('lname'); ?>" type="checkbox" <?php if($lname){ echo 'checked="checked"';} ?> value="Last Name" />
			<label for="<?php echo $this->get_field_name('lname'); ?>">Last Name: </label>
		</p>
		<p>
			<input class="checkbox" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_id('email'); ?>" type="checkbox" checked="checked" value="Email" disabled="disabled"/>
			<label for="<?php echo $this->get_field_id('email'); ?>">Email: </label>
		</p>
		<p>
			<input class="checkbox" id="<?php echo $this->get_field_id('mobile'); ?>" name="<?php echo $this->get_field_name('mobile'); ?>" type="checkbox" <?php if($mobile){ echo 'checked="checked"';} ?> value="Mobile" />
			<label for="<?php echo $this->get_field_name('mobile'); ?>">Mobile: </label>
		</p>
		<p>
			<input class="checkbox" id="<?php echo $this->get_field_id('language'); ?>" name="<?php echo $this->get_field_name('language'); ?>" type="checkbox" <?php if($language){ echo 'checked="checked"';} ?> value="Language" />
			<label for="<?php echo $this->get_field_name('language'); ?>">Language: </label>
		</p>
		<p>
			<input class="checkbox" id="<?php echo $this->get_field_id('bdate'); ?>" name="<?php echo $this->get_field_name('bdate'); ?>" type="checkbox" <?php if($bdate){ echo 'checked="checked"';} ?> value="Birth Date" />
			<label for="<?php echo $this->get_field_name('bdate'); ?>">Birth Date: </label>
		</p>
		<?php
		
	}
}

function egoi_mail_list_builder_woocommerce_request_handler() {
	if(isset($_POST['egoi_mail_list_builder_woocommerce_subscribe']) && ($_POST['egoi_mail_list_builder_woocommerce_subscribe'] == "submited")) {
		$id = $_POST['widget_postid'];

		$EgoiMailListBuilderWooCommerce = get_option('EgoiMailListBuilderWooCommerceObject');
		$errorDesc = "";
		if(isset($_POST['widget_postfname'])) {
			if($EgoiMailListBuilderWooCommerce->FIRST_NAME_F){
				if($_POST['widget_postfname'] != ''){
					$postfname = $_POST['widget_postfname'];	
				}
				else{
					echo "<div class='errorcenter error".$id."'>".$EgoiMailListBuilderWooCommerce->FIRST_NAME_E."</div>";
					exit();
				}
			}
			else {
				$postfname = $_POST['widget_postfname'];
			}
		}
		else {
			$postfname = "";
		}
		if(isset($_POST['widget_postlname'])) {
			if($EgoiMailListBuilderWooCommerce->LAST_NAME_F){
				if($_POST['widget_postlname'] != ''){
					$postlname = $_POST['widget_postlname'];
				}
				else{
					echo "<div class='errorcenter error".$id."'>".$EgoiMailListBuilderWooCommerce->LAST_NAME_E."</div>";
					exit();
				}
			}
			else {
				$postlname = $_POST['widget_postlname'];
			}
		}
		else {
			$postlname = "";
		}
		if(isset($_POST['widget_postemail'])) {
			if($_POST['widget_postemail'] != '') {
				$postemail = $_POST['widget_postemail'];
			}
			else {
				echo "<div class='errorcenter errorcenter error".$id."'>".$EgoiMailListBuilderWooCommerce->EMAIL_E."</div>";
				exit();
			}
		}
		else {
			echo "<div class='errorcenter error".$id."'>".$EgoiMailListBuilderWooCommerce->EMAIL_E."</div>";
			exit();
		}
		if(isset($_POST['widget_postmobile'])) {
			if($EgoiMailListBuilderWooCommerce->MOBILE_F){
				if($_POST['widget_postmobile'] != ''){
					$postmobile = $_POST['widget_postmobile'];
				}
				else{
					echo "<div class='errorcenter error".$id."'>".$EgoiMailListBuilderWooCommerce->MOBILE_E."</div>";
					exit();
				}
			}
			else {
				$postmobile = $_POST['widget_postmobile'];
			}
		}
		else {
			$postmobile = "";
		}
		if(isset($_POST['widget_postlanguage'])) {
			if($EgoiMailListBuilderWooCommerce->LANGUAGE_F){
				if($_POST['widget_postlanguage'] != ''){
					$postlanguage = $_POST['widget_postlanguage'];
				}
				else{
					echo "<div class='errorcenter error".$id."'>".$EgoiMailListBuilderWooCommerce->LANGUAGE_E."</div>";
					exit();
				}
			}
			else {
				$postlanguage = $_POST['widget_postlanguage'];
			}
		}
		else {
			$postlanguage = "";
		}
		if(isset($_POST['widget_postbdate'])) {
			if($EgoiMailListBuilderWooCommerce->BIRTH_DATE_F){
				if($_POST['widget_postbdate'] != ''){
					$postbdate = $_POST['widget_postbdate'];
				}
				else{
					echo "<div class='errorcenter error".$id."'>".$EgoiMailListBuilderWooCommerce->BIRTH_DATE_E."</div>";
					exit();
				}
			}
			else {
				$postbdate = $_POST['widget_postbdate'];
			}
		}
		else {
			$postbdate = "";
		}
		if(isset($_POST['widget_postlist'])) {
			$postlist = $_POST['widget_postlist'];
		}
		else {
			echo "<div class='errorcenter error".$id."'>".$EgoiMailListBuilderWooCommerce->LIST_E."</div>";
			exit();
		}

		$EgoiMailListBuilderWooCommerce = get_option('EgoiMailListBuilderWooCommerceObject');
		$result = $EgoiMailListBuilderWooCommerce->addSubscriber(
		$postlist,
		$postfname,
		$postlname,
		$postemail,
		$postmobile,
		$postlanguage,
		$postbdate
		);

		if($result){
			echo "<div class='errorcenter error".$id."'>".$result."</div>";
			die();
		}
		else{
			echo "<div class='errorcenter error".$id."'>".$EgoiMailListBuilderWooCommerce->SUCCESS_E."</div>";
			exit();
		}
	}
}

/**
 * Initiate Egoi Mail List Builder Widget
**/
function egoi_mail_list_builder_woocommerce_widget_init() {
	register_widget('EgoiMailListBuilderWooCommerceWooCommerceWidget'); 
	add_action('init', 'egoi_mail_list_builder_woocommerce_request_handler');  
}

add_action('widgets_init', 'egoi_mail_list_builder_woocommerce_widget_init');
?>