@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>บันทึก</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">บันทึกมิเตอร์ไฟประจำงวด</h2>

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="{{ route('meters.electric.update.all') }}" method="post">
                                @csrf
                                <div class="card-header">
                                    <div class="form-group">
                                        <label>เดือนปัจจุบัน</label>
                                        <input type="date" class="form-control" value="{{ Carbon\Carbon::now()->toDateString() }}" disabled>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @foreach($meterElectrics as $meterElectric)
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>หมายเลขห้อง</label>
                                                <input type="hidden" class="form-control" name="id[]" value="{{ $meterElectric->id }}">
                                                <input type="text" class="form-control" name="room_id[]" value="{{ $meterElectric->room_id }}" disabled>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>หน่วยมิเตอร์ครั้งที่แล้ว</label>
                                                <input type="text" class="form-control" name="unit[]" value="{{ $meterElectric->unit }}">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>ใส่มิเตอร์ปัจจุบัน</label>
                                                <input type="text" class="form-control" name="unit_current[]" value="{{ $meterElectric->unit_current }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                </div>
                            </form>
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