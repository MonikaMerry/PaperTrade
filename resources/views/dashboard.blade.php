<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        @include('dashboard.config.css')

        <main id="main" class="main">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Create Paper Trade</h5>
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                            </ul>
                        </div>
                    @endif
                    {{-- @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif --}}
                    <!-- General Form Elements -->
                    <form action="{{ url('save-trade') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Pair Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="pair name...." name="pair_name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Entry Price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="entry...." name="entry">
                            </div>
                        </div>

                        <div class="row mb-3">
                            {{-- <label class="col-sm-2 col-form-label">Submit Button</label> --}}
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Create Order</button>
                            </div>
                        </div>

                    </form><!-- End General Form Elements -->

                </div>
            </div>

            {{-- tables --}}

            <section class="section">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Paper Trades</h5>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ url('closed-trade') }}" class="btn btn-info" type="submit">History</a>

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
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_data as $key=> $item)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->pair_name }}</td>
                                                <td>{{ $item->entry }}</td>
                                                <td>{{ $item->entry_time }}</td>
                                                <td>{{ $item->status }}</td>
                                                <td>
                                                    <a href="{{ url('edit-trade') }}/{{ $item->id }}"
                                                        class="btn btn-primary">Edit</a>

                                                    <a href="{{ url('delete-trade') }}/{{ $item->id }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                                {{ $list_data->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </section>


        </main>
        {{-- <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NewsManagementSystem</span></strong>. All Rights Reserved
        </div>
        <div class="credits"> --}}
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer --> --}}

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>
        @include('dashboard.config.script')

    </x-slot>
</x-app-layout>
