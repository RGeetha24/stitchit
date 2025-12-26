@extends('admin.layout.app')

@section('content')
<!-- Main Content -->
<div class="main">
    @include('admin.layout.topbar')
    <!-- Category Page Content -->
    <div class="category-page" style="margin-top: 10px;">

        {{-- Toast Notifications --}}
        @if (session('success') || session('error'))
            <div id="toast" class="toast {{ session('error') ? 'toast-error' : 'toast-success' }}">
                {{ session('success') ?? session('error') }}
            </div>
        @endif
    
        <div class="category-content-grid">

            <div class="left">
                <div class="table-container">
                    <div class="recent-header" style="display: flex; align-items: center; justify-content: space-between;">
                        <h1>Categories</h1>
                        <a href="{{ route('admin.categories.create') }}" class="refresh-btn">Add Category</a>
                    </div>

                    <table id="categoryTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Master Category</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration + ($categories->currentPage()-1) * $categories->perPage() }}</td>
                                    <td>{{ $category->masterCategory->name ?? '—' }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        @if($category->status)
                                            <span class="status received">Active</span>
                                        @else
                                            <span class="status progress">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div style="display:flex; gap:8px; align-items:center;">
                                            <button
                                                type="button"
                                                class="icon-btn view-category-btn"
                                                data-name="{{ $category->name }}"
                                                data-description="{{ $category->description }}"
                                                data-status="{{ $category->status ? 'Active' : 'Inactive' }}"
                                                data-image="{{ $category->image ? asset('uploads/category/'.$category->image) : '' }}"
                                            >
                                                <i class="ri-eye-line"></i>
                                            </button>
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" title="Edit"><i class="ri-edit-line"></i></a>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Delete" style="background:none;border:none;padding:0;cursor:pointer;color:inherit;">
                                                    <i class="ri-delete-bin-line" style="color:#c00;"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" style="text-align:center;">No categories found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    @if ($categories->hasPages())
                        <div class="pagination">
                            {{ $categories->links() }}
                        </div>
                    @endif
                </div>

            </div>

        </div>
    </div>
    <!-- Category Page Content -->
</div>

<!-- View Category Modal -->
<div id="categoryViewModal" class="modal-overlay" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modalCategoryName">Category Details</h3>
            <button type="button" id="closeCategoryModal" class="modal-close">&times;</button>
        </div>
        <div class="modal-body">
            <p><strong>Name:</strong> <span id="modalCategoryNameText"></span></p>
            <p><strong>Status:</strong> <span id="modalCategoryStatus"></span></p>
            <p><strong>Description:</strong></p>
            <p id="modalCategoryDescription"></p>
            <div id="modalCategoryImageWrapper" style="margin-top:12px; display:none;">
                <p><strong>Image:</strong></p>
                <img id="modalCategoryImage" src="" alt="Category Image" style="max-width:100%; border-radius:8px;">
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toast = document.getElementById('toast');
        if (toast) {
            setTimeout(() => {
                toast.style.opacity = '0';
                setTimeout(() => toast.style.display = 'none', 300);
            }, 2500);
        }

        const modal = document.getElementById('categoryViewModal');
        const closeBtn = document.getElementById('closeCategoryModal');
        const nameEl = document.getElementById('modalCategoryName');
        const nameTextEl = document.getElementById('modalCategoryNameText');
        const statusEl = document.getElementById('modalCategoryStatus');
        const descEl = document.getElementById('modalCategoryDescription');
        const imgWrapperEl = document.getElementById('modalCategoryImageWrapper');
        const imgEl = document.getElementById('modalCategoryImage');

        document.querySelectorAll('.view-category-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const name = this.getAttribute('data-name') || '';
                const status = this.getAttribute('data-status') || '';
                const description = this.getAttribute('data-description') || '—';
                const image = this.getAttribute('data-image') || '';

                nameEl.textContent = name;
                nameTextEl.textContent = name;
                statusEl.textContent = status;
                descEl.textContent = description;

                if (image) {
                    imgEl.src = image;
                    imgWrapperEl.style.display = 'block';
                } else {
                    imgEl.src = '';
                    imgWrapperEl.style.display = 'none';
                }

                modal.style.display = 'flex';
            });
        });

        function closeModal() {
            modal.style.display = 'none';
        }

        closeBtn.addEventListener('click', closeModal);
        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                closeModal();
            }
        });
    });
</script>
@endsection
