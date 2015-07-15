<?php
/*
# ------------------------------------------------------------------------
# Templates for Joomla 2.5 - Joomla 3.5
# ------------------------------------------------------------------------
# Copyright (C) 2011-2013 Jtemplate.ru. All Rights Reserved.
# @license - PHP files are GNU/GPL V2.
# Author: Makeev Vladimir
# Websites:  http://www.jtemplate.ru 
# ---------  http://code.google.com/p/jtemplate/   
# ------------------------------------------------------------------------
*/
// no direct access
defined('_JEXEC') or die;
if ($jt_load_scripts == 2) { 
	if ($jt_load_jquery > 0) { 
		echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/'.$jt_jquery_ver.'/jquery.min.js" type="text/javascript"></script>';
		} 
	if ($jt_load_easing > 0) {
		echo '<script type = "text/javascript" src = "'.JURI::root().'/modules/mod_jt_contact_form/js/jquery.validate.min.js"></script>';
		}

	echo '<script type = "text/javascript">if (jQuery) jQuery.noConflict();</script>';
}

if ($jt_script_required == '' OR $jt_script_required == ' ') { $jt_script_required = JText::_(SCRIPT_REQUIRED); }
if ($jt_script_email == '' OR $jt_script_email == ' ') { $jt_script_email = JText::_(SCRIPT_EMAIL); }
if ($jt_script_minlength == '' OR $jt_script_minlength == ' ') { $jt_script_minlength = JText::_(SCRIPT_MINLENGTH); }
?>

<script type="text/javascript">
jQuery(function(){
	
	jQuery("#jt_form_<?php echo $jt_id; ?>").validate({
		rules: {
			name: {
				required: true,
				minlength: 3
			},
			email: {
				required: true,
				email: true
			},
			subject: {
				required: true,
				minlength: 3
			},
			message: {
				required: true
			}
		},
		messages: {
			name: {
				required: '<?php echo $jt_script_required; ?>',
				minlength: '<?php echo $jt_script_minlength; ?> 3'
			},
			email: '<?php echo $jt_script_email; ?>',
			subject: {
				required: '<?php echo $jt_script_required; ?>',
				minlength: '<?php echo $jt_script_minlength; ?> 3'
			},
			message: {
				required: '<?php echo $jt_script_required; ?>'
			}
		},
		success: function(label) {
			label.html('OK').removeClass('error').addClass('ok');
			setTimeout(function(){
				label.fadeOut(500);
			}, 2000)
		}
	});
	
});
</script>

<div class="mod_jt_contact_form <?php echo $moduleclass_sfx ?>">

<?php
// check
if(isset($_POST['jtsend'])) {	
	$name 		= clearData($_POST["name"]);
	$email 		= clearData($_POST["email"]);
	$subject  	= clearData($_POST["subject"]);
	$message 	= clearData($_POST["message"], "string_msg");

	if (!isEmail($email)) {
		if ($jt_error_email == '' OR $jt_error_email == ' ') {
			$errMsg= JText::_(ERROREMAIL);
		} else {
			$errMsg = $jt_error_email;
			}

	}
	
	if ( $name=="" OR  $email=="" OR $subject=="" OR $message=="") {
		if($jt_error_field == '' OR $jt_error_field == ' ') {
			$errMsg = JText::_(ERRORFIELD);
		} else {
			$errMsg = $jt_error_field;
			}
	}


	if($errMsg == '') {
		if(get_magic_quotes_gpc()) {
			$message = stripslashes($message);
		}
		$msg     = "$jt_name_label  $name \r\n $jt_email_label  $email \r\n $jt_subject_label $subject \r\n\n" . "$jt_message_label \r\n$message";
		$headers= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		$headers .= "From: $email\r\n";
		$headers .= "Reply-To: $email\r\n";
		//$headers .= "Return-Path: $email\r\n";

		mail($jt_my_email, $subject, $msg, $headers);
	

?>
		<div style="text-align:center;">
			<p>
			<?php 
			echo $jt_send_message=='' ? JText::_(SENDMESSAGE) : $jt_send_message;
			?>
			</p>
		<div style="clear:both;"></div>
		</div>
<?php
	}
}

if(!isset($_POST['jtsend']) || $errMsg != '') {
?>	
	<div class="jt_quick_contact_form">
		<?php 
		if ($errMsg != ''){ 
			echo '<p>'.$errMsg.'</p>';
		}
		?>
		<form id="jt_form_<?php echo $jt_id;?>" class="blocks" action="" method="post">
			<p>
				<label><?php echo $jt_name_label;?></label>
				<input type="text" class="text" name="name" />
			</p>
			<p>
				<label><?php echo $jt_email_label;?></label>
				<input type="text" class="text" name="email" />
			</p>
			<p>
				<label><?php echo $jt_subject_label;?></label>
				<input type="text" class="text" name="subject" />
			</p>
			<p class="area">
				<label><?php echo $jt_message_label;?></label>
				<textarea class="textarea" name="message"></textarea>
			</p>
			<p>
				<label>&nbsp;</label>
				<input type="submit" class="btn" value="<?php echo $jt_send_label;?>"  name="jtsend" />
			</p>
		</form>	
	</div>

<?php
}
?>

<div style="clear:both;"></div>
</div>