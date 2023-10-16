@extends('layouts.app')

@section('title', 'Schedules')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>All Schedules</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Schedules</a></div>
                    <div class="breadcrumb-item">All Schedules</div>
                </div>
            </div>
            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Schedules</h4>
                                {{-- <div class="section-header-button">
                                    <a href="{{ route('user.create') }}" class="btn btn-primary">New Subject</a>
                                </div> --}}
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET" action="{{ route('user.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Subject</th>
                                                <th>Day</th>
                                                <th>Start Time</th>
                                                <th>End Time Year</th>
                                                <th>Room</th>
                                                <th>Attendance Code</th>
                                                <th>Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($schedules as $schedule)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $schedule->id }} - {{ $schedule->subject->title }}</td>
                                                    <td>{{ $schedule->hari }}</td>
                                                    <td>{{ $schedule->jam_mulai }}</td>
                                                    <td>{{ $schedule->jam_selesai }}</td>
                                                    <td>{{ $schedule->ruangan }}</td>
                                                    <td>
                                                        <a href="{{ route('generate-qrcode', $schedule->id) }}"
                                                            class="btn btn-primary btn-sm">Generate QRCode</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('schedule.edit', $schedule->id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <form method="POST"
                                                            action="{{ route('schedule.destroy', $schedule->id) }}"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure?')">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $schedules->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
