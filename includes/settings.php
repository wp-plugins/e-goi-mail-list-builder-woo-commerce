	<?php $EgoiMailListBuilderWooCommerce = get_option('EgoiMailListBuilderWooCommerceObject'); ?>

	<div class='wrap'>

	<div id="icon-egoi-mail-list-builder-woocommerce-settings" class="icon32"></div>

	<h2>Settings</h2>

	<?php require('donate.php'); ?>

	<?php if($EgoiMailListBuilderWooCommerce->isAuthed() && in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ))	{

		if(isset($_POST['egoi_mail_list_builder_woocommerce_settings_save'])) {

			$EgoiMailListBuilderWooCommerce->hide_subscribe = (isset($_POST['egoi_mail_list_builder_woocommerce_settings_hide_subscribe'])) ? true : false;

			$EgoiMailListBuilderWooCommerce->subscribe_enable = (isset($_POST['egoi_mail_list_builder_woocommerce_settings_comments'])) ? true : false;

			$EgoiMailListBuilderWooCommerce->subscribe_enable_checkout = (isset($_POST['egoi_mail_list_builder_woocommerce_settings_checkout'])) ? true : false;

			$EgoiMailListBuilderWooCommerce->subscribe_enable_myaccount = (isset($_POST['egoi_mail_list_builder_woocommerce_settings_myaccount'])) ? true : false;

			$EgoiMailListBuilderWooCommerce->subscribe_text = $_POST['egoi_mail_list_builder_woocommerce_settings_text'];

			$EgoiMailListBuilderWooCommerce->subscribe_list = $_POST['egoi_mail_list_builder_woocommerce_settings_list'];



			$EgoiMailListBuilderWooCommerce->double_opt_in = (isset($_POST['egoi_mail_list_builder_woocommerce_settings_double_opt_in'])) ? 1 : 0;

			update_option('EgoiMailListBuilderWooCommerceObject',$EgoiMailListBuilderWooCommerce);

		}

		$result = $EgoiMailListBuilderWooCommerce->getLists();

		update_option('EgoiMailListBuilderWooCommerceObject',$EgoiMailListBuilderWooCommerce);

		egoi_mail_list_builder_woocommerce_admin_notices();

	?>

	<form name='egoi_mail_list_builder_woocommerce_settings_form' method='post' action='<?php echo $_SERVER['REQUEST_URI']; ?>'>

	<table class="form-table">

		<tr>

			<td>

				<h3>"Post comment" section</h3>

			</td>

		</tr>

		<tr>

			<td>

				<label for="egoi_mail_list_builder_woocommerce_settings_comments">Add a "Subscribe" checkbox</label>

			</td>

			<td>

				<input type='checkbox' size='60' name='egoi_mail_list_builder_woocommerce_settings_comments' <?php if($EgoiMailListBuilderWooCommerce->subscribe_enable) echo "checked";?>/>

			</td>

		</tr>

		<tr>

			<td>

				<h3>Woo Commerce Checkout Section</h3>

			</td>

		</tr>

		<tr>

			<td>

				<label for="egoi_mail_list_builder_woocommerce_settings_checkout">Add a "Subscribe" checkbox</label>

			</td>

			<td>

				<input type='checkbox' size='60' name='egoi_mail_list_builder_woocommerce_settings_checkout' <?php if($EgoiMailListBuilderWooCommerce->subscribe_enable_checkout) echo "checked";?>/>

			</td>

		</tr>

		<tr>

			<td>

				<h3>My Accounts Section</h3>

			</td>

		</tr>

		<tr>

			<td>

				<label for="egoi_mail_list_builder_woocommerce_settings_myaccount">Add a "Subscribe" button</label>

			</td>

			<td>

				<input type='checkbox' size='60' name='egoi_mail_list_builder_woocommerce_settings_myaccount' <?php if($EgoiMailListBuilderWooCommerce->subscribe_enable_myaccount) echo "checked";?>/>

			</td>

		</tr>

		<tr>

			<td>

				<h3>General Settings</h3>

			</td>

		</tr>

		<tr>

			<td>

				<label for="egoi_mail_list_builder_woocommerce_settings_text">Subscribe Text</label>

			</td>

			<td>

				<input type='text' size='60' name='egoi_mail_list_builder_woocommerce_settings_text'  value='<?php echo $EgoiMailListBuilderWooCommerce->subscribe_text; ?>'/>

			</td>

		</tr>

		<tr>

			<td>

				<label for="egoi_mail_list_builder_woocommerce_settings_list">Mailing list</label>

			</td>

			<td>

				<select name='egoi_mail_list_builder_woocommerce_settings_list'>

					<option value="-1" selected>Select a List</option>

					<?php

					for($x = 0;$x < count($result); $x++) {	?>

						<option value='<?php echo $result[$x]['listnum']; ?>' <?php if($result[$x]['listnum'] == $EgoiMailListBuilderWooCommerce->subscribe_list){ echo "selected"; } ?>><?php echo $result[$x]['title']; ?></option>

					<?php }	?>

				</select>

			</td>

		</tr>

		<tr>

			<td>

				<label for="egoi_mail_list_builder_woocommerce_settings_double_opt_in">Single Opt-In</label>

			</td>

			<td>

				<input type='checkbox' size='60' name='egoi_mail_list_builder_woocommerce_settings_double_opt_in' <?php if($EgoiMailListBuilderWooCommerce->double_opt_in == 1) echo "checked";?>/>

			</td>

		</tr>

		<tr>

			<td>

				<label for="egoi_mail_list_builder_woocommerce_settings_hide_subscribe">Hide Subscribe Check Box</label>

			</td>

			<td>

				<input type='checkbox' size='60' name='egoi_mail_list_builder_woocommerce_settings_hide_subscribe' <?php if($EgoiMailListBuilderWooCommerce->hide_subscribe == 1) echo "checked";?>/>

			</td>

		</tr>

		<tr>

			<td>

				<input type="submit" class='button-primary' name="egoi_mail_list_builder_woocommerce_settings_save" id="egoi_mail_list_builder_woocommerce_settings_save" value="Save" />	

			</td>

		</tr>

	</table>

	</form>

	<?php }	?>