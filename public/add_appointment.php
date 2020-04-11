<?php require_once('../private/initialise.php'); 
$patients = find_all_patients();
?>
<?php $page_title = 'Patient Appointment'; ?>
<div class="public">
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
if(is_post_request()) {
	insert_appointment_member($_POST);
	redirect_to(url_for('add_appointment.php?success'));

}
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Appointment</title>
        <!--<link rel="stylesheet" href="style.css">-->
    </head>
	<style>

tr:nth-child(odd) {background-color: #f2f2f2;}

table {
	border-collapse: collapse;
	width: 50%;
}
</style>
<body>
    <h1 id="title-page"><b>PATIENT APPOINTMENT</b></h1>

<h3> <div> 
	<?php if (isset($_GET['success'])){ echo "Appointment has been created"; } ?>
 </div></h3>
<h3><b><div> </div></b></h3>
<br>


<?php if(isset($_GET['patient_id'])){ ?>
    <!-- patient details form -->
    <form action="<?php echo url_for("/add_appointment.php"); ?>" method="post"> 
      <div class="field-column">
      <label id='label'>Selected Patient ID</label>
		<input type="text" name="patient_id" value="<?=$_GET['patient_id']?>"  readonly/>
		</div>

    <div class="field-column">
      <label id='label'>Date</label>
       <input type="date" value="<?=$_GET['date']?>" name="date" required  readonly>
    </div>

	<div class="field-column">
      <label id='label'>Admission Type</label>
       <input type="text" value="<?=$_GET['option_admission']?>" name="option_admission" required  readonly>
    </div>

	<div class="field-column">
      <label id='label'>Time</label>
       <input type="text" value="<?=$_GET['time']?>" name="time" required  readonly>
    </div>

			<center>
	<!-- <?php 
	$times =	get_time_slots($_GET['date']);
	if($times){
	?>
	<table>
		<thead>
			<tr>
				<th colspan="3">Select one available slot</th>
			</tr>
		</thead>
			<tbody>
				<?php
					foreach($times as $k=>$time){
				?>
				<tr>
					<td><?=($k+1)?></td>
					<td><input type="text" value="<?=date("h:i:sa", strtotime($time))?>" readonly /></td>
					<td><input type="radio" name="time" value="<?=$time?>" required /></td>
				</tr>
					<?php } ?>
			</tbody>

	</table>
	<?php } else { ?>
		<h5>Sorry! there is no time slot available</h5>
	<?php } ?> -->

	</center>


	<!-- submit -->
     <!--<input type ="submit" name="submit"> -->
     <div class="field-column">
     <button type="submit" name="submit">Submit</button>
	</div>
     
     <!-- back -->
     <!--<input type ="back" name="back"> -->
	<div class="field-column">
	<button type="button" onclick="history.back();">Back</button>
	</div>

	<?php } else { ?>


    <!-- patient details form -->
    <form action="<?php echo url_for("/add_appointment.php"); ?>" method="get">    <!-- Patient's Surname -->
      <div class="field-column">
      <label id='label'>Select Patient</label>
		<select name="patient_id" required>
			<option></option>
			<?php while($patient = mysqli_fetch_assoc($patients)) { ?>
			<option value="<?= $patient['ID'] ?>"><?= $patient["first_name"].' '.$patient["last_name"] ?></option>
			<?php } ?>
		</select>
        </div>
    <!-- Patient's forename -->
    <div class="field-column">
      <label id='label'>Date</label>
       <input type="date" name="date" min="<?= date('yy-m-d') ?>" required >
    </div>
<br>

	<!-- Option For Admission -->

	<div class="field-column">
    <label id='label'>Options For Admission</label>
     <input id="option_admission" type="radio" name="option_admission" value="inpatient" checked><label id="awareOption">Inpatient (Rays of Sunshine)</label>
     <input id="option_admission" type="radio" name="option_admission" value="outpatient" checked><label id="awareOption">Outpatient</label>
	 <input id="option_admission" type="radio" name="option_admission" value="daycase" checked><label id="awareOption">Day Case (Phillip Isaac)</label>
  </div>

  <!-- Time -->

  <div class="field-column" align="center">
    <label id='label'>Time</label>
    <textarea onfocusout="isEmpty(this,'time')" name="time" style = "width:100%" id="time" placeholder="Required" required>
    </textarea>
  </div>

	<!-- submit -->
     <!--<input type ="submit" name="submit"> -->
     <div class="field-column">
     <button type="submit" name="submit"  style = " width : 30% ; margin-left :50px; height:5% ; margin-bottom: 10px">Submit</button>
	
     <!-- reset button -->
     <!-- <div class="field-column"> -->
     <button type="reset" name="reset"  style = " width : 30% ;margin-left :10px; height:5% ; margin-bottom: 10px">Reset</button>
    </div>
</form>

	<?php } ?>
	
	<style>
    #label {
    font-size: 13px;
    font-weight: bold;
    color : rgb(42,103,204);
    font-family: 'Open Sans', sans-serif;
    text-align: center;
	}
	
	 #awareOption {
		 font-size: 13px; 
		 font-weight: bold; 
		 /* color : rgb(240,138,14);  */
		color :  rgb(116,174,219); 
		font-family: 'Open Sans', sans-serif;
	} 
	
    </style>

<?php include(SHARED_PATH . '/footer.php'); ?>

