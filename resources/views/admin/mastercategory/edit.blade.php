@extends('admin.layout.app')

@section('content')
<!-- Main Content -->
<div class="main">
    @include('admin.layout.topbar')

    <div class="category-page" style="margin-top: 10px;">
        <div class="table-container">
            <div class="recent-header" style="flex-direction: row; align-items: center; justify-content: space-between;">
                <h1>Edit Main Category</h1>
                <a href="{{ route('admin.category.index') }}" class="refresh-btn">Back to List</a>
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
                  action="{{ route('admin.category.update', $category->id) }}"
                  enctype="multipart/form-data"
                  class="category-form">
                @csrf
                @method('PUT')

                <div class="cat-grid">
                    <div class="box">
                        <h4>Basic Details</h4>
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name', $category->name) }}"
                                required
                                placeholder="e.g., Men, Women, Kids">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug *</label>
                            <input
                                type="text"
                                id="slug"
                                name="slug"
                                value="{{ old('slug', $category->slug) }}"
                                required
                                placeholder="e.g., men, women, kids">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea
                                id="description"
                                name="description"
                                rows="4"
                                placeholder="Short description (optional)">{{ old('description', $category->description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" id="image" name="image" accept="image/*">
                            @if ($category->image)
                                <div style="margin-top:8px;">
                                    <p style="margin:0 0 4px;"><strong>Current Image:</strong></p>
                                    <img src="{{ asset('uploads/mastercategory/'.$category->image) }}"
                                         alt="Category Image"
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
                                value="{{ old('meta_title', $category->meta_title) }}">
                        </div>
                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea
                                id="meta_description"
                                name="meta_description"
                                rows="3">{{ old('meta_description', $category->meta_description) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="meta_keywords">Meta Keywords</label>
                            <input
                                type="text"
                                id="meta_keywords"
                                name="meta_keywords"
                                value="{{ old('meta_keywords', $category->meta_keywords) }}"
                                placeholder="Comma separated">
                        </div>
                        <div class="form-group inline">
                            <div>
                                <label for="status">Status</label>
                                <select id="status" name="status">
                                    <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div>
                                <label for="sort_order">Sort Order</label>
                                <input
                                    type="number"
                                    id="sort_order"
                                    name="sort_order"
                                    value="{{ old('sort_order', $category->sort_order) }}"
                                    min="0">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="save-cat-btn">Update Category</button>
                    <a href="{{ route('admin.category.index') }}" class="small-btn">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


