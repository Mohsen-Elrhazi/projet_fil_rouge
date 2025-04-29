<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(){
        $users = $this->userRepository->all();
        return view('admin.pages.users', compact('users'));
    }

    public function activerOrDesactiver(string $id)
    {
        // $this->userRepository->changeStatus($id);
        
        // return redirect()->route('admin.users')
        //        ->with('success', 'User status updated successfully.');

        $this->userRepository->changeStatus($id);
        $user = $this->userRepository->find($id);
        
        return response()->json([
            'success' => true,
            'new_status' => $user->status,
            'new_text' => $user->status === 'active' ? 'Deactivate' : 'Activate',
            'new_class' => $user->status === 'active' ? 'text-red-500' : 'text-green-500'
        ]);
    }
   }