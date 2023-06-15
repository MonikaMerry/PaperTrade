<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title></title>
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
                <h1>Histroy Of Trades</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/dsahboard') }}">dashboard</a></li>
                        <li class="breadcrumb-item active">History Of Trades</li>
                    </ol>
                </nav>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Paper Trades</h5>
                                <div class="d-grid gap-2 d-md-flex">
                                    <a href="{{ url('dashboard') }}" class="btn btn-info" type="submit">Go Back</a>

                                </div>
                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                        {{ Session::get('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (Session::has('danger'))
                                    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                        {{ Session::get('danger') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <!-- Table with stripped rows -->
                                {{-- datatable --}}
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th scope="col">S.No</th>
                                            <th scope="col">Pair Name</th>
                                            <th scope="col">Entry</th>
                                            <th scope="col">Entry Date Time</th>
                                            <th scope="col">Exit</th>
                                            <th scope="col">Exit Date Time</th>
                                            <th scope="col">Profit</th>
                                            <th scope="col">Profit Percentage</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($closed_data as $key=> $items)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $items->pair_name }}</td>
                                                <td>{{ $items->entry }}</td>
                                                <td>{{ $items->entry_time }}</td>
                                                <td>{{ $items->exit }}</td>
                                                <td>{{ $items->exit_time }}</td>
                                                <td>{{ $items->profit }}</td>
                                                <td>{{ $items->profit_percentage }}</td>
                                                <td>{{ $items->status }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                                {{ $closed_data->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    @include('dashboard.config.script')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    @include('dashboard.config.script')
</body>

</html>
