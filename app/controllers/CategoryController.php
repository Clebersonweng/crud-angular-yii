<?php

namespace app\controllers;

use yii\rest\Controller;
use app\models\Category;

class CategoryController extends Controller
{
   public function actionIndex():array
   {
      return Category::find()->all();
   }
}
