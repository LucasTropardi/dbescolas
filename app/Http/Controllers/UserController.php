<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:level')->only('edit','update');
    }

    public function index()
    {
        return view('users.index',[
            'users' => DB::table('users')->orderBy('name')->paginate('5'),
        ]);
    }

    public function edit($id)
    {
        return view('users.edit',[
            'user' => User::findOrFail($id),
        ]);
    }

    public function update(Request $id)
    {
        User::findOrFail($id->id)->update($id->all());
        return redirect()->route('user.index');
    }
}
