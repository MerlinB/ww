<?php 
include_once("../down_secure/functions.php");
dbconnect();
// require_once('../classes/Login.php');
$title="Ihre K&auml;ufe";
include('_header_in.php');

$user_id = $_SESSION['user_id'];

$user_items_query_a = "SELECT * from registration WHERE `user_id`=$user_id";
$user_items_result_a = mysql_query($user_items_query_a) or die("Failed Query of " . $user_items_query_a. mysql_error());

$user_items_query_b = "SELECT * from registration WHERE `user_id`=$user_id";
$user_items_result_b = mysql_query($user_items_query_b) or die("Failed Query of " . $user_items_query_b. mysql_error());

$user_items_query_c = "SELECT * from registration WHERE `user_id`=$user_id";
$user_items_result_c = mysql_query($user_items_query_c) or die("Failed Query of " . $user_items_query_c. mysql_error());

$user_items_query_d = "SELECT * from registration WHERE `user_id`=$user_id";
$user_items_result_d = mysql_query($user_items_query_d) or die("Failed Query of " . $user_items_query_d. mysql_error());

?> 
	<div class="content">
		<div class="history">
			<h1>&Uuml;bersicht Ihrer K&auml;ufe</h1>
		</div>
		<div class="medien_seperator">
			<h1>Ihre Veranstaltungen</h1>
		</div>
		<div class="history">
			<div class="basket_head">
				<div class="basket_head_col_a"></div>
				<div class="basket_head_col_b">Status</div>
				<div class="basket_head_col_c">Pl&auml;tze</div>
			</div>
			<?php
			while($userItemsArray_a = mysql_fetch_array($user_items_result_a)){
			
			$n = $userItemsArray_a[event_id];
			$quantity = $userItemsArray_a[quantity];
			
			$user_events_query = "SELECT * from produkte WHERE `n` LIKE '$n' ORDER BY start DESC";
        	$user_events_result = mysql_query($user_events_query) or die("Failed Query of " . $user_events_query. mysql_error());
        	$userEventsArray = mysql_fetch_array($user_events_result);
			
			$title = $userEventsArray[title];
			$type = $userEventsArray[type];
			$id = $userEventsArray[id];			 
			
				if ($type == 'seminar' || $type == 'kurs' || $type == 'salon'){
			
					if ($type == 'seminar' || $type == 'kurs') {
					$url = 'http://scholarium.at/seminare/'.$id.'.jpg';
            		$url2 = 'seminare';
					}
					elseif ($type == 'salon') {
					$url = 'http://scholarium.at/salon/'.$id.'.jpg';
            		$url2 = 'salon';
					}			
			?>

			<div class="basket_body">
				<div class="basket_body_col_a">
					<div class="basket_body_col_a_1">
						<img src="<?=$url?>" style="max-width:75px;max-height:75px;" alt="">
					</div>		
					<div class="basket_body_col_a_2">
						<span class="history_body_type"><?=ucfirst($type)?></span>
						<span class="history_body_title"><a href="../<?=$url2?>/index.php?q=<?=$id?>"><?=$title?></a></span>
					</div>
        		</div>	
				<div class="basket_body_col_b">
					<p>
						<?
						if ($quantity == 1) echo "1 Platz";
						if ($quantity > 1) echo $quantity." Pl&auml;tze";
						?>
					</p>
				</div>
				<div class="basket_body_col_c">
					<span class="history_reservation">Reserviert</span>
					<p><a href="../tickets/ticket_<?=$user_id?>_<?=ucfirst($type)?>_<?=$n?>.pdf">Ihr Ticket</a></p>							
				</div>
			</div>
		<?
			}
		}
		?>
		</div>
		<div class="medien_seperator">
			<h1>Ihre Schriften und Medien</h1>
		</div>
		<div class="history">
			<div class="basket_head">
				<div class="basket_head_col_a"></div>
				<div class="basket_head_col_b"></div>
				<div class="basket_head_col_c">Download</div>
			</div>
			<?php
			while($userItemsArray_b = mysql_fetch_array($user_items_result_b)){
			
			$n = $userItemsArray_b[event_id];
			
			$user_products_query = "SELECT * from produkte WHERE `n` LIKE '$n' ORDER BY start DESC";
        	$user_products_result = mysql_query($user_products_query) or die("Failed Query of " . $user_products_query. mysql_error());
        	$userProductsArray = mysql_fetch_array($user_products_result);
			
			$title = $userProductsArray[title];
			$type = $userProductsArray[type];
			$id = $userProductsArray[id];
			
				if ($type == 'scholie' || $type == 'analyse' || $type == 'buch' || substr($type,0,5) == 'media'){
			
					if ($type == 'scholie' || $type == 'analyse' || $type == 'buch') {
					$url = 'http://scholarium.at/schriften/'.$id.'.jpg';
            		$url2 = 'schriften';
					if ($userItemsArray_b[format] == 'PDF') $extension = '.pdf';
					if ($userItemsArray_b[format] == 'MOBI') $extension = '.mobi';
					if ($userItemsArray_b[format] == 'EPUB') $extension = '.epub';
					}
					elseif (substr($type,0,5) == 'media') {
					$url = 'http://scholarium.at/medien/'.$id.'.jpg';
            		$url2 = 'medien';
					if ($type == 'media-salon' || $type == 'media-vortrag') $extension = '.mp3';							
                    if ($type == 'media-vorlesung') $extension = '.zip';
                    $type = ucfirst(substr($type,6));
					}			
						
					$file_path = 'http://www.scholarium.at/down_secure/content_secure/'.$id.$extension;
			?>
			<div class="basket_body">
				<div class="basket_body_col_a">
					<div class="basket_body_col_a_1">
						<img src="<?=$url?>" style="max-width:75px;max-height:75px;" alt="">
					</div>		
					<div class="basket_body_col_a_2">
						<span class="history_body_type"><?=ucfirst($type)?></span>
						<span class="history_body_title"><a href="../<?=$url2?>/index.php?q=<?=$id?>"><?=$title?></a></span>
					</div>
        		</div>	
				<div class="basket_body_col_b">
					&nbsp;
				</div>
				<div class="basket_body_col_c">
					<p><a href="<?php downloadurl($file_path,$id);?>" onclick="updateReferer(this.href)";>Herunterladen</a></p>
				</div>
			</div>
		<?
			}
		}
		?>
		</div>
		<div class="medien_seperator">
			<h1>Ihre Spenden und Programme</h1>
		</div>	
		<div class="history">
			<h2>Spenden</h2>			
			<div class="basket_head">
				<div class="basket_head_col_a"></div>
				<div class="basket_head_col_b">Status</div>
				<div class="basket_head_col_c">Ihre Spende</div>
			</div>
			<?php
			while($userItemsArray_c = mysql_fetch_array($user_items_result_c)){
			
			$n = $userItemsArray_c[event_id];
			
			$user_donations_query = "SELECT * from produkte WHERE `n` LIKE '$n' ORDER BY start DESC";
        	$user_donations_result = mysql_query($user_donations_query) or die("Failed Query of " . $user_donations_query. mysql_error());
        	$userDonationsArray = mysql_fetch_array($user_donations_result);
			
			$title = $userDonationsArray[title];
			$type = $userDonationsArray[type];
			$id = $userProductsArray[id];
			$donation = $userItemsArray_c[quantity];
			$donated = $userDonationsArray[spots_sold];
			$needed = $userDonationsArray[spots];
			
				if ($type == 'projekt') {
					$url2 = 'projekte';
			?>
			<div class="basket_body">
				<div class="basket_body_col_a">
					<div class="basket_body_col_a_1">
					</div>		
					<div class="basket_body_col_a_2">
						<span class="history_body_title"><a href="../<?=$url2?>/index.php?q=<?=$id?>"><?=$title?></a></span>
					</div>
        		</div>	
				<div class="basket_body_col_b">
					<?=$donation?>					
				</div>
				<div class="basket_body_col_c">
					<? 
					if ($donated == $needed) {
						echo $donated." / ".$needed."<br>Projekt in Umsetzung";
					}
					else {
						echo $donated." / ".$needed;
					}
					?>					
				</div>
			</div>
		<?
			}
		}
		?>
			<h2>Programme</h2>
			<div class="basket_head">
				<div class="basket_head_col_a"></div>
				<div class="basket_head_col_b">Status</div>
				<div class="basket_head_col_c">Pl$auml;tze</div>
			</div>
			<?php
			while($userItemsArray_d = mysql_fetch_array($user_items_result_d)){
			
			$n = $userItemsArray_d[event_id];
			$quantity = $userItemsArray_d[quantity]/100;
			
			$user_programs_query = "SELECT * from produkte WHERE `n` LIKE '$n' ORDER BY start DESC";
        	$user_programs_result = mysql_query($user_programs_query) or die("Failed Query of " . $user_programs_query. mysql_error());
        	$userProgramsArray = mysql_fetch_array($user_programs_result);
			
			$title = $userProgramsArray[title];
			$type = $userProgramsArray[type];
			$id = $userProgramsArray[id];
			
				if ($type == 'programm') {
					$url2 = 'programme';
			?>
			<div class="basket_body">
				<div class="basket_body_col_a">
					<div class="basket_body_col_a_1">
					</div>		
					<div class="basket_body_col_a_2">
						<span class="history_body_title"><a href="../<?=$url2?>/index.php?q=<?=$id?>"><?=$title?></a></span>
					</div>
        		</div>	
				<div class="basket_body_col_b">
					<p>
						<?
						if ($quantity == 1) echo "1 Platz";
						if ($quantity > 1) echo $quantity." Pl&auml;tze";
						?>
					</p>					
				</div>
				<div class="basket_body_col_c">
					Gebucht			
				</div>
			</div>
		<?
			}
		}
		?>
		</div>
	</div>
<?php include('_footer.php'); ?>