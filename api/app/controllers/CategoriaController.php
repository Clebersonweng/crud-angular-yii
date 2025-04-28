<?php

namespace app\controllers;

use yii\rest\Controller;
use app\models\Categoria;

class CategoriaController extends Controller
{
   public function actionIndex()
   {
      return Categoria::find()->all();
   }
}
