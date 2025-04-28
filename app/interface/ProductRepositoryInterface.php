<?php

namespace app\interface;

use app\models\Product;


interface ProductRepositoryInterface
{
   public function all(): array;
   public function find(int $id): array;
   public function create(array $data): Product|null;
   public function update(int $id, array $data): Product|bool|null;
   public function delete(int $id): bool|int;
}
