@php use Illuminate\Support\Facades\Session; @endphp
@extends('layout')
@section('pageTitle', 'Categories')
@section('pageContent')
    <div class="container mt-5">
        @if($categories->isNotEmpty())
            <h1 class="mb-5" style="margin-left: -15px">Categories</h1>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Icon</th>
                        @if(Session::has('user_id'))
                            <th scope="col">Action</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if($category->icon)
                                    <img src="{{ asset('storage/' . $category->icon) }}" alt="Category Icon"
                                         style="width: 100px; height: 100px">
                                @else
                                    <img src="{{ asset('storage/placeholder_images/placeholder.png') }}"
                                         alt="Category Icon" style="width: 100px; height: 100px">
                                @endif
                            </td>
                            @if(Session::has('user_id'))
                                <td>
                                    <a  class="btn btn-success btn-sm">Edit</a>
                                    <a  class="btn btn-danger btn-sm"
                                       onclick="return confirm('Are you sure to delete this category?')">Delete</a>
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
