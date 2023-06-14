<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function index()
    {
        $user = User::where('id',Auth::id())->first();

        return Inertia::render('User/MyPageIndex', [
            'user' => $user
        ]);
    }

    public function delete($id)
    {
        User::find($id)->delete();

        return to_route('user.topSite.index')->with([
            'message' => 'La cuenta ha sido eliminada.Gracias. (アカウントを削除しました。ありがとうございました。)',
            'status' => 'success',
        ]);
    }

}
