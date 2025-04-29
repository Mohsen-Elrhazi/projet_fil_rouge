<?php
namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
protected $model;

public function __construct(User $model)
{
$this->model = $model;
}

public function all()
{
// return $this->model->all();
return $this->model->paginate(10);
}

public function find($id)
{
return $this->model->findOrFail($id);
}

public function changeStatus( $id): void
{
    $user = $this->find($id);
    
    $user->status = ($user->status === 'active') ? 'inactive' : 'active';
    $user->save();
}


}