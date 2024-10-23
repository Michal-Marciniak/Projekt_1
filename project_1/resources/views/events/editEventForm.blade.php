@extends('layout')
@section('pageTitle', 'Edit Event')
@section('pageContent')
    <div class="container mt-5 form">
        <h2>Edit Event</h2>
        <form class="mt-4" action="/events/edit/{{ $event->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $event->title }}">
                <span class="text-danger">
                    @error('title') {{$message}} @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="4">{{ $event->description }}</textarea>
                <span class="text-danger">
                    @error('description') {{$message}} @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control" name="start_date" value="{{ $event->start_date }}">
                <span class="text-danger">
                    @error('start_date') {{$message}} @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control" name="end_date" value="{{ $event->end_date }}">
                <span class="text-danger">
                    @error('end_date') {{$message}} @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <div class="d-flex justify-content-between">
                    <div>
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    <div>
                        @if($event->image)
                            <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image"
                                 style="width: 50px; height: 50px">
                        @else
                            <img src="{{ asset('storage/placeholder_images/placeholder.png') }}"
                                 alt="Event Image" style="width: 50px; height: 50px">
                        @endif
                    </div>
                </div>
                <span class="text-danger">
                    @error('image') {{$message}} @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="category_name">Select Category:</label>
                <select id="category_name" name="category_name" required>
                    @foreach ($categories as $category)
                        @if($category->name == $event->category_name)
                            <option value="{{ $category->name }}" selected>
                                {{ $category->name }}
                            </option>
                        @else
                            <option value="{{ $category->name }}">
                                {{ $category->name }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Edit Event</button>
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
