<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Dashboard extends Component
{
    public $users;

    public $first_name,$last_name,$phone,$email,$password;

    public function mount(){
        $this->users = User::all();
    }

    public function save(){
        $user = User::create([
            'name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->reset(['first_name','last_name','phone','email','password']);
        $this->users = User::all();
    }

    public function delete($userId){
        $result=User::find($userId);
        $result->delete();

        $this->users = User::all();
    }
    
    public function render()
    {
        return view('livewire.dashboard');
    }
}
