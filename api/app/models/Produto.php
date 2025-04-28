<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\Categoria;

class Produto extends ActiveRecord
{
   public static function tableName()
   {
      return 'produto';
   }

   public function rules()
   {
      return [
         [['nome', 'quantidade', 'categoria_id'], 'required'],
         [['quantidade', 'categoria_id'], 'integer'],
      ];
   }

   public function getcategoria()
   {
      return $this->hasOne(Categoria::class, ['id' => 'categoria_id']);
   }
}
