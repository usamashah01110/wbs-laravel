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

        $user = Auth::user();

        // Check the count of 'will' and 'attorney' recipients
        $willCount = $user->recipients()->where('type', 'will')->count();
        $attorneyCount = $user->recipients()->where('type', 'attorny')->count();

        if ($request->type == 'will' && $willCount >= 2) {
            return response()->json([
                'error' => true,
                'message' => 'You cannot upload more than two "will" recipients',
            ], 400);
        }

        if ($request->type == 'attorny' && $attorneyCount >= 2) {
            return response()->json([
                'error' => true,
                'message' => 'You cannot upload more than two "attorney" recipients',
            ], 400);
        }


        // Create the new recipient if validation passes
        $recipient = Recipient::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'type' => $request->type,
            'state' => $request->state,
            'zip' => $request->zip,
            'city' => $request->city,
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
