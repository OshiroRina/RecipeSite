<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * お問い合わせ一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::select()
        ->orderBy('id','desc')
        ->get();

        return Inertia::render('Admin/Contact/Index', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * お問い合わせ一覧
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::select()
        ->where('id',$id)
        ->first();

        return Inertia::render('Admin/Contact/Edit', [
            'contact' => $contact,
        ]);
    }

    /**
     * お問い合わせ一覧
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::select()
        ->where('id',$id)
        ->first();

        // dd($request);

        try{
            DB::beginTransaction();

            $contact->replay_flag = $request->replay_flag;
            $contact->replay_text = $request->text;
            $contact->save();

            DB::commit();

            return to_route('admin.contact.index')->with([
                'message' => 'お問い合わせ返信情報を更新しました',
                'status' => 'success',
            ]);

        } catch(\Exception $e){
            DB::rollback();
            return to_route('admin.contact.edit', ['id'=> $contact->id])->with([
                'message' => 'お問い合わせ返信情報の更新に失敗しました',
                'status' => 'danger',
            ]);
        }
    }
}
