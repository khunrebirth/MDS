@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>ลูกค้า</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">รายละเอียดที่ลูกค้าค้างชำระ</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header text-right" style="display: block;">
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th>บิลเลขที่</th>
                                            <th>วัน เดือน ปี</th>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>ชื่อเล่น</th>
                                            <th>จัดการ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($invoices as $invoice)
                                            <tr>
                                                <td>{{ $invoice->id }}</td>
                                                <td>{{ $invoice->date }}</td>
                                                <td>{{ $invoice->customer->first_name }}</td>
                                                <td>{{ $invoice->customer->last_name }}</td>
                                                <td>{{ $invoice->customer->nickname }}</td>
                                                <td>
                                                    <a href="{{ route('customers.invoice.detail', $invoice->id) }}">ดูรายการบิล</a>
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