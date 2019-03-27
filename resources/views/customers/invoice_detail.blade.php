@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>ลูกค้า</h1>
            </div>
            <div class="section-body">
                <h2 class="section-title">รายละเอียดบิล</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">รายการ</th>
                                        <th scope="col">หน่วยครั้งที่แล้ว</th>
                                        <th scope="col">หน่วยปัจจุบัน</th>
                                        <th scope="col">ราคา</th>
                                        <th scope="col">รวม</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $total = 0; $priceRoom = 0; @endphp
                                    @foreach($invoices as $invoice)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $invoice->account->title }}</td>
                                            <td>{{ $invoice->unit }}</td>
                                            <td>{{ $invoice->unit_current }}</td>
                                            <td>{{ $invoice->account->price }}</td>
                                            <td>{{ $invoice->account->id == 3 ? $invoice->account->price : ($invoice->unit_current - $invoice->unit) * $invoice->account->price }}</td>
                                            @php
                                                $total += ($invoice->unit_current - $invoice->unit) * $invoice->account->price;
                                                $priceRoom = $invoice->account->price;
                                            @endphp
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>ทั้งหมด</td>
                                        <td>{{ $total + $priceRoom }}</td>
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