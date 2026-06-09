<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->paginate(20);
        return view('admin.messages', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prenom'  => 'required|string|max:100',
            'nom'     => 'required|string|max:100',
            'email'   => 'required|email',
            'message' => 'required|string|min:10',
        ]);

        Message::create([
            'prenom'  => $request->prenom,
            'nom'     => $request->nom,
            'email'   => $request->email,
            'sujet'   => $request->sujet,
            'message' => $request->message,
        ]);

        return response()->json(['success' => true, 'message' => 'Message envoyé avec succès.']);
    }

    public function marquerLu($id)
    {
        Message::findOrFail($id)->update(['lu' => true]);
        return back()->with('success', 'Message marqué comme lu.');
    }

    public function destroy($id)
    {
        Message::findOrFail($id)->delete();
        return back()->with('success', 'Message supprimé.');
    }
}
