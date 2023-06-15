<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>News Management System</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('dashboard.config.css')
    <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    {{-- news card --}}
    <main id="mains" class="main ml-5">
        <div class="container">
            <div class="pagetitle mt-5">
                <h1>Edit Trade</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/dsahboard') }}">News</a></li>
                        <li class="breadcrumb-item active">Edit Forms</li>
                    </ol>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Trade</h5>
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <!-- General Form Elements -->
                    <form action="{{ url('update-trade') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $edit_data->id }}">
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Entry Price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="entry...." name="entry"
                                    value="{{ $edit_data->entry }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Entry Time</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="entry...." name="entry_time"
                                    value="{{ $edit_data->entry_time }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Exit</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="exit...." name="exit">
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Trade</button>
                                <a href="{{url('dashboard')}}" class="btn btn-secondary">Go Back</a>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

        </div>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    @include('dashboard.config.script')

</body>

</html>
