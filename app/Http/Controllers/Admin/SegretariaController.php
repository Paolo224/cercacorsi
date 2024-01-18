<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SegretariaController extends Controller
{
    public function eliminaUtente(Request $request)
    {
        $userId = $request->input('user_id');
        $user = User::find($userId);

        if ($user) {
            $user->delete();
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
