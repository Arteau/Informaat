<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Jeugdhuis;

class UserController extends Controller
{
    public function edit(User $user)
    {
        $jeugdhuizen = Jeugdhuis::all();
        return view('user.edit', compact('user', 'jeugdhuizen'));
    }

    public function update(Request $request, User $user)
    {
        
        session()->flash('message', 'Updated succesfull ');
        
        $user->update($request->all());

        return redirect('/jeugdhuizen');
    }

    public function delete(Request $request, User $user)
    {
        $user->delete($request->all());
        
        session()->flash('message', 'Deleted succesfull ');

        return redirect('jeugdhuizen');
    }
}
