<h1>Create an account</h1>


<form action="" method="POST">

    <div class="row">
      <div class="col">
        <div class="mb-3">
          <label for="firstnameInput" class="form-label">Firstname</label>
          <input type="text" class="form-control<?php echo $model->hasError('firstname') ? ' is-invalid' : ''; ?>" name="firstname" value="<?php echo $model->firstname ?>" id="firstnameInput">
          <div class="invalid-feedback">
            <?php echo $model->getFirstError('firstname'); ?>
          </div>
        </div>
      </div>
      
      <div class="col">
        <div class="mb-3">
          <label for="lastnameInput" class="form-label">Lastname</label>
          <input type="text" class="form-control" name="lastname" id="lastnameInput">
      </div>
        </div>
    </div>


  <div class="mb-3">
    <label for="emailInput" class="form-label">Email</label>
    <input type="text" class="form-control" name="email" id="emailInput">
  </div>
  <div class="mb-3">
    <label for="passInput" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="passInput">
  </div>
  <div class="mb-3">
    <label for="passRepInput" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" name="confirmPassword" id="passRepInput">
  </div>

  <button type="submit" class="btn btn-success">Register</button>
</form>