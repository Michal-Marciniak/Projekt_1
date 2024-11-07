@extends('layout')
@section('pageTitle', 'Login')
@section('pageContent')
    <div class="container mt-5 mx-auto form d-print-none">
        <form action="{{route('login-user')}}" method="POST">
            @csrf
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
            <button type="submit" class="btn btn-primary mb-3">Login</button>
            <p><a href="/register" class="link-primary link-offset-2 link-underline-opacity-25
            link-underline-opacity-100-hover">New user? Register now</a></p>
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
