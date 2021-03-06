@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>รายงานยอดชำระ</h1>
            </div>
            <div class="section-body">
                <h2 class="section-title">รายงานยอดชำระ (ทั้งหมด)</h2>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>ค้นหา</h4>
                            </div>
                            <form action="{{ route('reports.search') }}" method="post">
                                @csrf
                                <div class="card-body" style="padding-bottom: 0px;">
                                    <div class="form-group">
                                        <label>เดือน</label>
                                        <input type="month" class="form-control" name="M" value="{{ Carbon\Carbon::now()->toDateString() }}">
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">ค้นหา</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">รายการ</th>
                                        <th scope="col">จำนวน</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (count($invoicesTotal) > 0)
                                        @foreach ($invoicesTotal as $key => $value)
                                            <tr>
                                                <td>{{ $key }}</td>
                                                <td>{{ $value . ' บาท' }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>--</td>
                                            <td>--</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" tabindex="-1" role="dialog" id="modalAddEditCustomer">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalCustomerName">เพิ่มผู้อาศัยใหม่</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="p-2" id="addEditCustomerForm">
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="no" class="col-sm-3 col-form-label">ชื่อ</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" value="" id="customerId">
                                        <input type="text" class="form-control" id="customerFirstName">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no" class="col-sm-3 col-form-label">นามสกุล</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="customerLastName">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no" class="col-sm-3 col-form-label">ชื่อเล่น</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="customerNickname">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no" class="col-sm-3 col-form-label">รหัสประชาชน</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="customerIdcard">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no" class="col-sm-3 col-form-label">เบอร์โทร</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="customerPhone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no" class="col-sm-3 col-form-label">อีเมลล์</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="customerEmail">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="submit" id="btnAddCustomer" class="btn btn-primary">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="modalShowCustomer">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ดูข้อมูลลูกค้า</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="bodyCustomer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        function reload() {
            setTimeout(function () {
                location.reload()
            }, 1 * 1000)
        }

        function clearForm() {
            $('#modalAddEditCustomer form')[0].reset()
        }

        function addCustomer() {
            clearForm()
            $('#customerFirstName').val('')
            $('#customerLastName').val('')
            $('#customerNickname').val('')
            $('#customerIdcard').val('')
            $('#customerPhone').val('')
            $('#customerEmail').val('')
            $('#modalCustomerName').text('เพิ่มลูกค้าใหม่')
            $('#btnAddCustomer').text('บันทึก')
        }

        function showCustomer(id) {
            $.ajax({
                url: '{{ route('ajax.get.customer.by.id') }}',
                data: {id: id},
                success: function (res) {

                    $('#modalShowCustomer').modal('show')

                    var html = '<p>' +
                        'ชื่อ: ' + res.data.first_name + '<br>' +
                        'นามสกุล: ' + res.data.last_name + '<br>' +
                        'ชื่อเล่น: ' + res.data.nickname + '<br>' +
                        'รหัสบัตรประชาชน: ' + res.data.idcard + ' <br>' +
                        'เบอร์โทร: ' + res.data.phone + ' <br>' +
                        'ค้างชำระ: ' + res.etc + ' <br>' +
                        '</p>'

                    $('#bodyCustomer').html(html)
                }
            })
        }

        function editCustomer(id, url) {

            clearForm()

            $.ajax({
                url: '{{ route('ajax.get.customer.by.id') }}',
                data: {id: id},
                success: function (res) {
                    $('#modalAddEditCustomer').modal('show')
                    $('#modalCustomerName').text('แก้ไขลูกค้า')
                    $('#btnAddCustomer').text('อัพเดท')
                    $('#customerId').val(res.data.id)
                    $('#customerFirstName').val(res.data.first_name)
                    $('#customerLastName').val(res.data.last_name)
                    $('#customerNickname').val(res.data.nickname)
                    $('#customerIdcard').val(res.data.idcard)
                    $('#customerPhone').val(res.data.phone)
                    $('#customerEmail').val(res.data.email)
                    $('#customerId').data('link-to-update', url)
                },
                error: function (res) {
                    swal({
                        title: 'Oops...',
                        text: res.message,
                        icon: 'error',
                        timer: '1500'
                    })
                }
            })
        }

        function deleteCustomer(id, url) {
            swal({
                title: 'คุณต้องการจะลบ ?',
                icon: 'warning',
                button: true,
                dangerMode: true
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: 'DELETE',
                            url: url,
                            data: {_token: "{{ csrf_token() }}"},
                            success: function (res) {
                                swal({
                                    title: res.message,
                                    icon: 'success',
                                    button: "Great!"
                                })

                                reload()
                            },
                            error: function (res) {
                                swal({
                                    title: 'Oops...',
                                    text: res.message,
                                    icon: 'error',
                                    timer: '1500'
                                })
                            }
                        })
                    } else {
                        swal('ยกเลิก')
                    }
                })
        }

        $(document).ready(function () {

            $('#addEditCustomerForm').on('submit', function (e) {
                e.preventDefault()

                var customerId = $('#customerId').val()
                var url = ''
                var method = ''

                // Case:: Update
                if (customerId != '') {
                    url = $('#customerId').data('link-to-update')
                    method = 'PATCH'
                }

                // Case:: Insert New
                else {
                    url = '{{ route('customers.store') }}'
                    method = 'POST'
                }

                $.ajax({
                    type: method,
                    url: url,
                    data: {
                        _token: "{{ csrf_token() }}",
                        customer_first_name: $('#customerFirstName').val(),
                        customer_last_name: $('#customerLastName').val(),
                        customer_nickname: $('#customerNickname').val(),
                        customer_idcard: $('#customerIdcard').val(),
                        customer_phone: $('#customerPhone').val(),
                        customer_email: $('#customerEmail').val()
                    },
                    success: function (res) {

                        $('#modalAddEditCustomer').modal('hide')

                        swal({
                            title: res.message,
                            icon: 'success',
                            button: "Great!"
                        })

                        reload()
                    },
                    error: function (res) {
                        swal({
                            title: 'Oops...',
                            text: res.message,
                            icon: 'error',
                            timer: '1500'
                        })
                    }
                })
            })
        })
    </script>
@endpush