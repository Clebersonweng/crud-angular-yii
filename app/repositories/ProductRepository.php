<?php


namespace app\repositories;

use app\models\Product;
use app\interface\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
   public function all():array
   {
      $resProducts =  Product::find()->with('category')->all();

      $products = [];
      foreach ($resProducts as $product) {
         $products[] =  [
            'id' => $product->id, 
            'name' => $product->name, 
            'quantity' => $product->quantity, 
            'category' => $product->category->name
         ];
      }
      return $products;
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

   public function create(array $data):Product|null
   {
      $product = new Product();

      $product->name = $data['name'];
      $product->quantity = $data['quantity'];
      $product->category_id = $data['category'];
      
      return $product->save() ? $product : null;
   }

   public function update(int $id, array $data) :Product|bool|null
   {
      $product = Product::findOne($id);
      if (!$product) return null;

      $product->name = $data['name'];
      $product->quantity = $data['quantity'];
      $product->category_id = $data['category'];

      return $product->save() ? $product : null;
   }

   public function delete(int $id):bool|int
   {
      $product = Product::findOne($id);
      return $product?->delete();
   }
}
