@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>ห้อง</h1>
            </div>
            <div class="section-body">
                <h2 class="section-title">ประวัติห้อง</h2>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ชื่อ</th>
                                        <th scope="col">สกุล</th>
                                        <th scope="col">ย้ายเข้าเมื่อ</th>
                                        <th scope="col">ย้ายออกเมื่อ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customerRooms as $customerRoom)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <?php
                                         $customer = App\Customer::find($customerRoom->customer_id);
                                        ?>
                                        <td>{{ $customer->first_name }}</td>
                                        <td>{{ $customer->last_name }}</td>
                                        <td>{{ $customerRoom->date_move_in }}</td>
                                        <td>{{ $customerRoom->date_move_out }}</td>
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