@extends('admin.layout.app')

@section('content')
<!-- Main Content -->
<div class="main">
    @include('admin.layout.topbar')

    <!-- Add Permission Page Content -->
    <div class="category-page" style="margin-top: 10px;">

        <!-- Content Grid -->
        <div class="category-content-grid">

            <!-- LEFT SECTION -->
            <div class="left">

                <div class="table-container">
                    <div class="recent-header" style="display: flex; align-items: center; justify-content: space-between;">
                        <h1>Add New Permission</h1>
                        <a href="{{ route('admin.permissions.index') }}" class="refresh-btn">Back to Permissions</a>
                    </div>

                    <div style="padding: 20px;">
                        <form action="{{ route('admin.permissions.store') }}" method="POST">
                            @csrf
                            <div style="display: grid; gap: 20px; max-width: 700px;">
                                <div>
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Permission Name *</label>
                                    <input type="text" name="name" value="{{ old('name') }}" required 
                                           style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;" 
                                           placeholder="e.g., Edit Users, Delete Posts, View Reports">
                                    <small style="display: block; margin-top: 5px; color: #6c757d;">Use descriptive action-based names. Permission name must be unique.</small>
                                    @error('name')
                                        <small style="color: #dc3545; display: block; margin-top: 5px;">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div>
                                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #333;">Description</label>
                                    <textarea name="description" rows="4" 
                                              style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px; resize: vertical;" 
                                              placeholder="Brief description of what this permission allows users to do">{{ old('description') }}</textarea>
                                    @error('description')
                                        <small style="color: #dc3545; display: block; margin-top: 5px;">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div style="padding: 15px; background-color: #e7f3ff; border-left: 4px solid #2196F3; border-radius: 4px;">
                                    <strong style="color: #1976D2; display: block; margin-bottom: 5px;">💡 Tip:</strong>
                                    <p style="margin: 0; color: #1565C0; font-size: 14px; line-height: 1.5;">
                                        Permissions should be action-specific and clear. They will be assigned to roles and control what users can do in the system.
                                    </p>
                                </div>

                                <div style="display: flex; gap: 12px; justify-content: flex-end; padding-top: 10px; border-top: 1px solid #ddd;">
                                    <a href="{{ route('admin.permissions.index') }}" 
                                       style="padding: 12px 24px; background: #6c757d; color: white; border: none; border-radius: 6px; cursor: pointer; text-decoration: none; display: inline-block; font-weight: 500;">
                                        Cancel
                                    </a>
                                    <button type="submit" 
                                            style="padding: 12px 24px; background: #00897B; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 500;">
                                        <i class="ri-save-line"></i> Create Permission
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <!-- /Add Permission Page Content -->
</div>
@endsection
