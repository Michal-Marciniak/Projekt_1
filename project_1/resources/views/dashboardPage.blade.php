@php use App\Models\Category;use Illuminate\Support\Facades\Session; @endphp
@extends('layout')
@section('pageTitle', 'Dashboard')
@section('pageContent')
    @if($events->isNotEmpty())
        <div class="container mt-5">
            <div class="d-flex justify-content-between">
                <h1 class="mb-5" style="margin-left: -15px">Events timeline</h1>
                <ul class="navbar-nav d-print-none">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false" style="font-size: 22px">
                            Filter events by categories
                        </a>
                        <ul class="dropdown-menu events-filter-dropdown">
                            <li class="events-filter-option"><a href="/events/filter/no-filter" class="nav-link">Show all events</a></li>
                            @foreach ($categories as $category)
                                <li class="events-filter-option"><a href="/events/filter/{{$category->name}}" class="nav-link">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="row">
                <table class="table" id="events-table">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Category</th>
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    @foreach ($events as $event)
                        <tr
                            onclick="showEventDetails(
                            '{{ $event->title }}',
                            '{{ $event->description }}',
                            '{{ $event->start_date }}',
                            '{{ $event->end_date }}',
                            '{{ asset('storage/' . $event->image) }}',
                            '{{ $event->category_name }}'
                            )" style="cursor: pointer;"
                        >
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->start_date }}</td>
                            <td>
                                <div class="d-flex">
                                    <div style="margin-right: 20px">
                                        {{  $event->category_name }}
                                    </div>
                                    @php
                                        $eventCategory = Category::findOrFail($event->category_id);
                                    @endphp
                                    <div>
                                        @if($eventCategory->icon)
                                            <img src="{{ asset('storage/' . $eventCategory->icon) }}" alt="Category Icon"
                                                 class="category-icon">
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade d-print-none" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img id="modalImage" src="" alt="Event Image" class="img-fluid mb-3" style="max-height: 200px; object-fit: cover;">
                        <p><strong>Title:</strong> <span id="modalTitle"></span></p>
                        <p><strong>Description:</strong> <span id="modalDescription"></span></p>
                        <p><strong>Start Date:</strong> <span id="modalStartDate"></span></p>
                        <p><strong>End Date:</strong> <span id="modalEndDate"></span></p>
                        <p><strong>Category:</strong> <span id="modalCategory"></span></p>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        @if(Session::has('user_id'))
                            <div>
                                <a href="/events/edit/{{$event->id}}" class="btn btn-success btn-md">Edit</a>
                                <a href="/events/delete/{{$event->id}}" class="btn btn-danger btn-md"
                                   onclick="return confirm('Are you sure to delete this event?')">Delete</a>
                            </div>
                        @endif
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container mt-5" style="text-align: center">
            <h2>There are no events!</h2>
            @if(Session::has('user_id'))
                <p class="mt-4 d-print-none">
                    <a href="{{ route('add-event-form') }}" class="link-primary link-offset-2 link-underline-opacity-25
                        link-underline-opacity-100-hover">Add first event</a>
                </p>
            @endif
        </div>
    @endif
@endsection
<style>
    .table td, .table th {
        vertical-align: middle;
        width: 33%;
    }
    tr {
        height: 50px;
    }
    img.category-icon {
        width: 30px;
        height: 30px;
    }
    ul.events-filter-dropdown {
        padding: 10px 15px 10px;
    }
    li.events-filter-option:hover {
        opacity: 0.6;
    }
</style>

<script>
    function showEventDetails(title, description, startDate, endDate, image, category) {
        const $modalImage = $('#modalImage')

        $('#modalTitle').text(title);
        $('#modalDescription').text(description);
        $('#modalStartDate').text(startDate);
        $('#modalEndDate').text(endDate);
        $('#modalCategory').text(category);

        if (image.endsWith('/storage')) {
            $modalImage.hide()
        } else {
            $modalImage.show().attr('src', image);
        }

        $('#eventModal').modal('show');
    }

    setTimeout(() => {
        let alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
            alert.remove();
        }
    }, 3000);
</script>
