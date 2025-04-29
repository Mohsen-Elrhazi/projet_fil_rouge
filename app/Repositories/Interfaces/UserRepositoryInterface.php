<?php
namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
public function all();
public function find($id);
public function changeStatus($id);
}