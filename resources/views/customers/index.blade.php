@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>ลูกค้า</h1>
            </div>

            <div class="section-body">
                <h2 class="section-title">รายชื่อลูกค้า (ทั้งหมด)</h2>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>ค้นหา</h4>
                            </div>
                            <div class="card-body" style="padding-bottom: 0px;">
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineradio1" name="room_type" value="option1" checked>
                                        <label class="form-check-label" for="inlineradio1">ลูกค้าทั้งหมด</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="inlineradio1" name="room_type" value="option1">
                                        <label class="form-check-label" for="inlineradio1">ลูกค้าที่ค้างค่าเช่า</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">ค้นหา</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header text-right" style="display: block;">
                                <a href="#modalAddEditCustomer" class="btn btn-primary" id="btnShowRoomModal"
                                   data-toggle="modal" onclick="addRoom()"><i class="fas fa-plus"></i> เพิ่มลูกค้าใหม่</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>ชื่อเล่น</th>
                                            <th>รหัสบัตรประชาชน</th>
                                            <th>เบอร์โทร</th>
                                            <th>อีเมลล์</th>
                                            <th>ค้างชำระ</th>
                                            <th>จัดการ</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($customers as $customer)
                                            <tr>
                                                <td>{{ $customer->first_name }}</td>
                                                <td>{{ $customer->last_name }}</td>
                                                <td>{{ $customer->nickname }}</td>
                                                <td>{{ $customer->idcard }}</td>
                                                <td>{{ $customer->phone }}</td>
                                                <td>{{ $customer->email }}</td>
                                                <td>0</td>
                                                <td>
                                                    <button type="button" class="btn btn-info" onclick="showCustomer()"><i class="fas fa-eye"></i> ดูรายละเอียด
                                                    </button>
                                                    <button type="button" class="btn btn-warning"
                                                            onclick="editCustomer({{ $customer->id . ',' . "'" . route('customers.update', $customer->id) . "'"}})">
                                                        <i class="fas fa-edit"></i> แก้ไข
                                                    </button>
                                                    <button type="button" class="btn btn-danger"
                                                            onclick="deleteCustomer({{ $customer->id . ',' . "'" . route('customers.destroy', $customer->id) . "'"}})">
                                                        <i class="fas fa-trash-alt"></i> ลบ
                                                    </button>
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
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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