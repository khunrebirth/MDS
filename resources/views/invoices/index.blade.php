@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>สร้างใบแจ้งค่าเช่า</h1>
            </div>
            @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            <div class="section-body">
                <h2 class="section-title">รายชื่อห้องพัก (ทั้งหมด)</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header" style="display: block;">
                                <div class="form-group">
                                    <label>เดือนปัจจุบัน</label>
                                    <input type="date" class="form-control" value="{{ Carbon\Carbon::now()->toDateString() }}" disabled>
                                </div>
                                <div class="text-right">
                                    <a href="{{ route('invoices.build.all', Carbon\Carbon::now()->toDateString()) }}" class="btn btn-primary text-right">
                                        <i class="fas fa-flag"></i> แจ้งทั้งหมด
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>หมายเลขห้อง</th>
                                            <th>จัดการ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rooms as $room)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $room->no }}</td>
                                                <td>
                                                    <a href="{{ route('invoices.build.by.id.room', [Carbon\Carbon::now()->toDateString(), $room->id]) }}" class="btn btn-info">แจ้งค่าเช้า</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
    <script></script>
@endpush