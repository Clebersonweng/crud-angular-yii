<?php


namespace app\repositories;

use app\models\Produto;
use app\interface\ProdutoRepositoryInterface;

class ProdutoRepository implements ProdutoRepositoryInterface
{
   public function all()
   {
      return Produto::find()->with('categoria')->all();
   }

   public function find($id)
   {
      return Produto::findOne($id);
   }

   public function create($data)
   {
      $produto = new Produto();
      $produto->load($data, '');
      return $produto->save() ? $produto : null;
   }

   public function update($id, $data)
   {
      $produto = Produto::findOne($id);
      if (!$produto) return null;
      $produto->load($data, '');
      return $produto->save() ? $produto : null;
   }

   public function delete($id)
   {
      $produto = Produto::findOne($id);
      return $produto?->delete();
   }
}
