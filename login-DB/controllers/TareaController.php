<?php

namespace app\controllers;

class TareaController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('about.php');
    }

}
