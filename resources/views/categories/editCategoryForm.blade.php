@extends('layout')
@section('pageTitle', 'Edit Category')
@section('pageContent')
    <div class="container mt-5 form d-print-none">
        <h2>Edit Category</h2>
        <form class="mt-4" action="/categories/edit/{{ $category->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                <span class="text-danger">
                    @error('name') {{$message}} @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="icon" class="form-label">Upload Icon</label>
                <div class="d-flex justify-content-between">
                    <div>
                        <input type="file" class="form-control" name="icon" accept="image/*">
                    </div>
                    <div>
                        @if($category->icon)
                            <img src="{{ asset('storage/' . $category->icon) }}" alt="Category Icon"
                                 style="width: 50px; height: 50px">
                        @endif
                    </div>
                </div>
                <span class="text-danger">
                    @error('icon') {{$message}} @enderror
                </span>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Edit Category</button>
        </form>
    </div>
@endsection

<script>
    setTimeout(() => {
        let alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
            alert.remove();
        }
    }, 3000);
</script>
