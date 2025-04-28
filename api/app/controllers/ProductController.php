<?php

namespace app\controllers;

use yii\rest\Controller;
use Yii;
use app\repositories\ProductRepository;
use yii\filters\VerbFilter;
use yii\web\Response;

class ProductController extends Controller
{
   private ProductRepository $repo;

   public function __construct($id, $module, $config = [])
   {
      // \Yii::info('Request method : ' . Yii::$app->request->method, __METHOD__);

      $this->repo = new ProductRepository();
      parent::__construct($id, $module, $config);
   }
   // public function behaviors()
   // {
   //    return [
   //       'verbs' => [
   //          'class' => VerbFilter::class,
   //          'actions' => [
   //             'index' => ['GET'],
   //             'view' => ['GET'],
   //             'create' => ['POST'],
   //             'update' => ['PUT'],
   //             'delete' => ['DELETE'],
   //          ],
   //       ],
   //    ];
   // }
   public function actionIndex():array
   {
      $resProducts =  $this->repo->all();
      $products = [];
      foreach ($resProducts as $product) {
         $products[] = ['id'=>$product->id,'name'=>$product->name,'quantity'=>$product->quantity,'category'=> $product->category->name];
      }
      return $products;
   }

   public function actionView($id)
   {
      return $this->repo->find($id);
   }

   public function actionCreate()
   {
      Yii::info('Request bodyParams: ' . print_r(Yii::$app->request->bodyParams, true), __METHOD__);

      $productData = Yii::$app->request->bodyParams;
      
      return $this->repo->create($productData);
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
