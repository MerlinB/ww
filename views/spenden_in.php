
<script type="text/javascript">

var checkoutSum = 0;

function setCredits(creditsLeft)
{
  checkoutSum = creditsLeft; 
}

function toggleMe(id)
{
    if(document.getElementById(id).style.display == 'none')
    {
        document.getElementById(id).style.display = '';
    }
    else
    {
        document.getElementById(id).style.display = 'none';
    }
}

function PriceSum (checkbox, price) 
{
  if (checkbox.checked) 
  {
      // alert ("The check box is checked.");
      checkoutSum -= price;
      document.getElementById("demo").innerHTML = checkoutSum;
  }
  else 
  {
      checkoutSum += price;
      document.getElementById("demo").innerHTML = checkoutSum;
  }
}

function displayCredits()
{
  document.getElementById("demo").innerHTML = checkoutSum;
}

// window.onload = displayZero;

</script>


<?php 
require_once('../classes/Login.php');
  $user_id = $_SESSION['user_id'];
  $credits_sql="SELECT * from mitgliederExt WHERE user_id='$user_id'";
  $credits_result = mysql_query($credits_sql) or die("Failed Query of " . $credits_sql. " - ". mysql_error());
  $credits_entry = mysql_fetch_array($credits_result);
  $_SESSION['credits_left'] = $credits_entry[credits_left];

?>

<?php

include ("_header.php"); 
$title="Spenden";

if ($id = $_GET["id"])
{
  $sql="SELECT * from termine WHERE id='$id'";
  $result = mysql_query($sql) or die("Failed Query of " . $sql. " - ". mysql_error());
  $entry3 = mysql_fetch_array($result);
  $title=$entry3[title];
  $avail=$entry3[spots]-$entry3[spots_sold];
  $gold=$entry3[gold];
  $gold2=$entry3[gold2];
  $adresse=$entry3[adresse];
  $date=strftime("%d.%m.%Y", strtotime($entry3[start]));
  $date2= substr($entry3[start],0,10);
}

?>

<!--Content-->
<div id="center">
<div id="content">
<a class="content" href="../index.php">Index &raquo;</a> <a class="content" href="index.php">Spenden</a>
<div id="tabs-wrapper-lower"></div>

<h2>Spenden</h2>  

<?php 

// PHP FUNCTIONS:

    function ifChecked($event_id, $user_id)
    {

        $check_query = "SELECT * from registration WHERE `event_id` LIKE '%$event_id%' AND `user_id` LIKE '%$user_id%' ";

        $check_result = mysql_query($check_query) or die("Failed Query of " . $check_query. mysql_error());

        if(mysql_num_rows($check_result) == 0) 
        {
         return false;
        } 
        else 
        {
          return true;
        }
    }


$sql = "SELECT * from termine WHERE `type` LIKE '%project%'";
$result = mysql_query($sql) or die("Failed Query of " . $sql. " - ". mysql_error());

?>

<!-- HTML -->
<!-- Optional: There are currently no events, please register to be informed about it... -->

<br>
<form action="/spenden_in.php" method="post">

<table style="width:100%;border-collapse: collapse">

<tr>
      <td style="width:5%"> </td>
      <!-- <td style="width:15%"><i>Datum</i></td> -->
      <td style="width:60%"><i>Titel</i></td>
      <!-- <td style="width:7%"><i>Ref</i></td> -->
      <!-- <td style="width:13%"><i>Places left</i></td> -->
</tr>


<!-- END HTML -->
<!--  -->


<?php


  while($entry = mysql_fetch_array($result))
  {

    $event_id = $entry[id];
    $checked = ifChecked($event_id, $user_id);
    // $disabled = ifDisabled($event_id, $checked);
   
    $projectStatus = "";
    // $disabledStatus = "";

    if ($checked) $projectStatus = 'checked disabled="disabled"';
    // if ($disabled) $disabledStatus = 'disabled="disabled"'; 
   ?>


    <tr>
      <td style="width:5%">
            <input type="checkbox" onclick="PriceSum (this,<?php echo $entry[event_price] ?>)" name="projects[]" value="<?php echo $event_id ?>" <?php echo $projectStatus; ?> /><br>
            <?php 
            if ( $checked and $disabled ) echo '<input type="hidden" name="projects[]" value="'.$event_id.'"/>';
                ?>
      </td>
      <!-- <td style="width:15%"><?php echo date('d.m', strtotime($entry[start]))."-".date('d.m', strtotime($entry[end]));?></td> -->
      <td style="width:60%"> <a href="/akademie/?id=<?php echo $entry[id]; ?>"><?php echo "<i>".ucfirst($entry[type])."</i> ".$entry[title];?></a>
<!-- <a style="font-size: 120%;" href="javascript:toggleMe('<?php echo $event_id; ?>')">+</a><br></td> -->
      <!-- <td style="width:7%"><?php echo $entry[referent] ?></td> -->
      <!-- <td style="width:13%"><?php echo $entry[spots]-$entry[spots_sold] ?></td> -->
    
     </tr>


  <?php 
   echo $entry[text3]
  ?>
    

    <!-- IF disabled -->
    <?php
    }
    ?>
</table>


<!--  -->
<!-- using image to invoke javascript funtions for initialisation -->


<p>Credits left: </p><p id="demo"></p>


<!--  -->


<input type="submit" name="select_projects" value="Select events">
</form>

<?php 
// var_dump($events); 
?>

<img src="/1.gif" onload="setCredits(<?php echo $_SESSION['credits_left']; ?>);displayCredits()" style="visibility: hidden;">




<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>



</div>
<?php include "_side_in.php"; ?>
</div>


<?php 
include "_footer.php"; 
?>
