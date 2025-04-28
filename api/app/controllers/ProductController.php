<?php

namespace app\controllers;

use yii\rest\Controller;
use Yii;
use app\repositories\ProductRepository;
use app\models\Product;


class ProductController extends Controller
{
   private ProductRepository $repo;

   public function __construct($id, $module, $config = [])
   {
      $this->repo = new ProductRepository();
      parent::__construct($id, $module, $config);
   }
   
   public function actionIndex():array
   {
      return  $this->repo->all();
   }

   public function actionView(int $id) :array
   {
      return $this->repo->find($id);
   }

   public function actionCreate(): Product|null
   {
      $productData = Yii::$app->request->bodyParams;
      
      return $this->repo->create($productData);
   }

   public function actionUpdate(int $id): Product|null
   {
      return $this->repo->update($id, Yii::$app->request->bodyParams);
   }

   public function actionDelete(int $id): bool|int
   {
      return $this->repo->delete($id);
   }

   
}
