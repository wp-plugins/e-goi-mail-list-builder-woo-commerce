	<?php $EgoiMailListBuilderWooCommerce = get_option('EgoiMailListBuilderWooCommerceObject'); ?>
	<div class='wrap'>
	<div id="icon-egoi-mail-list-builder-woocommerce-widget-settings" class="icon32"></div>
	<h2>Widget Settings</h2>
	<?php require('donate.php'); ?>
	<?php if($EgoiMailListBuilderWooCommerce->isAuthed() && in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ))	{
		if(isset($_POST['egoi_mail_list_builder_woocommerce_widget_settings_save'])) {
			$EgoiMailListBuilderWooCommerce->FIRST_NAME = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_fname'];
			$EgoiMailListBuilderWooCommerce->LAST_NAME = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_lname'];
			$EgoiMailListBuilderWooCommerce->EMAIL = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_email'];
			$EgoiMailListBuilderWooCommerce->MOBILE = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_mobile'];
			$EgoiMailListBuilderWooCommerce->LANGUAGE = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_language'];
			$EgoiMailListBuilderWooCommerce->LANGUAGE_T_EN = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_language_en'];
			$EgoiMailListBuilderWooCommerce->LANGUAGE_T_FR = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_language_fr'];
			$EgoiMailListBuilderWooCommerce->LANGUAGE_T_DE = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_language_de'];
			$EgoiMailListBuilderWooCommerce->LANGUAGE_T_PT_PT = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_language_pt_pt'];
			$EgoiMailListBuilderWooCommerce->LANGUAGE_T_PT_BR = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_language_pt_br'];
			$EgoiMailListBuilderWooCommerce->LANGUAGE_T_ES = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_language_es'];
			$EgoiMailListBuilderWooCommerce->BIRTH_DATE = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_bdate'];
			$EgoiMailListBuilderWooCommerce->SUBSCRIBE = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_subscribe'];

			$EgoiMailListBuilderWooCommerce->FIRST_NAME_F = (isset($_POST['egoi_mail_list_builder_woocommerce_widget_settings_fname_f'])) ? true : false;
			$EgoiMailListBuilderWooCommerce->LAST_NAME_F = (isset($_POST['egoi_mail_list_builder_woocommerce_widget_settings_lname_f'])) ? true : false;
			$EgoiMailListBuilderWooCommerce->EMAIL_F = (isset($_POST['egoi_mail_list_builder_woocommerce_widget_settings_email_f'])) ? true : false;
			$EgoiMailListBuilderWooCommerce->MOBILE_F = (isset($_POST['egoi_mail_list_builder_woocommerce_widget_settings_mobile_f'])) ? true : false;
			$EgoiMailListBuilderWooCommerce->LANGUAGE_F = (isset($_POST['egoi_mail_list_builder_woocommerce_widget_settings_language_f'])) ? true : false;
			$EgoiMailListBuilderWooCommerce->BIRTH_DATE_F = (isset($_POST['egoi_mail_list_builder_woocommerce_widget_settings_bdate_f'])) ? true : false;

			$EgoiMailListBuilderWooCommerce->FIRST_NAME_E = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_fname_e'];;
			$EgoiMailListBuilderWooCommerce->LAST_NAME_E = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_lname_e'];;
			$EgoiMailListBuilderWooCommerce->EMAIL_E = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_email_e'];;
			$EgoiMailListBuilderWooCommerce->MOBILE_E = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_mobile_e'];;
			$EgoiMailListBuilderWooCommerce->LANGUAGE_E = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_language_e'];;
			$EgoiMailListBuilderWooCommerce->BIRTH_DATE_E = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_bdate_e'];;
			$EgoiMailListBuilderWooCommerce->LIST_E = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_list_e'];;
			$EgoiMailListBuilderWooCommerce->SUCCESS_E = $_POST['egoi_mail_list_builder_woocommerce_widget_settings_success_e'];;

			update_option('EgoiMailListBuilderWooCommerceObject',$EgoiMailListBuilderWooCommerce);
		}
		egoi_mail_list_builder_woocommerce_admin_notices();
	?>
	<h3>Subscription form texts</h3>
	<form name='egoi_mail_list_builder_woocommerce_widget_settings_form' method='post' action='<?php echo $_SERVER['REQUEST_URI']; ?>'>
		<table class="form-table">
		<tr>
			<th>
				<label for="egoi_mail_list_builder_woocommerce_widget_settings_fname">First Name</label>
			</th>
			<td>
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_fname' value='<?php echo $EgoiMailListBuilderWooCommerce->FIRST_NAME; ?>'/>
				<input type='checkbox' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_fname_f' <?php if($EgoiMailListBuilderWooCommerce->FIRST_NAME_F) echo "checked";?>/>*
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_fname_e' value='<?php echo $EgoiMailListBuilderWooCommerce->FIRST_NAME_E; ?>'/>
			</td>
		</tr>
		<tr>
			<th>
				<label for="egoi_mail_list_builder_woocommerce_widget_settings_lname">Last Name</label>
			</th>
			<td>
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_lname' value='<?php echo $EgoiMailListBuilderWooCommerce->LAST_NAME; ?>'/>
				<input type='checkbox' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_lname_f' <?php if($EgoiMailListBuilderWooCommerce->LAST_NAME_F) echo "checked";?>/>*
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_lname_e' value='<?php echo $EgoiMailListBuilderWooCommerce->LAST_NAME_E; ?>'/>
			</td>
		</tr>
		<tr>
			<th>
				<label for="egoi_mail_list_builder_woocommerce_widget_settings_email">Email</label>
			</th>
			<td>
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_email' value='<?php echo $EgoiMailListBuilderWooCommerce->EMAIL; ?>'/>
				<input type='checkbox' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_email_f' checked disabled/>*
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_email_e' value='<?php echo $EgoiMailListBuilderWooCommerce->EMAIL_E; ?>'/>
			</td>
		</tr>
		<tr>
			<th>
				<label for="egoi_mail_list_builder_woocommerce_widget_settings_mobile">Mobile</label>
			</th>
			<td>
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_mobile' value='<?php echo $EgoiMailListBuilderWooCommerce->MOBILE; ?>'/>
				<input type='checkbox' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_mobile_f' <?php if($EgoiMailListBuilderWooCommerce->MOBILE_F) echo "checked";?>/>*
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_mobile_e' value='<?php echo $EgoiMailListBuilderWooCommerce->MOBILE_E; ?>'/>
			</td>
		</tr>
		<tr>
			<th>
				<label for="egoi_mail_list_builder_woocommerce_widget_settings_language">Language</label>
			</th>
			<td>
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_language' value='<?php echo $EgoiMailListBuilderWooCommerce->LANGUAGE; ?>'/>
				<input type='checkbox' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_language_f' <?php if($EgoiMailListBuilderWooCommerce->LANGUAGE_F) echo "checked";?>/>*
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_language_e' value='<?php echo $EgoiMailListBuilderWooCommerce->LANGUAGE_E; ?>'/>
			</td>
		</tr>
		<tr>
			<th>
				<label for="egoi_mail_list_builder_woocommerce_widget_settings_language_en">English Language</label>
			</th>
			<td>
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_language_en' value='<?php echo $EgoiMailListBuilderWooCommerce->LANGUAGE_T_EN; ?>'/>
			</td>
		</tr>
		<tr>
			<th>
				<label for="egoi_mail_list_builder_woocommerce_widget_settings_language_fr">French Language</label>
			</th>
			<td>
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_language_fr' value='<?php echo $EgoiMailListBuilderWooCommerce->LANGUAGE_T_FR; ?>'/>
			</td>
		</tr>
		<tr>
			<th>
				<label for="egoi_mail_list_builder_woocommerce_widget_settings_language_de">German Language</label>
			</th>
			<td>
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_language_de' value='<?php echo $EgoiMailListBuilderWooCommerce->LANGUAGE_T_DE; ?>'/>
			</td>
		</tr>
		<tr>
			<th>
				<label for="egoi_mail_list_builder_woocommerce_widget_settings_language_pt_pt">Portuguese Language</label>
			</th>
			<td>
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_language_pt_pt' value='<?php echo $EgoiMailListBuilderWooCommerce->LANGUAGE_T_PT_PT; ?>'/>
			</td>
		</tr>
		<tr>
			<th>
				<label for="egoi_mail_list_builder_woocommerce_widget_settings_language_pt_br">Portuguese (Brasil) Language</label>
			</th>
			<td>
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_language_pt_br' value='<?php echo $EgoiMailListBuilderWooCommerce->LANGUAGE_T_PT_BR; ?>'/>
			</td>
		</tr>
		<tr>
			<th>
				<label for="egoi_mail_list_builder_woocommerce_widget_settings_language_es">Spanish Language</label>
			</th>
			<td>
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_language_es' value='<?php echo $EgoiMailListBuilderWooCommerce->LANGUAGE_T_ES; ?>'/>
			</td>
		</tr>
		<tr>
			<th>
				<label for="egoi_mail_list_builder_woocommerce_widget_settings_bdate">Birth Date</label>
			</th>
			<td>
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_bdate' value='<?php echo $EgoiMailListBuilderWooCommerce->BIRTH_DATE; ?>'/>
				<input type='checkbox' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_bdate_f' <?php if($EgoiMailListBuilderWooCommerce->BIRTH_DATE_F) echo "checked";?>/>*
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_bdate_e' value='<?php echo $EgoiMailListBuilderWooCommerce->BIRTH_DATE_E; ?>'/>
			</td>
		</tr>
		<tr>
			<th>
				<label for="egoi_mail_list_builder_woocommerce_widget_settings_subscribe">Subscribe Button</label>
			</th>
			<td>
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_subscribe' value='<?php echo $EgoiMailListBuilderWooCommerce->SUBSCRIBE; ?>'/>
			</td>
		</tr>
		<tr>
			<th>
				<label for="egoi_mail_list_builder_woocommerce_widget_settings_list_e">Invalid List Message</label>
			</th>
			<td>
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_list_e' value='<?php echo $EgoiMailListBuilderWooCommerce->LIST_E; ?>'/>
			</td>
		</tr>
		<tr>
			<th>
				<label for="egoi_mail_list_builder_woocommerce_widget_settings_success_e">Success Message</label>
			</th>
			<td>
				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_widget_settings_success_e' value='<?php echo $EgoiMailListBuilderWooCommerce->SUCCESS_E; ?>'/>
			</td>
		</tr>
		<tr>
			<th>
				<em>*User Must Fill</em>
			</th>
		</tr>
		<tr>
			<th>
				<input type="submit" class='button-primary' name="egoi_mail_list_builder_woocommerce_widget_settings_save" id="egoi_mail_list_builder_woocommerce_widget_settings_save" value="Save" />	
			</th>
		</tr>
		</table>
	</form>
	<?php } ?>