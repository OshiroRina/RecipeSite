<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        return Inertia::render('User/Contact', [
        ]);

    }

    public function store(ContactRequest $request)
    {
        try{
            DB::beginTransaction();

            //お問い合わせテーブル登録
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'context' => $request->context,
                'replay_flag' => 0,
            ]);

            DB::commit();

            return to_route('user.contact.index')->with([
                'message' => 'Ha enviado su mensaje. Muchas gracias. (メッセージを送信しました。)',
                'status' => 'success',
            ]);

        }catch(\Exception $e){
            DB::rollback();
            return to_route('user.contact.index')->with([
                'message' => 'No ha podido enviar el mensaje.(メッセージを送信できませんでした。)',
                'status' => 'danger',
            ]);
        }

    }
}
