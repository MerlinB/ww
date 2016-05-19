<? 
	include "../config/header1.inc.php";
	
	$title="Orte";

	include "../page/header2.inc.php";
	
if(isset($_GET['q']))
{
	$id = $_GET['q'];

  	$orte_info = $general->getOrteInfo($id);

  	$name = $orte_info->name;
  	$text = $orte_info->text;
  	$img = $orte_info->img;
  	$denker = $orte_info->denker;
		
	$denker_links = "";
	$denker_list = explode(", ", $denker);

	foreach ($denker_list as $key => $denker_id) {
		$denker_info = $general->getDenkerInfo($denker_id);
		if (count($denker_list) > 1 && count($denker_list) != $key+1) {
			$denker_links = $denker_links.'<a href="../denker/index.php?q='.$denker_info->id.'">'.$denker_info->name.'</a>, ';
		}
		else {
			$denker_links = $denker_links.'<a href="../denker/index.php?q='.$denker_info->id.'">'.$denker_info->name.'</a>';
		}   
	}   
?>
<!--Orte-->
<!--Content-->

    <div id="content">
      	<div class="container index-link"><p><a href="../index.php">Wiener Schule</a> / <a href="index.php">Orte</a> / <?=$name?></p></div>
      	<div class="container">
      		<div class="row">
      			<div class="two-thirds column">
      				<h1><?=$name?></h1>
      			</div>
      			<div class="one-third column h-white">
      				<?php
      				if ($img !== "" OR $img !== 0) { 
      				echo '<img src="'.$img.'" class="img--coat" alt=".">&nbsp;';
					}
      				?>
      			</div>
      		</div>
      	</div>
      	
      	<div class="container text">
      			<h2>Beschreibung</h2>
      			<p><?=$text?></p>
      	</div>
      	<div class="container text">
      			<h5>Denker die in <?=$name?> gelebt oder gewirkt haben</h5>
				<p><?=$denker_links?></p>   	
       </div>
    </div>
<?php
}
else {
			
    $sql = $general->db_connection->prepare("SELECT * FROM orte ORDER by id asc");
	$sql->execute();
    $result = $sql->fetchAll();
   
?>
<!--Ortsliste-->	
	<div id="content">
  	
		<div class="container index-link"><p><a href="../index.php">Wiener Schule</a> / Orte</p></div>
      	<div class="container">
      		<h1>Orts&uuml;bersicht</h2>
      
    		<noscript><b>Um unsere Kartenanwendung zu nutzen ben&ouml;tigen Sie JavaScript.</b> 
     		JavaScript scheint in Ihrem Browser deaktiviert zu sein oder wird von diesem nicht unterst&uuml;tzt. 
     	 	Um unsere Kartenansischt sehen k&oouml;nnen, aktivieren Sie bitte JavaScript.
    		</noscript>   		
    	</div>
    	<div class="map">
			<div id="map" class="map__map"></div>
		</div>
	<script type="text/javascript">

    function initMap() {

	var MisesAustriaMapStyle = new google.maps.StyledMapType([
      {
      	      }
    ], {name: 'Wohnorte und Wirkstaetten Wiener Oekonomen'});
    
     var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 48.0596696, lng: 14.4656239},
            zoom: 5,
            mapTypeControlOptions: {
                mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'misesat_map']
            }
        });
        
        map.mapTypes.set('misesat_map', MisesAustriaMapStyle);
        map.setMapTypeId('misesat_map');

<?php
	for ($i = 0; $i < count($result); $i++)
	{
		$id = $result[$i]['id'];
		$n = $result[$i]['n'];
        $name = $result[$i]['name'];
  		$text = $result[$i]['text'];
  		$img = $result[$i]['img'];
		$lat = $result[$i]['lat'];
		$lng = $result[$i]['lng'];
		$denker = $result[$i]['denker'];
		
		$denker_links = "";
		$denker_list = explode(", ", $denker);

		foreach ($denker_list as $key => $denker_id) {
			$denker_info = $general->getDenkerInfo($denker_id);
			if (count($denker_list) > 1 && count($denker_list) != $key+1) {
				$denker_links = $denker_links.'<a href="../denker/index.php?q='.$denker_info->id.'">'.$denker_info->name.'</a>, ';
			}
			else {
				$denker_links = $denker_links.'<a href="../denker/index.php?q='.$denker_info->id.'">'.$denker_info->name.'</a>';
			}
		}
     ?> 
        		 			
		var info = '<div class="map-info"><a href="index.php?q=<?=$id?>"><h2><?=$name?></h2></a><img src="<?=$img?>" alt="."><p><?=substr($text, 0, 180)?> ... <a href="index.php?q=<?=$id?>">Mehr</a></p><h6>Denker die hier gelebt und gewirkt haben</h6><p><?=$denker_links?></p></div>';
			
        var marker = new google.maps.Marker({
         	position: {lat: <?=$lat?>, lng: <?=$lng?>},
         	map: map,
         	title: '<?=$name?>'
        });
        attachInfoWindow(marker, info);
<?php       
	}
?>
    	function attachInfoWindow(marker, info) {
        	var infowindow = new google.maps.InfoWindow({
        	content: info
       		 });
        
       		marker.addListener('click', function() {
        	infowindow.open(map, marker);
        	});
        
    	}
	}
	</script>

		<!--echo"var info = '<div><h1>".$name."</h1><p>".substr($text, 0, 200)."</p></div>';";-->
		</div>
	</div>

    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChP6VPcxuqcO5r8q7733mF7hzjNg4r9EY&callback=initMap">
    </script>

<?	
	//}
}
	include "../page/footer.inc.php";
?>