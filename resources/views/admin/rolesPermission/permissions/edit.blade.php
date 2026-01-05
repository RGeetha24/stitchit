@extends('admin.layout.app')

@section('content')
<!-- Main Content -->
<div class="main">
    @include('admin.layout.topbar')

    <!-- Edit Permission Page Content -->
    <div class="category-page" style="margin-top: 10px;">

        <!-- Content Grid -->
        <div class="category-content-grid">

            <!-- LEFT SECTION -->
            <div class="left">

                <div class="table-container">
                    <div class="recent-header" style="display: flex; align-items: center; justify-content: space-between;">
                        <h1>Edit Permission: {{ $permission->name }}</h1>
                        <a href="{{ route('admin.permissions.index') }}" class="refresh-btn">Back to Permissions</a>
                    </div>

                    <div style="padding: 20px;">
                        <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div style="display: grid; gap: 20px; max-width: 700px;">
                                <div>
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Permission Name *</label>
                                    <input type="text" name="name" value="{{ old('name', $permission->name) }}" required 
                                           style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;" 
                                           placeholder="e.g., Edit Users, Delete Posts, View Reports">
                                    <small style="display: block; margin-top: 5px; color: #6c757d;">Use descriptive action-based names. Permission name must be unique.</small>
                                    @error('name')
                                        <small style="color: #dc3545; display: block; margin-top: 5px;">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div>
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Slug</label>
                                    <input type="text" value="{{ $permission->slug }}" readonly 
                                           style="width: 100%; padding: 12px; border: 1px solid #e9ecef; border-radius: 6px; font-size: 14px; background-color: #f8f9fa; color: #6c757d;">
                                    <small style="display: block; margin-top: 5px; color: #6c757d;">Slug is auto-generated from the permission name</small>
                                </div>

                                <div>
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Description</label>
                                    <textarea name="description" rows="4" 
                                              style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; resize: vertical;" 
                                              placeholder="Brief description of what this permission allows users to do">{{ old('description', $permission->description) }}</textarea>
                                    @error('description')
                                        <small style="color: #dc3545; display: block; margin-top: 5px;">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div style="padding: 15px; background-color: #fff3cd; border-left: 4px solid #ffc107; border-radius: 4px;">
                                    <strong style="color: #856404; display: block; margin-bottom: 5px;">⚠️ Warning:</strong>
                                    <p style="margin: 0; color: #856404; font-size: 14px; line-height: 1.5;">
                                        Changing this permission may affect multiple roles and users. Make sure you understand the impact before saving.
                                    </p>
                                </div>

                                <div style="display: flex; gap: 12px; justify-content: flex-end; padding-top: 10px; border-top: 1px solid #ddd;">
                                    <a href="{{ route('admin.permissions.index') }}" 
                                       style="padding: 12px 24px; background: #6c757d; color: white; border: none; border-radius: 6px; cursor: pointer; text-decoration: none; display: inline-block; font-weight: 500;">
                                        Cancel
                                    </a>
                                    <button type="submit" 
                                            style="padding: 12px 24px; background: #00897B; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">
                                        <i class="ri-save-line"></i> Update Permission
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <!-- /Edit Permission Page Content -->
</div>
@endsection
