<?php

namespace App\Http\Controllers;

use App\Models\Recipient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipientController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email',
        ]);

        if ($user->recipients()->count() >= 2) {
            return response()->json([
                'error' => false,
                'message' => 'You can only upload more then two recipients .',
            ], 400);
        }

        $recipient = Recipient::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'type' => $request->type,
        ]);

        return response()->json(['success' => true, 'recipient' => $recipient]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email',
        ]);

        $recipient = Recipient::findOrFail($id);

        $recipient->update([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'mobile' => $request->mobile,
            'type' => $request->type,
        ]);

        return response()->json(['success' => true, 'recipient' => $recipient]);
    }

    public function delete($id)
    {
        Recipient::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }


    public function willlist()
    {
        $user = auth()->user();
        $recipients = Recipient::where('user_id', $user->id)
            ->where('type', 'will')
            ->get();
        return response()->json(['success' => true, 'recipients' => $recipients]);
    }


    public function list()
    {
        $user = Auth::user();
        $recipients = Recipient::where('user_id', $user->id)
            ->where('type', 'attorny')
            ->get();
        return response()->json(['success' => true, 'recipients' => $recipients]);
    }
}
