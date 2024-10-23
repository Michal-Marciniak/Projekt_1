@extends('layout')
@section('pageTitle', 'Add Event')
@section('pageContent')
    <div class="container mt-5 form">
        <h2>Add Event</h2>
        <form id="addEventForm" class="mt-4" action="{{ route('add-event') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                <span class="text-danger">
                    @error('title') {{$message}} @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="4">{{ old('description') }}</textarea>
                <span class="text-danger">
                    @error('description') {{$message}} @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" name="start_date" value="{{ old('start_date') }}">
                <span class="text-danger">
                    @error('start_date') {{$message}} @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" name="end_date" value="{{ old('end_date') }}">
                <span class="text-danger">
                    @error('end_date') {{$message}} @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" class="form-control" name="image" accept="image/*">
                <span class="text-danger">
                    @error('image') {{$message}} @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="category_name">Select Category:</label>
                <select id="category_name" name="category_name" required>
                    @if(!$categories->isNotEmpty())
                        <option value="No categories!">No categories!</option>
                    @else
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}">
                                {{ $category->name }}
                                @if ($category->icon)
                                    <img src="{{ asset('storage/' . $category->icon) }}" alt="Category Icon" style="max-width: 50px;">
                                @endif
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <button id="addEventButton" type="submit" class="btn btn-primary mt-3">Add Event</button>
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
