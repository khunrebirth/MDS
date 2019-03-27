@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>จ่ายค่าเช่า</h1>
            </div>

            @if(Session::has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif

            <div class="section-body">
                <h2 class="section-title">รายละเอียด</h2>

                <div id="output-status"></div>
                <div class="row">
                    <div class="col-md-12">
                        <form  action="{{ route('payments.create') }}" method="post">
                            @csrf
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4>ใส่รายละเอียด</h4>
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
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script></script>
@endpush