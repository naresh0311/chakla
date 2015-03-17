<?php echo $this->Javascript->link('/js/jquery.datepick.js'); ?>
<?php echo $this->Html->css('jquery.datepick'); ?>
<script type="text/javascript">
function submitForm(jab)
{
	jab2=eval("document."+jab);
	jab2.submit();
}
$(function() {
	$('#popupDatepicker').datepick();
	$('#inlineDatepicker').datepick({onSelect: showDate});
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>

<h2>Contact Us</h2>
<p>We welcome questions about our website and we are always looking for new partners and advertisers!</p>
<?php
if(isset($_POST['submit']) && isset($_POST['disclaimer']))
{
	?><div class="clear" style="color:white;font-size:16px;padding: 0 0 10px 140px;"><b><?php echo "Thank you for contacting us, we will reply soon.";?></b></div><?php
}
?>
<div class="clear"></div>

<div class="contactus-container">

<div class="contactus-form">
<h3>&nbsp;</h3>
<p>&nbsp;</p>

<form name="contactus" method="post" action="">
<p><input type="text" name="First_Name" id="First_Name" class="textInput cleardefault" value="First Name" onfocus="check_defaults(this, this.value, 'First Name');" onblur="check_defaults2(this, this.value, 'First Name');" /></p>
<p><input type="text" name="Last_Name" id="Last_Name" class="textInput cleardefault" value="Last Name" onfocus="check_defaults(this, this.value, 'Last Name');" onblur="check_defaults2(this, this.value, 'Last Name');" /></p>
<p><input type="text" name="Phone" id="Phone" class="textInput cleardefault" value="Phone" onfocus="check_defaults(this, this.value, 'Phone');" onblur="check_defaults2(this, this.value, 'Phone');" /></p>
<p><input type="text" name="Email" id="Email" class="textInput cleardefault" value="Email" onfocus="check_defaults(this, this.value, 'Email');" onblur="check_defaults2(this, this.value, 'Email');" /></p>
<p><input type="text" name="Zip_Code" id="Zip_Code" class="textInput cleardefault" value="Zip Code" onfocus="check_defaults(this, this.value, 'Zip Code');" onblur="check_defaults2(this, this.value, 'Zip Code');" /></p>
<p><textarea name="Case" id="textarea" cols="45" rows="5" class="textareaInput cleardefault" onFocus="check_defaults(this, this.value, 'Describe Your Case');" onBlur="check_defaults2(this, this.value, 'Describe Your Case');">Describe Your Case</textarea></p>
<p><input type="text" name="Date_Incident_Occured"  id="Date_Incident_Occured" class="textInput cleardefault" value="Date Incident Occured" onfocus="check_defaults(this, this.value, 'Date Incident Occured');" onblur="check_defaults2(this, this.value, 'Date Incident Occured');" /></p>

<!--<p><a class="various fancybox.iframe" data-fancybox-type="iframe" href="<?php echo HOST_ADDRESS; ?>articles/disclaimer"><img src="images/disclaimer.jpg" width="111" height="27" alt="Disclaimer" /></a></p>-->


<!--<p><label><input type="checkbox" name="disclaimer" id="disclaimer" /> I have read the disclaimer</label></p>-->
<p><input type="image" src="images/submit-button.jpg" name="submit" id="button" value="Submit" class="button" onclick="return checkForm();" /></p>
</form>
</div>
<div class="clear"></div>
</div>
<script type="text/javascript" src="<?php echo HOST_ADDRESS; ?>js/check_defaults.js"></script>
<div class="clear"></div>

