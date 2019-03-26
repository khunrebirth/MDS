@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>การตั้งค่า</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">รายการตั้งค่า</h2>

                <div id="output-status"></div>
                <div class="row">
                    <div class="col-md-12">
                        <form id="setting-form" action="{{ route('settings.update.all') }}" method="post">
                            @csrf
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4>กำหนดค่า</h4>
                                </div>
                                    <div class="card-body">
                                        <div class="form-group row align-items-center">
                                            <label for="site-title" class="form-control-label col-sm-3 text-md-right">ราคามิเตอร์น้ำ (ต่อหน่วย)</label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="hidden" name="meter_water_id" value="{{ $accounts[0]->id }}">
                                                <input type="text" name="meter_water_price" class="form-control" id="meterWaterPrice" value="{{ $accounts[0]->price }}">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="site-description" class="form-control-label col-sm-3 text-md-right">ราคามิเตอร์ไฟ (ต่อหน่วย)</label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="hidden" name="meter_eletric_id" value="{{ $accounts[1]->id }}">
                                                <input type="text" name="meter_eletric_price" class="form-control" id="meterEletricPrice" value="{{ $accounts[1]->price }}">
                                            </div>
                                        </div>
                                        {{--<div class="form-group row align-items-center">--}}
                                            {{--<label for="site-description" class="form-control-label col-sm-3 text-md-right">ราคาห้อง</label>--}}
                                            {{--<div class="col-sm-6 col-md-9">--}}
                                                {{--<input type="hidden" name="room_id" value="{{ $accounts[2]->id }}">--}}
                                                {{--<input type="text" name="room_price" class="form-control" id="roomPrice" value="{{ $accounts[2]->price }}">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                    <div class="card-footer bg-whitesmoke text-md-right">
                                        <button type="submit" class="btn btn-primary" id="btnSave">บันทึก</button>
                                        <button type="button" class="btn btn-secondary" id="btnReset">ล้างค่า</button>
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