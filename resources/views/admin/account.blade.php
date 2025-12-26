@extends('admin.layout.app')
@section('content')
<div class="page-wrapper">
    <div class="recent-header">
        <h1>Account Management</h1><br>
        <p>Manage your personal details,security and preference</p>
    </div>
    <!-- ACCOUNT HEADER -->
    <div class="account-header">
        <div class="profile-info">
            <img src='{{url("admin//assets/images/user.avif")}}' class="profile-avatar">

            <div>
                <h3>Smita Patel</h3>
                <p>Studio Manager</p>
                <small>Studio #12 · Bangalore</small>
            </div>
        </div>

        <div class="profile-status">
            <span class="status-badge active">Active</span>
            <a href="{{route('admin.userEdit')}}">
                <button class="edit-btn">Edit Account</button>
            </a>

        </div>
    </div>

    <!-- GRID SECTION -->
    <div class="account-grid">

        <!-- USER DETAILS -->
        <div class="box">
            <h4>User Details</h4>

            <div class="info-row">
                <span class="label">Name</span>
                <span class="value">Smita Patel</span>
            </div>

            <div class="info-row">
                <span class="label">Email</span>
                <span class="value">smitapatel12@gmail.com</span>
            </div>

            <div class="info-row">
                <span class="label">Phone</span>
                <span class="value">+91 992346767</span>
            </div>
        </div>

        <!-- ACCOUNT SETTINGS -->
        <div class="box">
            <h4>Account Settings</h4>

            <div class="info-row">
                <span class="label">Reset Password</span>
                <button class="small-btn">Reset Password</button>
            </div>

            <div class="info-row">
                <span class="label">Two Factor Authentication</span>
                <label class="switch">
                    <input type="checkbox" checked>
                    <span class="slider"></span>
                </label>
            </div>

            <div class="info-row">
                <span class="label">Change Contact Info</span>
                <button class="small-btn">Change</button>
            </div>
        </div>

        <!-- STUDIO MANAGEMENT -->
        <div class="box">
            <h4>Studio / Hub Management</h4>

            <div class="info-row">
                <span class="label">Assigned Studio</span>
                <span class="value">Studio #12 - Bangalore</span>
            </div>

            <div class="info-row">
                <span class="label">Email</span>
                <button class="small-btn">Request More Access</button>
            </div>

            <button class="danger-btn">Deactivate Account</button>
        </div>

        <!-- ACTIVITY LOG -->
        <div class="box">
            <h4>Activity Log</h4>

            <div class="info-row">
                <span class="label">Login from Chrome, Windows</span>
                <span class="value">Aug 25, 2025</span>
            </div>

            <div class="info-row">
                <span class="label">Password Changed</span>
                <span class="value">Aug 25, 2025</span>
            </div>

            <div class="info-row">
                <span class="label">Email Alerts</span>
                <label class="switch">
                    <input type="checkbox">
                    <span class="slider"></span>
                </label>
            </div>

            <button class="save-btn">Save Changes</button>
        </div>

    </div>

</div>
@endsection