<!-- <h1>Login</h1>

<form action="" method="post">
    <div class="form-group">
        <label>Email address</label>
        <input type="email" name="email" class="form-control" placeholder="Enter your email">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter your password">

    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form> -->

<?php
/** @var $model \app\models\User  */
?>

<h1>Login</h1>

<?php $form = \app\core\form\Form::begin('', 'post'); ?>
    <?php echo $form->field($model , 'email') ?>
    <?php echo $form->field($model , 'password')->passwordField() ?>

    <button type="submit" class="btn btn-primary">Submit</button>

<?php \app\core\form\Form::end(); ?>