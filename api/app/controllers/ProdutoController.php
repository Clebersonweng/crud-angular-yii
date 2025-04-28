<?php

namespace app\controllers;

use yii\rest\Controller;
use Yii;
use app\repositories\ProdutoRepository;

class ProdutoController extends Controller
{
   private ProdutoRepository $repo;

   public function __construct($id, $module, $config = [])
   {
      $this->repo = new ProdutoRepository();
      parent::__construct($id, $module, $config);
   }

   public function actionIndex()
   {
      return $this->repo->all();
   }

   public function actionView($id)
   {
      return $this->repo->find($id);
   }

   public function actionCreate()
   {
      return $this->repo->create(Yii::$app->request->bodyParams);
   }

   public function actionUpdate($id)
   {
      return $this->repo->update($id, Yii::$app->request->bodyParams);
   }

   public function actionDelete($id)
   {
      return $this->repo->delete($id);
   }
}
