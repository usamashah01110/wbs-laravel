<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Recipient;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers()
    {
        try {
            $users = User::all();
            $documents = Document::count();
            $recipients = Recipient::count();

            return response()->json([
                'users' => $users,
                'totalDocuments' => $documents,
                'totalRecipients' => $recipients,
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch users'], 500);
        }
    }

    public function getLoggedInUser()
    {
        try {
            $user = auth()->user();  // Get the logged-in user details
            return response()->json($user, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch user details'], 500);
        }
    }

    public function deleteUser($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json(['error' => 'User not found'], 404);
            }

            $user->delete();

            return response()->json(['message' => 'User deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete user'], 500);
        }
    }
}
