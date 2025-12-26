# Google OAuth Setup Instructions

## What Was Implemented

Google OAuth authentication has been successfully integrated into your Laravel application for both login and registration.

### Files Modified/Created:
1. **Installed Package**: Laravel Socialite via Composer
2. **Controller**: `app/Http/Controllers/Auth/GoogleAuthController.php`
3. **Config**: `config/services.php` - Added Google credentials
4. **Routes**: `routes/auth.php` - Added Google auth routes
5. **Views**: 
   - `resources/views/auth/login.blade.php` - Added "Continue with Google" button
   - `resources/views/auth/register.blade.php` - Added "Sign up with Google" button

## Setup Instructions

### Step 1: Create Google OAuth Credentials

1. Go to [Google Cloud Console](https://console.cloud.google.com/)
2. Create a new project or select an existing one
3. Navigate to **APIs & Services** > **Credentials**
4. Click **Create Credentials** > **OAuth 2.0 Client ID**
5. Configure the OAuth consent screen if prompted:
   - Select "External" for User Type
   - Fill in required information (App name, User support email, Developer contact)
   - Add scopes: `email` and `profile`
6. For Application type, select **Web application**
7. Add Authorized redirect URIs:
   ```
   http://localhost:8000/auth/google/callback
   http://127.0.0.1:8000/auth/google/callback
   https://yourdomain.com/auth/google/callback  (for production)
   ```
8. Click **Create** and copy your Client ID and Client Secret

### Step 2: Update .env File

Add the following to your `.env` file:

```env
GOOGLE_CLIENT_ID=your-google-client-id-here
GOOGLE_CLIENT_SECRET=your-google-client-secret-here
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
```

**Important**: Replace the placeholder values with your actual Google OAuth credentials.

### Step 3: Clear Configuration Cache

Run the following commands:

```bash
php artisan config:clear
php artisan cache:clear
```

## How It Works

### User Flow:
1. User clicks "Continue with Google" or "Sign up with Google"
2. User is redirected to Google's authentication page
3. User grants permission
4. Google redirects back to your application with user data
5. The application:
   - Checks if user exists by email
   - If exists: logs them in
   - If new: creates account and logs them in
6. User is redirected to the home page

### Routes:
- **GET** `/auth/google` - Initiates Google OAuth flow
- **GET** `/auth/google/callback` - Handles Google's callback

## Features

✅ Single Sign-On with Google  
✅ Automatic user registration  
✅ Email verification automatically marked as verified  
✅ Random secure password generated for Google users  
✅ Profile picture from Google avatar (stored as URL)  
✅ Works for both new registrations and existing user logins  
✅ Error handling with user-friendly messages  

## Testing

1. Ensure your `.env` file has the correct Google credentials
2. Visit `/login` or `/register`
3. Click the "Continue with Google" button
4. Complete Google authentication
5. You should be logged in and redirected to the home page

## Production Deployment

When deploying to production:
1. Update `GOOGLE_REDIRECT_URI` in `.env` to your production URL
2. Add the production redirect URI to Google Cloud Console
3. Ensure your Google OAuth consent screen is published

## Security Notes

- Users authenticated via Google have randomly generated passwords
- Email verification is automatically marked as complete
- The application checks for existing users by email to prevent duplicates
- Session management follows Laravel's standard authentication flow

## Troubleshooting

**Issue**: "Error 400: redirect_uri_mismatch"  
**Solution**: Make sure the redirect URI in Google Console exactly matches the one in your .env file

**Issue**: "Failed to authenticate with Google"  
**Solution**: Check your Client ID and Client Secret are correct in .env

**Issue**: Users not being created  
**Solution**: Verify the User model's $fillable array includes: name, email, password, email_verified_at, profile_picture

## Support

For more information, visit:
- [Laravel Socialite Documentation](https://laravel.com/docs/socialite)
- [Google OAuth Documentation](https://developers.google.com/identity/protocols/oauth2)
