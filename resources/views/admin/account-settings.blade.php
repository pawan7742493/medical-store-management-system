@extends('layouts.admin')

@section('content')

<div class="container-fluid p-4">

    <div class="mb-4">

        <h3>
            Account Settings
        </h3>

        <p class="text-muted">
            Manage your admin account settings.
        </p>

    </div>


    <div class="row g-4">


        {{-- Account Information --}}

        <div class="col-md-6">

            <div class="card h-100">

                <div class="card-header">

                    <h5 class="mb-0">
                        Account Information
                    </h5>

                </div>

                <div class="card-body">

                    <p class="mb-2">

                        <strong>
                            Name:
                        </strong>

                        {{ Auth::user()->name }}

                    </p>


                    <p class="mb-0">

                        <strong>
                            Email:
                        </strong>

                        {{ Auth::user()->email }}

                    </p>

                </div>

            </div>

        </div>


        {{-- Security --}}

        <div class="col-md-6">

            <div class="card h-100">

                <div class="card-header">

                    <h5 class="mb-0">
                        Security
                    </h5>

                </div>

                <div class="card-body">

                    <p class="text-muted">
                        Manage your account password and security.
                    </p>

<a
    href="{{ route('admin.password.change') }}"
    class="btn btn-primary"
>
    Change Password
</a>

                </div>

            </div>

        </div>


        {{-- Profile --}}

        <div class="col-md-6">

            <div class="card h-100">

                <div class="card-header">

                    <h5 class="mb-0">
                        Profile
                    </h5>

                </div>

                <div class="card-body">

                    <p class="text-muted">
                        Update your name and profile picture.
                    </p>

                    <button
                        type="button"
                        class="btn btn-primary"
                        disabled
                    >
                        Edit Profile
                    </button>

                </div>

            </div>

        </div>


    </div>

</div>

@endsection