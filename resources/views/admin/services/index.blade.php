@extends('admin.layout.app')

@section('content')
<!-- Main Content -->
<div class="main">
    @include('admin.layout.topbar')
    <!-- Service Page Content -->
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
                        <h1>Services</h1>
                        <a href="{{ route('admin.services.create') }}" class="refresh-btn">Add Service</a>
                    </div>

                    <table id="serviceTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Master Category</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($services as $service)
                                <tr>
                                    <td>{{ $loop->iteration + ($services->currentPage()-1) * $services->perPage() }}</td>
                                    <td>{{ $service->masterCategory->name ?? '—' }}</td>
                                    <td>{{ $service->category->name ?? '—' }}</td>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ $service->slug }}</td>
                                    <td>{{ $service->price ? '₹' . number_format($service->price, 2) : '—' }}</td>
                                    <td>
                                        @if($service->status)
                                            <span class="status received">Active</span>
                                        @else
                                            <span class="status progress">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div style="display:flex; gap:8px; align-items:center;">
                                            <button
                                                type="button"
                                                class="icon-btn view-service-btn"
                                                data-name="{{ $service->name }}"
                                                data-description="{{ $service->description }}"
                                                data-price="{{ $service->price }}"
                                                data-status="{{ $service->status ? 'Active' : 'Inactive' }}"
                                                data-icon="{{ $service->icon ? asset('uploads/services/'.$service->icon) : '' }}"
                                            >
                                                <i class="ri-eye-line"></i>
                                            </button>
                                            <a href="{{ route('admin.services.edit', $service->id) }}" title="Edit"><i class="ri-edit-line"></i></a>
                                            <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this service?');">
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
                                    <td colspan="8" style="text-align:center;">No services found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    @if ($services->hasPages())
                        <div class="pagination">
                            {{ $services->links() }}
                        </div>
                    @endif
                </div>

            </div>

        </div>
    </div>
    <!-- Service Page Content -->
</div>

<!-- View Service Modal -->
<div id="serviceViewModal" class="modal-overlay" style="display:none;">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="modalServiceName">Service Details</h3>
            <button type="button" id="closeServiceModal" class="modal-close">&times;</button>
        </div>
        <div class="modal-body">
            <p><strong>Name:</strong> <span id="modalServiceNameText"></span></p>
            <p><strong>Price:</strong> <span id="modalServicePrice"></span></p>
            <p><strong>Status:</strong> <span id="modalServiceStatus"></span></p>
            <p><strong>Description:</strong></p>
            <p id="modalServiceDescription"></p>
            <div id="modalServiceIconWrapper" style="margin-top:12px; display:none;">
                <p><strong>Icon:</strong></p>
                <img id="modalServiceIcon" src="" alt="Service Icon" style="max-width:100%; border-radius:8px;">
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

        const modal = document.getElementById('serviceViewModal');
        const closeBtn = document.getElementById('closeServiceModal');
        const nameEl = document.getElementById('modalServiceName');
        const nameTextEl = document.getElementById('modalServiceNameText');
        const priceEl = document.getElementById('modalServicePrice');
        const statusEl = document.getElementById('modalServiceStatus');
        const descEl = document.getElementById('modalServiceDescription');
        const iconWrapperEl = document.getElementById('modalServiceIconWrapper');
        const iconEl = document.getElementById('modalServiceIcon');

        document.querySelectorAll('.view-service-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const name = this.getAttribute('data-name') || '';
                const price = this.getAttribute('data-price') || '';
                const status = this.getAttribute('data-status') || '';
                const description = this.getAttribute('data-description') || '—';
                const icon = this.getAttribute('data-icon') || '';

                nameEl.textContent = name;
                nameTextEl.textContent = name;
                priceEl.textContent = price ? '₹' + parseFloat(price).toFixed(2) : '—';
                statusEl.textContent = status;
                descEl.textContent = description;

                if (icon) {
                    iconEl.src = icon;
                    iconWrapperEl.style.display = 'block';
                } else {
                    iconEl.src = '';
                    iconWrapperEl.style.display = 'none';
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
