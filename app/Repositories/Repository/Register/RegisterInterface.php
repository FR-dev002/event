<?php
namespace App\Repositories\Repository\Register;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;


interface RegisterInterface
{
   public function store(array $attributes): Model;

}
