<?php
namespace app\models;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegisterForm */
/* @var $form ActiveForm */
$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registerform">
<h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin(); ?>

    <?php $form = ActiveForm::begin([
   
    ]); ?>

        <?= $form->field($model, 'Nombre')-> textInput() ?>
        <?= $form->field($model, 'Username')-> textInput()?>
        <?= $form->field($model, 'Password')-> passwordInput() ?>

    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- RegisterForm -->
