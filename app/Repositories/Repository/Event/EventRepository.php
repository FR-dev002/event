<?php

namespace App\Repositories\Repository\Event;

use App\Repositories\Repository\Event\EventInterface;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class EventRepository extends BaseRepository implements EventInterface
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(Event $model)
   {
       parent::__construct($model);
   }


   public function getAll(): LengthAwarePaginator
   {
    return $this->model->paginate(5);
   }


   public function store(array $attributes): Model
   {
       return $this->model->create($attributes);
   }


   public function getAllByUserId(int $user_id): LengthAwarePaginator
   {
    return $this
        ->model
        ->where('user_id', $user_id)
        ->paginate(5);
   }


}
