<?php

namespace App\Repositories\Repository\Register;

use App\Repositories\Repository\Register\RegisterInterface;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class RegisterRepository extends BaseRepository implements RegisterInterface
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(User $model)
   {
       parent::__construct($model);
   }

   public function store(array $attributes): Model
   {
       return $this->model->create($attributes);
   }
}
