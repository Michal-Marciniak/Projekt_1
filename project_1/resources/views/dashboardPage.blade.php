@php use App\Models\Category;use Illuminate\Support\Facades\Session; @endphp
@extends('layout')
@section('pageTitle', 'Dashboard')
@section('pageContent')
    <div class="container mt-5">
        @if($events->isNotEmpty())
            <div class="d-flex justify-content-between">
                <h1 class="mb-5" style="margin-left: -15px">Events timeline</h1>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                           aria-expanded="false" style="font-size: 22px">
                            Filter events by categories
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li><a href="/events/filter/{{$category->name}}" class="nav-link">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">Image</th>
                        <th scope="col">Category</th>
                        @if(Session::has('user_id'))
                            <th scope="col">Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->title }}</td>
                            <td>{{ $event->description }}</td>
                            <td>{{ $event->start_date }}</td>
                            <td>{{ $event->end_date }}</td>
                            <td>
                                @if($event->image)
                                    <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image"
                                         style="width: 100px; height: 100px">
                                @else
                                    <img src="{{ asset('storage/placeholder_images/placeholder.png') }}"
                                         alt="Event Image" style="width: 100px; height: 100px">
                                @endif
                            </td>
                            <td>
                                {{  $event->category_name }}
                                @php
                                    $eventCategory = Category::findOrFail($event->category_id);
                                @endphp
                                @if($eventCategory->icon)
                                    <img src="{{ asset('storage/' . $eventCategory->icon) }}" alt="Category Icon"
                                         style="width: 50px; height: 50px">
                                @else
                                    <img src="{{ asset('storage/placeholder_images/placeholder.png') }}"
                                         alt="Category Icon" style="width: 50px; height: 50px">
                                @endif
                            </td>
                            @if(Session::has('user_id'))
                                <td>
                                    <a href="/events/edit/{{$event->id}}" class="btn btn-success btn-sm">Edit</a>
                                    <a href="/events/delete/{{$event->id}}" class="btn btn-danger btn-sm"
                                       onclick="return confirm('Are you sure to delete this event?')">Delete</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
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
