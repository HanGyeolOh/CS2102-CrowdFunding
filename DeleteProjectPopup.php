<!-- Delete Project Popup -->
<html lang="en">
<style>
.black-font{
  color: #000000;
}
</style>
  <div class="modal fade" id="modal-2">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title black-font">Are you sure about deleting this project?</h3>
        </div>
        <div class="modal-body black-font">
          All the donations will be deleted and the process is irreversible.
        </div>
        <div class="modal-footer">
          <a class="btn btn-success" data-dismiss="modal">Cancel</a>
          <a class="btn btn-Warning" href="DeleteProject.php?id=<?php echo $_GET['id'] ?>">Delete</a>
        </div>
      </div>
    </div>
  </div>

</html>
