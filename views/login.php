<div class="form-wrapper">
    <div class="form-cnt">


        <?php $form = \app\core\form\Form::begin('', 'post'); ?>
            <h1>Login</h1>
            <?php echo $form->field($model , 'email') ?>
            <?php  echo $form->field($model , 'password')->passwordField() ?>

            <button type="submit" class="btn-submit">Submit</button>

        <?php  \app\core\form\Form::end(); ?>

    </div>
</div>