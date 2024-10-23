@extends('layout')
@section('pageTitle', 'Registration')
@section('pageContent')
    <div class="container mt-5 mx-auto form">
        <form action="{{route('register-user')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name"
                       placeholder="Name" value="{{old('name')}}">
                <span class="text-danger">
                    @error('name') {{$message}} @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email"
                       placeholder="Email" value="{{old('email')}}">
                <span class="text-danger">
                    @error('email') {{$message}} @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password"
                       placeholder="Password">
                <span class="text-danger">
                    @error('password') {{$message}} @enderror
                </span>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Register</button>
            <p><a href="/login" class="link-primary link-offset-2 link-underline-opacity-25
            link-underline-opacity-100-hover">Already registered? Log in</a></p>
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
