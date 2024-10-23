@extends('layout')
@section('pageTitle', 'Add Category')
@section('pageContent')
    <div class="container mt-5 form">
        <h2>Add Category</h2>
        <form class="mt-4" action="{{ route('add-category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                <span class="text-danger">
                    @error('name') {{$message}} @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="icon" class="form-label">Upload Icon</label>
                <input type="file" class="form-control" name="icon" accept="image/*">
                <span class="text-danger">
                    @error('icon') {{$message}} @enderror
                </span>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Add Category</button>
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
