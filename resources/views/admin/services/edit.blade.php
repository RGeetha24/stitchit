@extends('admin.layout.app')

@section('content')
<!-- Main Content -->
<div class="main">
    @include('admin.layout.topbar')

    <div class="category-page" style="margin-top: 10px;">
        <div class="table-container">
            <div class="recent-header" style="flex-direction: row; align-items: center; justify-content: space-between;">
                <h1>Edit Service</h1>
                <a href="{{ route('admin.services.index') }}" class="refresh-btn">Back to List</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST"
                  action="{{ route('admin.services.update', $service->id) }}"
                  enctype="multipart/form-data"
                  class="category-form">
                @csrf
                @method('PUT')

                <div class="cat-grid">
                    <div class="box">
                        <h4>Basic Details</h4>

                        <div class="form-group">
                            <label for="category_id">Category *</label>
                            <select id="category_id" name="category_id" required>
                                <option value="">-- Select Category --</option>
                                @foreach($masterCategories as $masterCategory)
                                    <optgroup label="{{ $masterCategory->name }}">
                                        @foreach($masterCategory->categories as $category)
                                            <option value="{{ $category->id }}" 
                                                    data-master-category-id="{{ $masterCategory->id }}"
                                                    {{ old('category_id', $service->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $masterCategory->name }} > {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            <input type="hidden" id="master_category_id" name="master_category_id" value="{{ old('master_category_id', $service->master_category_id) }}">
                        </div>

                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name', $service->name) }}"
                                required
                                placeholder="e.g., Custom Tailoring">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug *</label>
                            <input
                                type="text"
                                id="slug"
                                name="slug"
                                value="{{ old('slug', $service->slug) }}"
                                required
                                placeholder="e.g., custom-tailoring">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea
                                id="description"
                                name="description"
                                rows="4"
                                placeholder="Short description (optional)">{{ old('description', $service->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Price (₹)</label>
                            <input
                                type="number"
                                id="price"
                                name="price"
                                value="{{ old('price', $service->price) }}"
                                min="0"
                                step="0.01"
                                placeholder="e.g., 500.00">
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon/Image</label>
                            <input type="file" id="icon" name="icon" accept="image/*">
                            @if ($service->icon)
                                <div style="margin-top:8px;">
                                    <p style="margin:0 0 4px;"><strong>Current Icon:</strong></p>
                                    <img src="{{ asset('uploads/services/'.$service->icon) }}"
                                         alt="Service Icon"
                                         style="max-width: 140px; border-radius: 8px;">
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="box">
                        <h4>SEO & Status</h4>
                        <div class="form-group">
                            <label for="meta_title">Meta Title</label>
                            <input
                                type="text"
                                id="meta_title"
                                name="meta_title"
                                value="{{ old('meta_title', $service->meta_title) }}">
                        </div>
                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea
                                id="meta_description"
                                name="meta_description"
                                rows="3">{{ old('meta_description', $service->meta_description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="meta_keywords">Meta Keywords</label>
                            <input
                                type="text"
                                id="meta_keywords"
                                name="meta_keywords"
                                value="{{ old('meta_keywords', $service->meta_keywords) }}"
                                placeholder="Comma separated">
                        </div>
                        <div class="form-group inline">
                            <div>
                                <label for="status">Status</label>
                                <select id="status" name="status">
                                    <option value="1" {{ old('status', $service->status) == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $service->status) == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div>
                                <label for="sort_order">Sort Order</label>
                                <input
                                    type="number"
                                    id="sort_order"
                                    name="sort_order"
                                    value="{{ old('sort_order', $service->sort_order) }}"
                                    min="0">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="save-cat-btn">Update Service</button>
                    <a href="{{ route('admin.services.index') }}" class="small-btn">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('category_id');
    const masterCategoryInput = document.getElementById('master_category_id');
    
    // Set master_category_id on page load if category is already selected
    if (categorySelect.value) {
        const selectedOption = categorySelect.options[categorySelect.selectedIndex];
        const masterCategoryId = selectedOption.getAttribute('data-master-category-id');
        if (masterCategoryId) {
            masterCategoryInput.value = masterCategoryId;
        }
    }
    
    // Update master_category_id when category changes
    categorySelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const masterCategoryId = selectedOption.getAttribute('data-master-category-id');
        masterCategoryInput.value = masterCategoryId || '';
    });
});
</script>
@endsection
