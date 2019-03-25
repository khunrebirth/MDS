@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>ห้องพัก</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">รายชื่อห้องพัก</h2>
                <div class="text-right" style="margin-bottom: 15px;">
                    <a href="#" class="btn btn-primary"><i class="fas fa-plus"></i> เพิ่มห้องใหม่</a>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ลำดับ</th>
                                                <th>หมายเลขห้อง</th>
                                                <th>รายละเอียด</th>
                                                <th>ราคา</th>
                                                <th>ลักษณะห้อง</th>
                                                <th>สถานะ</th>
                                                <th>จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rooms as $room)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $room->no }}</td>
                                                <td>{{ $room->detail }}</td>
                                                <td>{{ $room->price }}</td>
                                                <td>{{ $room->room_type_id }}</td>
                                                <td>
                                                    <div class="{{ $room->status != 1 ? 'badge badge-success' : 'badge badge-danger' }}">ว่าง</div>
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-info"><i class="fas fa-eye"></i> ดูรายละเอียด</a>
                                                    <a href="#" class="btn btn-warning"><i class="fas fa-edit"></i> แก้ไข</a>
                                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i> ลบ</a>
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