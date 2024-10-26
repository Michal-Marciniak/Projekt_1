@php use Illuminate\Support\Facades\Session; @endphp
@extends('layout')
@section('pageTitle', 'Categories')
@section('pageContent')
    <div class="container mt-5 d-print-none">
        @if($categories->isNotEmpty())
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="mb-5" style="margin-left: -15px">Categories</h1>
                </div>
                <div>
                    <a href="{{ route('add-category-form') }}" class="btn btn-primary btn-md">Add new category</a>
                </div>
            </div>
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
                                    <img src="{{ asset('storage/' . $category->icon) }}" alt="Category Icon" class="category-icon">
                                @endif
                            </td>
                            @if(Session::has('user_id'))
                                <td>
                                    <a href="/categories/edit/{{$category->id}}" class="btn btn-success btn-sm">Edit</a>
                                    <a href="/categories/delete/{{$category->id}}" class="btn btn-danger btn-sm"
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
<style>
    tr {
        height: 50px;
    }
    img.category-icon {
        width: 30px;
        height: 30px;
    }
</style>

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
