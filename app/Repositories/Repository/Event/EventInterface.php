<?php
namespace App\Repositories\Repository\Event;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;


interface EventInterface
{

    /**
    * @return Collection
    */
   public function getAll(): LengthAwarePaginator;

   public function getAllByUserId(int $userId): LengthAwarePaginator;


   public function store(array $attributes): Model;

}
