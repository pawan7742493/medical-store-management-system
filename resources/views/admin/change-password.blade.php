@extends('layouts.admin')

@section('content')

<div class="container-fluid p-4">

    <div class="mb-4">

        <h3>
            Change Password
        </h3>

        <p class="text-muted">
            Update your admin account password.
        </p>

    </div>


    @if(session('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif


    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="card">

        <div class="card-body">

            <form
                method="POST"
                action="{{ route('admin.password.update') }}"
            >

                @csrf


                {{-- Current Password --}}

                <div class="mb-3">

                    <label class="form-label">
                        Current Password
                    </label>

                    <input
                        type="password"
                        name="current_password"
                        class="form-control"
                        required
                    >

                </div>


                {{-- New Password --}}

                <div class="mb-3">

                    <label class="form-label">
                        New Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        required
                    >

                </div>


                {{-- Confirm Password --}}

                <div class="mb-4">

                    <label class="form-label">
                        Confirm New Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Update Password
                </button>


                <a
                    href="{{ route('admin.account.settings') }}"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

@endsection