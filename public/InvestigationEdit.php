<?php require_once ('../../private/initialise.php'); 
include('../../private/shared/header.php'); 
// if(!isset($GET['patient_ID'])){
//     redirect_to(url_for('/investigations/show.php?patient_ID= ' . $patient_ID));
// }
$patient_ID = $_GET['patient_ID'];
echo $patient_ID;
?>
<?php
    $date_set = find_investigation_dates_of_id($patient_ID);
    //$patient_set = get_all_userIds()
    //echo $date_set;
?>

<?php $page_title = 'Edit Investigations'; ?>

<div id="content">
    <div class= "Investigations listing">
    <h1> Edit Investigation </h1>

    <table class= "list">
        <th> Date </th>

        <?php while ($date = mysqli_fetch_assoc($date_set)){ ?>
            <tr>
                <td> <a class="actions" href = "<?php echo url_for('/investigations/edit_by_date.php?patient_ID=' . $patient_ID .'&date='. $date['date']); ?> " ><?php echo h($date['date']);?> </a></td> 
            </tr> 
        <?php } ?>
    </table>
    
        <?php mysqli_free_result($date_set); ?> 

    </div>
</div>
<?php include(SHARED_PATH . '/footer.php'); ?>



