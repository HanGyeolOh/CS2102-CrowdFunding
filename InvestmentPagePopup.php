<!-- Investment Page Popup Bar -->
<html lang="en">

<style>
.glyphicon.glyphicon-heart {
    font-size: 25px;
}
</style>

<?php
// if(isset($_POST["amount"])){
//   $donation_amount = $_POST["amount"];
//   $query = "SELECT current_amount FROM projects WHERE project_id = $project_id";
//   $result = pg_query($dbconn, $query);
//   $new_amount = $result + $donation_amount;
//   $query = "UPDATE projects SET current_amount = $new_amount WHERE project_id = $project_id";
//   pg_query($dbconn, $query);
// }
?>

<div class="col-lg-2">
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-1">Continue</button>
  <div class="modal fade" id="modal-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <button type="submit" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title">Thank you for your investment! <span class="glyphicon glyphicon-heart"></span> </h3>
        </div>
        <div class="modal-body">
          Your investment of <a class="text-success"><?php echo "$".$_POST["amount"]; ?></a> will go a long way to supporting our project!
        </div>
        <div class="modal-footer">
          <a href="" type="submit" class="btn btn-default" data-dismiss="modal">Click here for similar projects</a>
        </div>
      </div>
    </div>
  </div>
</div>

</html>
