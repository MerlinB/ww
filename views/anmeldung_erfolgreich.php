 <?php 

## this page only displays the extra information 
session_start();
if ($_SESSION['Mitgliedschaft'] < 1){
	include('../views/_header_not_in.php');
}
else {
	include('../views/_header_in.php');
}         
require_once('../config/config.php');
include('../views/_db.php');

?>

<div class="content">
	<div class="payment">
		<div class="payment_success">
			
<?php
		if($_GET['q'] == 'new') {
?>
			<p>Vielen Dank f&uuml;r Ihre Anmeldung zu unserem Offenen Salon!<br>
			   Sie sollten in K&uuml;rze eine E-Mail erhalten. Bitte klicken Sie auf den dortigen Link um die Anmeldung abzuschlie&szlig;en.
			</p>
			<p>Die Zahlung erfolgt in bar am Abend des Salons.</p>
<?php			
		}
		else {
?>
			<p>Vielen Dank f&uuml;r Ihre Anmeldung zu unserem Offenen Salon!<br>
				Sie sollten in K&uuml;rze eine Best&auml;tigungsemail erhalten.
			</p>
			<p>Die Zahlung erfolgt in bar am Abend des Salons.</p>
			<p><a href="index.php">Zur&uuml;ck zu den Salons</a></p>
<?php
		}
?>
		</div>
	</div>
</div>
 

<?
include('_footer.php');
?>

