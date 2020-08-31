<?php

namespace App\Repositories\Repository\Login;

use App\Repositories\Repository\Login\LoginInterface;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Collection;


class LoginRepository extends BaseRepository implements LoginInterface
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


   public function findByUsername(string $username)
   {
       return $this->model->where('username', $username)->first();
   }
}
