<?php


namespace app\repositories;

use app\models\Product;
use app\interface\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
   public function all()
   {
      return Product::find()->with('category')->all();
   }

   public function find($id):Array
   {
      $product =  Product::findOne($id);

      if ($product) {
         return [
            'id' => $product->id,
            'name' => $product->name,
            'quantity' => $product->quantity,
            'category' => $product->category_id,
         ];
      }
      return [];
   }

   public function create($data)
   {
      $product = new Product();

      $product->name = $data['name'];
      $product->quantity = $data['quantity'];
      $product->category_id = $data['category'];
      
      // $product->load($data, '');
      return $product->save() ? $product : null;
   }

   public function update($id, $data)
   {
      $product = Product::findOne($id);
      if (!$product) return null;
      $product->load($data, '');
      return $product->save() ? $product : null;
   }

   public function delete($id)
   {
      $product = Product::findOne($id);
      return $product?->delete();
   }
}
