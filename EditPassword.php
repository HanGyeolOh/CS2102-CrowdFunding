<html lang="en">

<div class="col-lg-2">
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-1">Continue</button>
  <div class="modal fade" id="modal-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">          
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title">Change your password</h3>
        </div>
        <div class="modal-body">
          <div class="form-group row">
            <label for="example-password-input" class="col-2 col-form-label" required="true">Password</label>
            <div class="col-10">
              <input class="form-control" type="password" id="passoword" name="password" required/>
              <small id="passwordHelpInline" class="text-muted">
                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
              </small>
            </div>
          </div>
          <div class="form-group row">
            <label for="example-password-input" class="col-2 col-form-label">Retype Password</label>
            <div class="col-10">
              <input class="form-control" type="password" id="confirmPassword" name="password_check" onkeyup="validatePassword()" required/>
              <span id="password_verification"></span>
            </div>
          </div>
        </div> 
      </div>
    </div>
  </div>
</div>

</html>
