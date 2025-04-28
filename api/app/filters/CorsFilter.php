<?php

namespace app\filters;

use yii\base\ActionFilter;

class CorsFilter extends ActionFilter
{
   public function beforeAction($action)
   {
      // \Yii::$app->response->headers->set('Access-Control-Allow-Origin', 'http://localhost:4200');
      // \Yii::$app->response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
      // \Yii::$app->response->headers->set('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization');
      // \Yii::$app->response->headers->set('Access-Control-Allow-Credentials', 'true');
      // \Yii::$app->response->headers->set('Access-Control-Max-Age', '3600');

      // if (\Yii::$app->request->method === 'OPTIONS') {
      //    \Yii::$app->response->statusCode = 204;
      //    return false;
      // }

      // return parent::beforeAction($action);
   }
}