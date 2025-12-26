<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function accounts()
    {
        return view('site.profile.accounts');
    }

    public function subscription()
    {
        return view('site.profile.subscription');
    }

    public function monthlySubscription()
    {
        return view('site.profile.monthlySubscription');
    }

    public function quarterSubscription()
    {
        return view('site.profile.quarterSubscription');
    }

    public function yearSubscription()
    {
        return view('site.profile.yearSubscription');
    }

    public function referAndEarn()
    {
        return view('site.profile.referAndEarn');
    }

    public function donateClothes()
    {
        return view('site.profile.donateClothes');
    }

    public function viewProfile()
    {
        $user = Auth::user();
        return view('site.profile.viewProfile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:Male,Female,Other',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string',
            'bust' => 'nullable|string|max:10',
            'waist' => 'nullable|string|max:10',
            'hip' => 'nullable|string|max:10',
            'shoulder_width' => 'nullable|string|max:10',
            'sleeve_length' => 'nullable|string|max:10',
            'dress_length' => 'nullable|string|max:10',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if exists
            if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }
            
            $file = $request->file('profile_picture');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/profile', $filename, 'public');
            $validated['profile_picture'] = $path;
        }

        $user->update($validated);

        return redirect()->route('viewProfile')->with('success', 'Profile updated successfully!');
    }

    public function removeProfilePicture()
    {
        $user = Auth::user();
        
        if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
            Storage::disk('public')->delete($user->profile_picture);
        }
        
        $user->update(['profile_picture' => null]);
        
        return redirect()->route('viewProfile')->with('success', 'Profile picture removed successfully!');
    }

    public function donationHistory()
    {
        return view('site.profile.donationHistory');
    }

    public function settings()
    {
        return view('site.profile.settings');
    }

    public function wallet()
    {
        return view('site.profile.wallet');
    }

    public function trackDonation()
    {
        return view('site.profile.trackDonation');
    }
}
