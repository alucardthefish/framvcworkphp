<?php

/** @var $this \alucardthefish\framvcwork\View */

use alucardthefish\framvcwork\form\Form;
use alucardthefish\framvcwork\form\TextareaField;

/** @var $model \app\models\ContactForm */

$this->title = 'Contact';

?>

<h1>Contact Us</h1>

<?php
$form = Form::begin('', 'post');
echo $form->field($model, 'subject');
echo $form->field($model, 'email');
echo new TextareaField($model, 'body');
echo '<button type="submit" class="btn btn-primary">Submit</button>';
Form::end();
?>
