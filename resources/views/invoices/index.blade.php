@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>สร้างใบแจ้งค่าเช่า</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">รายชื่อห้องพัก (ทั้งหมด)</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header text-right" style="display: block;">
                                <a href="#modalAddEditCustomer" class="btn btn-primary" id="btnShowRoomModal" data-toggle="modal" onclick="addCustomer()">
                                    <i class="fas fa-flag"></i> แจ้งทั้งหมด
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th>หมายเลขห้อง</th>
                                            <th>ชื่อ</th>
                                            <th>สกุล</th>
                                            <th>ชื่อเล่น</th>
                                            <th>จัดการ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
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