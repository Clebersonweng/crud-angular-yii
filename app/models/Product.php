<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Category;

class Product extends ActiveRecord
{
   public static function tableName()
   {
      return 'product';
   }

   public function rules()
   {
      return [
         [['name', 'quantity', 'category_id'], 'required'],
         [['quantity', 'category_id'], 'integer'],
      ];
   }

   public function getcategory()
   {
      return $this->hasOne(Category::class, ['id' => 'category_id']);
   }
}
