<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use App\Models\Stage;
use App\Models\User;
use App\Mail\StageSignInMail;
use App\Mail\StageSignOutMail;

class StageUserController extends Controller
{
    public function sendSignInLink(Request $request, $stageId)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:255'
        ]);

        // Find or create the user
        $user = User::firstOrCreate(
            ['email' => $request->email],
            ['meno' => $request->name]
        );

        $stage = Stage::find($stageId);

        if ($stage) {
            // Check if the user is already signed up for a stage that occurs at the same time
            $conflictingStage = $user->stages()->where('time', $stage->time)->exists();

            if ($conflictingStage) {
                return response()->json(['message' => 'You are already signed up for a stage that occurs at the same time.'], 400);
            }

            // Check if the stage has reached its capacity
            $currentSignups = $stage->users()->count();

            if ($currentSignups >= $stage->capacity) {
                return response()->json(['message' => 'This stage is already at full capacity.'], 400);
            }

            $signInUrl = URL::temporarySignedRoute(
                'stages.signin', now()->addMinutes(30), ['stage' => $stageId, 'user' => $user->id]
            );

            $nconnectmail = "SignInDump@example.com";

            // Send the sign-in email to the user and the default email address
            foreach ([$user->email, $nconnectmail] as $recipient) {
                Mail::to($recipient)->send(new StageSignInMail($signInUrl));
            }

            return response()->json(['message' => 'Sign-in link sent successfully.'], 200);
        }

        return response()->json(['message' => 'Stage not found.'], 404);
    }

    public function sendSignOutLink(Request $request, $stageId)
    {
        $user = User::where('email', $request->email)->first();
        $stage = Stage::find($stageId);

        if ($stage && $user) {
            $signOutUrl = URL::temporarySignedRoute(
                'stages.signout', now()->addMinutes(30), ['stage' => $stageId, 'user' => $user->id]
            );

            $nconnectmail = "SignInDump@example.com";

            // Send the sign-out email to the user and the default email address
            foreach ([$user->email, $nconnectmail] as $recipient) {
                Mail::to($recipient)->send(new StageSignOutMail($signOutUrl));
            }

            return response()->json(['message' => 'Sign-out link sent successfully.'], 200);
        }

        return response()->json(['message' => 'Stage or User not found.'], 404);
    }

    public function signIn(Request $request, $stageId, $userId)
    {
        if (!$request->hasValidSignature()) {
            abort(401);
        }

        $user = User::find($userId);
        $stage = Stage::find($stageId);

        if ($stage && $user) {
            // Check if the stage has reached its capacity
            $currentSignups = $stage->users()->count();

            if ($currentSignups >= $stage->capacity) {
                return response()->json(['message' => 'This stage is already at full capacity.'], 400);
            }

            $user->stages()->attach($stageId);
            return response()->json(['message' => 'Signed in to the stage successfully.'], 200);
        }

        return response()->json(['message' => 'Stage or User not found.'], 404);
    }

    public function signOut(Request $request, $stageId, $userId)
    {
        if (!$request->hasValidSignature()) {
            abort(401);
        }

        $user = User::find($userId);
        $stage = Stage::find($stageId);

        if ($stage && $user) {
            $user->stages()->detach($stageId);
            return response()->json(['message' => 'Signed out of the stage successfully.'], 200);
        }

        return response()->json(['message' => 'Stage or User not found.'], 404);
    }

    public function getStageUsers()
    {
        $stageUsers = \DB::table('stage_user')
            ->join('user', 'stage_user.user_id', '=', 'user.id')
            ->join('stages', 'stage_user.stage_id', '=', 'stages.id')
            ->select('stages.id as stage_id', 'stages.title as stage_name', 'user.id as user_id', 'user.meno as user_name', 'user.email as user_email')
            ->get();

        return response()->json($stageUsers);
    }
}
