@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>แดชบอร์ด</h1>
            </div>
            @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>จำนวนห้องทั้งหมด</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalRooms }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>จำนวนลูกค้าทั้งหมด</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalCustomers }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>ค่าเช่าที่ยังไม่ได้จำระ</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalInvoices }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form  action="{{ route('payments.create.fast') }}" method="post">
                        @csrf
                        <div class="card" id="settings-card">
                            <div class="card-header">
                                <h4>ชำระค่าเช่าด่วน</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">หมายเลขห้อง</label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="room_id" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">รหัสบิล</label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="hidden" name="" value="">
                                        <input type="text" name="invoice_id" class="form-control" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-md-right">
                                <button type="submit" class="btn btn-primary" id="btnSave">ตกลง</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script></script>
@endpush