<?php

namespace app\models;

use yii\db\ActiveRecord;

class Categoria extends ActiveRecord
{
   public static function tableName()
   {
      return 'categoria';
   }

   public function rules()
   {
      return [
         [['name'], 'required'],
         [['name'], 'string'],
      ];
   }
}
