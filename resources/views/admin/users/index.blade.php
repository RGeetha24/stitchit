@extends('admin.layout.app')

@section('content')
<!-- Main Content -->
<div class="main">
    @include('admin.layout.topbar')

    <!-- User Management Page Content -->
    <div class="category-page" style="margin-top: 10px;">

        <!-- Success/Error Messages -->
        @if(session('success'))
        <div class="alert alert-success" style="background: #d4edda; color: #155724; padding: 12px; border-radius: 6px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger" style="background: #f8d7da; color: #721c24; padding: 12px; border-radius: 6px; margin-bottom: 15px;">
            {{ session('error') }}
        </div>
        @endif

        <!-- Content Grid -->
        <div class="category-content-grid">

            <!-- LEFT SECTION -->
            <div class="left">

                <div class="table-container">
                    <div class="recent-header" style="display: flex; align-items: center; justify-content: space-between;">
                        <h1>Users</h1>
                        <a href="#" class="refresh-btn" onclick="event.preventDefault(); openAddUserModal();">Add User</a>
                    </div>

                    <table id="orderTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ucfirst($user->role ?? 'user') }}</td>
                                <td><span class="status received">Active</span></td>
                                <td>
                                    <div style="display:flex; gap:8px; align-items:center;">
                                        <button
                                            type="button"
                                            class="icon-btn"
                                            title="View"
                                            onclick="viewUser({{ $user->id }})"
                                        >
                                            <i class="ri-eye-line"></i>
                                        </button>
                                        <button
                                            type="button"
                                            class="icon-btn"
                                            title="Edit"
                                            onclick="editUser({{ $user->id }})"
                                        >
                                            <i class="ri-edit-line"></i>
                                        </button>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                class="icon-btn"
                                                title="Delete"
                                            >
                                                <i class="ri-delete-bin-line" style="color:#c00;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 20px;">
                                    No users found.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Client-side pagination container reused from layout script -->
                    <div id="pagination" class="pagination"></div>
                </div>

            </div>

        </div>
    </div>
    <!-- /User Management Page Content -->
</div>

<!-- View User Modal -->
<div id="viewUserModal" class="modal" style="display: none;">
    <div class="modal-content" style="max-width: 600px;">
        <div class="modal-header">
            <h2>User Details</h2>
            <span class="close" onclick="closeViewModal()">&times;</span>
        </div>
        <div class="modal-body">
            <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                <div style="flex-shrink: 0;">
                    <img id="view_profile_picture" src="" alt="Profile Picture" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 3px solid #00897B;">
                </div>
                <div style="flex-grow: 1; display: grid; gap: 15px;">
                    <div><strong>Name:</strong> <span id="view_name"></span></div>
                    <div><strong>Email:</strong> <span id="view_email"></span></div>
                    <div><strong>Phone:</strong> <span id="view_phone"></span></div>
                    <div><strong>Role:</strong> <span id="view_role"></span></div>
                </div>
            </div>
            <div style="display: grid; gap: 15px;">
                <div><strong>Gender:</strong> <span id="view_gender"></span></div>
                <div><strong>Date of Birth:</strong> <span id="view_dob"></span></div>
                <div><strong>Address:</strong> <span id="view_address"></span></div>
                <!-- <div><strong>Created:</strong> <span id="view_created"></span></div> -->
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div id="addUserModal" class="modal" style="display: none;">
    <div class="modal-content" style="max-width: 600px;">
        <div class="modal-header">
            <h2>Add New User</h2>
            <span class="close" onclick="closeAddModal()">&times;</span>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div style="display: grid; gap: 15px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Name *</label>
                        <input type="text" name="name" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Email *</label>
                        <input type="email" name="email" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Password *</label>
                        <input type="password" name="password" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Phone</label>
                        <input type="text" name="phone" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Role *</label>
                        <select name="role" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            <option value="">Select Role</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->slug }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Gender</label>
                        <select name="gender" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div style="display: flex; gap: 10px; justify-content: flex-end; margin-top: 10px;">
                        <button type="button" onclick="closeAddModal()" style="padding: 10px 20px; background: #6c757d; color: white; border: none; border-radius: 4px; cursor: pointer;">Cancel</button>
                        <button type="submit" style="padding: 10px 20px; background: #00897B; color: white; border: none; border-radius: 4px; cursor: pointer;">Create User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit User Modal -->
