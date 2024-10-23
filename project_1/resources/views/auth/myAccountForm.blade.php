@extends('layout')
@section('pageTitle', 'My Account')
@section('pageContent')
    <div class="container mt-5 mx-auto form">
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" disabled>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
            </div>
            <p><a href="{{ route('reset-password-form') }}" class="link-primary link-offset-2 link-underline-opacity-25
            link-underline-opacity-100-hover">Reset password</a></p>
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
