@extends('admin.layout.app')

@section('content')
<!-- Main Content -->
<div class="main">
    @include('admin.layout.topbar')

    <!-- Roles Management Page Content -->
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
                        <h1>Roles</h1>
                        <a href="{{ route('admin.roles.create') }}" class="refresh-btn">Add Role</a>
                    </div>

                    <table id="orderTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Role Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Permissions</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($roles as $index => $role)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ ucfirst($role->name) }}</td>
                                <td><code>{{ $role->slug }}</code></td>
                                <td>{{ $role->description ?? 'N/A' }}</td>
                                <td><span class="status received">{{ $role->permissions->count() }} permissions</span></td>
                                <td>
                                    <div style="display:flex; gap:8px; align-items:center;">
                                        <a href="{{ route('admin.roles.edit', $role->id) }}"
                                            class="icon-btn"
                                            title="Edit"
                                        >
                                            <i class="ri-edit-line"></i>
                                        </a>
                                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this role?');">
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
                                    No roles found.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Client-side pagination container -->
                    <div id="pagination" class="pagination"></div>
                </div>

            </div>

        </div>
    </div>
    <!-- /Roles Management Page Content -->
</div>
@endsection
