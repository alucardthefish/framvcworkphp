<?php

/** @var $model \app\models\User */

use alucardthefish\framvcwork\form\Form;

?>

<h1>Create an account</h1>



<?php $form = Form::begin('', "POST") ?>
  <div class="row">
    <div class="col">
      <?php echo $form->field($model, 'firstname'); ?>
    </div>
    <div class="col">
      <?php echo $form->field($model, 'lastname'); ?>
    </div>
  </div>
  <?php echo $form->field($model, 'email'); ?>
  <?php echo $form->field($model, 'password')->passwordField(); ?>
  <?php echo $form->field($model, 'confirmPassword')->passwordField(); ?>
  <button type="submit" class="btn btn-success">Register</button>
<?php Form::end(); ?>

