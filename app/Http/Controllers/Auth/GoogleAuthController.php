<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class GoogleAuthController extends Controller
{
    /**
     * Redirect to Google for authentication
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google callback
     */
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Download and store profile picture
            $profilePicturePath = null;
            if ($googleUser->avatar) {
                $profilePicturePath = $this->downloadProfilePicture($googleUser->avatar, $googleUser->email);
            }
            
            // Check if user exists
            $user = User::where('email', $googleUser->email)->first();
            
            if ($user) {
                // Update profile picture if available
                if ($profilePicturePath) {
                    $user->update(['profile_picture' => $profilePicturePath]);
                }
                // User exists, log them in
                Auth::login($user);
            } else {
                // Create new user
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => Hash::make(Str::random(24)), // Random password
                    'email_verified_at' => now(),
                    'profile_picture' => $profilePicturePath,
                ]);
                
                Auth::login($user);
            }
            
            return redirect()->intended('/');
            
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Failed to authenticate with Google. Please try again.');
        }
    }

    /**
     * Download and store profile picture from Google
     */
    private function downloadProfilePicture($avatarUrl, $email)
    {
        try {
            // Create profile directory if it doesn't exist
            $uploadPath = public_path('uploads/profile');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }
            
            // Get image content
            $imageContent = file_get_contents($avatarUrl);
            
            if ($imageContent === false) {
                return null;
            }
            
            // Generate unique filename
            $extension = pathinfo(parse_url($avatarUrl, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'jpg';
            $filename = Str::slug(explode('@', $email)[0]) . '_' . time() . '.' . $extension;
            
            // Save the file
            $filePath = $uploadPath . '/' . $filename;
            file_put_contents($filePath, $imageContent);
            
            // Return relative path for database storage
            return 'uploads/profile/' . $filename;
            
        } catch (\Exception $e) {
            // If download fails, return null and continue without profile picture
            return null;
        }
    }
}
