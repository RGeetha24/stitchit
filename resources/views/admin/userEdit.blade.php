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
            <img src='{{url("admin/assets/images/user.avif")}}' class="profile-avatar">

            <div>
                <h3 id="nameHeader">Smita Patel</h3>
                <p id="roleHeader">Studio Manager</p>
                <small id="studioHeader">Studio #12 · Bangalore</small>
            </div>
        </div>

        <div class="profile-status">
            <span class="status-badge active">Active</span>
            <button class="edit-btn" id="editAccountBtn">Edit Account</button>
            <button class="save-btn" id="saveAccountBtn">Save Changes</button>
        </div>
    </div>

    <!-- GRID SECTION -->
    <div class="account-grid">

        <!-- USER DETAILS -->
        <div class="box editable-section">
            <h4>User Details</h4>

            <div class="info-row">
                <span class="label">Name</span>
                <span class="value" id="nameVal">Smita Patel</span>
                <input type="text" class="edit-input" id="nameInput" value="Smita Patel">
            </div>

            <div class="info-row">
                <span class="label">Email</span>
                <span class="value" id="emailVal">smitapatel12@gmail.com</span>
                <input type="email" class="edit-input" id="emailInput" value="smitapatel12@gmail.com">
            </div>

            <div class="info-row">
                <span class="label">Phone</span>
                <span class="value" id="phoneVal">+91 992346767</span>
                <input type="text" class="edit-input" id="phoneInput" value="+91 992346767">
            </div>
        </div>

        <!-- ACCOUNT SETTINGS -->
        <div class="box editable-section">
            <h4>Account Settings</h4>

            <div class="info-row">
                <span class="label">Reset Password</span>
                <button class="small-btn value">Reset Password</button>
                <input type="password" class="edit-input" placeholder="Enter new password">
            </div>

            <div class="info-row">
                <span class="label">Two Factor Authentication</span>
                <label class="switch value">
                    <input type="checkbox" checked>
                    <span class="slider"></span>
                </label>

                <select class="edit-input">
                    <option>Enabled</option>
                    <option>Disabled</option>
                </select>
            </div>

            <div class="info-row">
                <span class="label">Change Contact Info</span>
                <button class="small-btn value">Change</button>
                <input type="text" class="edit-input" placeholder="Enter new contact number">
            </div>
        </div>

        <!-- STUDIO MANAGEMENT -->
        <div class="box editable-section">
            <h4>Studio / Hub Management</h4>

            <div class="info-row">
                <span class="label">Assigned Studio</span>
                <span class="value" id="studioVal">Studio #12 - Bangalore</span>
                <input type="text" class="edit-input" id="studioInput" value="Studio #12 - Bangalore">
            </div>

            <div class="info-row">
                <span class="label">Email Access</span>
                <button class="small-btn value">Request More Access</button>
                <input type="email" class="edit-input" placeholder="Enter email for access">
            </div>

            <button class="danger-btn value">Deactivate Account</button>
            <button class="danger-btn edit-input">Confirm Deactivation</button>
        </div>

        <!-- ACTIVITY LOG -->
        <div class="box editable-section">
            <h4>Activity Log</h4>

            <div class="info-row">
                <span class="label">Last Login</span>
                <span class="value" id="loginVal">Aug 25, 2025</span>
                <input type="date" class="edit-input" id="loginInput" value="2025-08-25">
            </div>

            <div class="info-row">
                <span class="label">Password Changed</span>
                <span class="value" id="passChangedVal">Aug 25, 2025</span>
                <input type="date" class="edit-input" id="passChangedInput" value="2025-08-25">
            </div>

            <div class="info-row">
                <span class="label">Email Alerts</span>
                <label class="switch value">
                    <input type="checkbox">
                    <span class="slider"></span>
                </label>

                <select class="edit-input">
                    <option>Enabled</option>
                    <option>Disabled</option>
                </select>
            </div>
        </div>

    </div>

</div>
@endsection
@section('scripts')
<script>
    const editBtn = document.getElementById("editAccountBtn");
    const saveBtn = document.getElementById("saveAccountBtn");

    const values = document.querySelectorAll(".value");
    const inputs = document.querySelectorAll(".edit-input");

    editBtn.addEventListener("click", () => {

        // Hide values & show inputs
        values.forEach(v => v.style.display = "none");
        inputs.forEach(i => i.style.display = "block");

        // Button toggle
        editBtn.style.display = "none";
        saveBtn.style.display = "inline-block";
    });

    saveBtn.addEventListener("click", () => {

        // Update visible text from input fields
        document.getElementById("nameVal").textContent = document.getElementById("nameInput").value;
        document.getElementById("emailVal").textContent = document.getElementById("emailInput").value;
        document.getElementById("phoneVal").textContent = document.getElementById("phoneInput").value;
        document.getElementById("studioVal").textContent = document.getElementById("studioInput").value;

        // Also update header values
        document.getElementById("nameHeader").textContent = document.getElementById("nameInput").value;
        document.getElementById("roleHeader").textContent = "Studio Manager"; // static
        document.getElementById("studioHeader").textContent = document.getElementById("studioInput").value;

        // Hide inputs & show final updated values
        values.forEach(v => v.style.display = "inline-block");
        inputs.forEach(i => i.style.display = "none");

        // Button toggle
        editBtn.style.display = "inline-block";
        saveBtn.style.display = "none";
    });
</script>
@endsection