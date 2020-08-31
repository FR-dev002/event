<?php
namespace App\Repositories\Repository\Login;

use Illuminate\Database\Eloquent\Model;


interface LoginInterface
{
   public function store(array $attributes): Model;

   public function findByUsername(string $username);

}