<div id="editUserModal" class="modal" style="display: none;">
    <div class="modal-content" style="max-width: 600px;">
        <div class="modal-header">
            <h2>Edit User</h2>
            <span class="close" onclick="closeEditModal()">&times;</span>
        </div>
        <div class="modal-body">
            <form id="editUserForm" method="POST">
                @csrf
                @method('PUT')
                <div style="display: grid; gap: 15px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Name *</label>
                        <input type="text" name="name" id="edit_name" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Email *</label>
                        <input type="email" name="email" id="edit_email" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                    <!-- <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Password (Leave blank to keep current)</label>
                        <input type="password" name="password" id="edit_password" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div> -->
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Phone</label>
                        <input type="text" name="phone" id="edit_phone" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Role *</label>
                        <select name="role" id="edit_role" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            <option value="">Select Role</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->slug }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 5px; font-weight: 600;">Gender</label>
                        <select name="gender" id="edit_gender" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div style="display: flex; gap: 10px; justify-content: flex-end; margin-top: 10px;">
                        <button type="button" onclick="closeEditModal()" style="padding: 10px 20px; background: #6c757d; color: white; border: none; border-radius: 4px; cursor: pointer;">Cancel</button>
                        <button type="submit" style="padding: 10px 20px; background: #00897B; color: white; border: none; border-radius: 4px; cursor: pointer;">Update User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.modal {
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.5);
}

.modal-content {
    background-color: #fefefe;
    margin: 5% auto;
    padding: 0;
    border: 1px solid #888;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.modal-header {
    padding: 20px;
    background-color: #00897B;
    color: white;
    border-radius: 8px 8px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.modal-header h2 {
    margin: 0;
    font-size: 1.5rem;
}

.modal-body {
    padding: 20px;
}

.close {
    color: white;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: #ddd;
}
</style>

<script>
function openAddUserModal() {
    document.getElementById('addUserModal').style.display = 'block';
}

function closeAddModal() {
    document.getElementById('addUserModal').style.display = 'none';
}

function viewUser(userId) {
    fetch(`/admin/users/${userId}`)
        .then(response => response.json())
        .then(user => {
            // Set profile picture
            const profilePicture = user.profile_picture 
                ? `/${user.profile_picture}` 
                : '/site/assets/image/testimonial.png';
            document.getElementById('view_profile_picture').src = profilePicture;
            
            document.getElementById('view_name').textContent = user.name || 'N/A';
            document.getElementById('view_email').textContent = user.email || 'N/A';
            document.getElementById('view_phone').textContent = user.phone || 'N/A';
            document.getElementById('view_role').textContent = user.role ? user.role.charAt(0).toUpperCase() + user.role.slice(1) : 'N/A';
            document.getElementById('view_gender').textContent = user.gender || 'N/A';
            document.getElementById('view_dob').textContent = user.date_of_birth || 'N/A';
            document.getElementById('view_address').textContent = user.address || 'N/A';
            // document.getElementById('view_created').textContent = new Date(user.created_at).toLocaleString();
            
            document.getElementById('viewUserModal').style.display = 'block';
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to load user details');
        });
}

function closeViewModal() {
    document.getElementById('viewUserModal').style.display = 'none';
}

function editUser(userId) {
    fetch(`/admin/users/${userId}`)
        .then(response => response.json())
        .then(user => {
            document.getElementById('edit_name').value = user.name || '';
            document.getElementById('edit_email').value = user.email || '';
            document.getElementById('edit_phone').value = user.phone || '';
            document.getElementById('edit_role').value = user.role || '';
            document.getElementById('edit_gender').value = user.gender || '';
            // document.getElementById('edit_password').value = '';
            
            document.getElementById('editUserForm').action = `/admin/users/${userId}`;
            document.getElementById('editUserModal').style.display = 'block';
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to load user details');
        });
}

function closeEditModal() {
    document.getElementById('editUserModal').style.display = 'none';
}

// Close modals when clicking outside
window.onclick = function(event) {
    const viewModal = document.getElementById('viewUserModal');
    const addModal = document.getElementById('addUserModal');
    const editModal = document.getElementById('editUserModal');
    
    if (event.target == viewModal) {
        closeViewModal();
    }
    if (event.target == addModal) {
        closeAddModal();
    }
    if (event.target == editModal) {
        closeEditModal();
    }
}
</script>
@endsection
