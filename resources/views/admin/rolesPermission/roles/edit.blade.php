@extends('admin.layout.app')

@section('content')
<!-- Main Content -->
<div class="main">
    @include('admin.layout.topbar')

    <!-- Edit Role Page Content -->
    <div class="category-page" style="margin-top: 10px;">

        <!-- Content Grid -->
        <div class="category-content-grid">

            <!-- LEFT SECTION -->
            <div class="left">

                <div class="table-container">
                    <div class="recent-header" style="display: flex; align-items: center; justify-content: space-between;">
                        <h1>Edit Role: {{ $role->name }}</h1>
                        <a href="{{ route('admin.roles.index') }}" class="refresh-btn">Back to Roles</a>
                    </div>

                    <div style="padding: 20px;">
                        <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div style="display: grid; gap: 20px;">
                                <div>
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Role Name *</label>
                                    <input type="text" name="name" value="{{ old('name', $role->name) }}" required 
                                           style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;" 
                                           placeholder="e.g., Manager, Editor, Moderator">
                                    <small style="display: block; margin-top: 5px; color: #6c757d;">Role name must be unique</small>
                                    @error('name')
                                        <small style="color: #dc3545; display: block; margin-top: 5px;">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div>
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Slug</label>
                                    <input type="text" value="{{ $role->slug }}" readonly 
                                           style="width: 100%; padding: 12px; border: 1px solid #e9ecef; border-radius: 6px; font-size: 14px; background-color: #f8f9fa; color: #6c757d;">
                                    <small style="display: block; margin-top: 5px; color: #6c757d;">Slug is auto-generated from the role name</small>
                                </div>

                                <div>
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Description</label>
                                    <textarea name="description" rows="4" 
                                              style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; resize: vertical;" 
                                              placeholder="Brief description of this role and its responsibilities">{{ old('description', $role->description) }}</textarea>
                                    @error('description')
                                        <small style="color: #dc3545; display: block; margin-top: 5px;">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div>
                                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                                        <label style="margin: 0; font-weight: 600; color: #333;">Assign Permissions</label>
                                        <button type="button" id="toggleAllPermissions" 
                                                style="padding: 8px 16px; background: #00897B; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 13px; font-weight: 500;">
                                            <i class="ri-checkbox-multiple-line"></i> Select All
                                        </button>
                                    </div>
                                    <div style="max-height: 400px; overflow-y: auto; padding: 20px; border: 1px solid #ddd; border-radius: 6px; background-color: #f8f9fa;">
                                        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 15px;">
                                            @foreach($permissions as $permission)
                                            <div style="display: flex; align-items: flex-start; gap: 10px; padding: 10px; background: white; border-radius: 4px; border: 1px solid #e9ecef;">
                                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" 
                                                       id="permission_{{ $permission->id }}" 
                                                       {{ in_array($permission->id, old('permissions', $rolePermissions)) ? 'checked' : '' }}
                                                       style="margin-top: 4px; width: 16px; height: 16px; cursor: pointer;">
                                                <label for="permission_{{ $permission->id }}" style="margin: 0; cursor: pointer; flex: 1;">
                                                    <strong style="display: block; color: #333; font-size: 14px;">{{ $permission->name }}</strong>
                                                    @if($permission->description)
                                                        <small style="display: block; color: #6c757d; margin-top: 4px; line-height: 1.4;">{{ $permission->description }}</small>
                                                    @endif
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @error('permissions')
                                        <small style="color: #dc3545; display: block; margin-top: 5px;">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div style="display: flex; gap: 12px; justify-content: flex-end; padding-top: 10px; border-top: 1px solid #ddd;">
                                    <a href="{{ route('admin.roles.index') }}" 
                                       style="padding: 12px 24px; background: #6c757d; color: white; border: none; border-radius: 6px; cursor: pointer; text-decoration: none; display: inline-block; font-weight: 500;">
                                        Cancel
                                    </a>
                                    <button type="submit" 
                                            style="padding: 12px 24px; background: #00897B; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">
                                        <i class="ri-save-line"></i> Update Role
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <!-- /Edit Role Page Content -->
</div>

<script>
// Update button text and attach event listener on page load
document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('input[name="permissions[]"]');
    const button = document.getElementById('toggleAllPermissions');
    
    if (button && checkboxes.length > 0) {
        // Check initial state
        const allChecked = Array.from(checkboxes).every(cb => cb.checked);
        if (allChecked) {
            button.innerHTML = '<i class="ri-close-circle-line"></i> Deselect All';
        }
        
        // Add click event listener
        button.addEventListener('click', function() {
            const currentlyAllChecked = Array.from(checkboxes).every(cb => cb.checked);
            
            checkboxes.forEach(checkbox => {
                checkbox.checked = !currentlyAllChecked;
            });
            
            if (currentlyAllChecked) {
                button.innerHTML = '<i class="ri-checkbox-multiple-line"></i> Select All';
            } else {
                button.innerHTML = '<i class="ri-close-circle-line"></i> Deselect All';
            }
        });
    }
});
</script>
@endsection
