@extends('layout')
@section('pageTitle', 'Reset password')
@section('pageContent')
    <div class="container mt-5 mx-auto form d-print-none">
        <form action="{{route('reset-password')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="old_password" class="form-label">Old password</label>
                <input type="password" class="form-control" name="old_password">
                <span class="text-danger">
                    @error('old_password') {{$message}} @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="new_password" class="form-label">New password</label>
                <input type="password" class="form-control" name="new_password">
                <span class="text-danger">
                    @error('new_password') {{$message}} @enderror
                </span>
            </div>
            <div class="mb-3">
                <label for="new_password_repeat" class="form-label">New password repeat</label>
                <input type="password" class="form-control" name="new_password_repeat">
                <span class="text-danger">
                    @error('new_password_repeat') {{$message}} @enderror
                </span>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Change password</button>
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
