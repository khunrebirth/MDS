@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>ห้องพัก</h1>
            </div>
            <div class="section-body">
                <h2 class="section-title">รายชื่อห้องพัก (ทั้งหมด)</h2>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>ค้นหา</h4>
                            </div>
                            <form action="{{ route('rooms.search') }}" method="post">
                                @csrf
                                <div class="card-body" style="padding-bottom: 0px;">
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineradio1" name="room_type" value="all" {{ $roomType ==  'all' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineradio1">ห้องทั้งหมด</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineradio1" name="room_type" value="empty" {{ $roomType == 'empty' ?  'checked' : ''}}>
                                            <label class="form-check-label" for="inlineradio1">ห้องที่ว่างอยู่</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineradio1" name="room_type" value="full" {{ $roomType == 'full' ?  'checked' : ''}}>
                                            <label class="form-check-label" for="inlineradio1">ห้องที่ไม่ว่าง</label>
                                        </div>
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
                            <div class="card-header text-right" style="display: block;">
                                <a href="#modalAddEditRoom" class="btn btn-primary" id="btnShowRoomModal"
                                   data-toggle="modal" onclick="addRoom()"><i class="fas fa-plus"></i> เพิ่มห้องใหม่</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>หมายเลขห้อง</th>
                                                <th>รายละเอียด</th>
                                                <th>ราคา</th>
                                                <th>สถานะ</th>
                                                <th>จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rooms as $room)
                                            <tr>
                                                <td>{{ $room->no }}</td>
                                                <td>{{ $room->detail }}</td>
                                                <td>{{ $room->price }}</td>
                                                <td>
                                                    <div class="{{ $room->status != 1 ? 'badge badge-success' : 'badge badge-danger' }}">
                                                        {{ $room->status != 1 ? 'ว่าง' : 'ไม่ว่าง' }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-info" onclick="showRoom({{ $room->id }})">
                                                        <i class="fas fa-eye"></i> ดูรายละเอียด
                                                    </button>
                                                    <button type="button" class="btn btn-warning" onclick="editRoom({{ $room->id . ',' . "'" . route('rooms.update', $room->id) . "'"}})">
                                                        <i class="fas fa-edit"></i> แก้ไข
                                                    </button>
                                                    <button type="button" class="btn btn-danger" onclick="deleteRoom({{ $room->id . ',' . "'" . route('rooms.destroy', $room->id) . "'"}})">
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

        <div class="modal fade" tabindex="-1" role="dialog" id="modalAddEditRoom">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalRoomName">เพิ่มห้องใหม่</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="p-2" id="addEditRoomForm">
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="no" class="col-sm-3 col-form-label">หมายเลขห้อง</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" value="" id="roomId">
                                        <input type="text" class="form-control" id="roomNo">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="detail" class="col-sm-3 col-form-label">รายละเอียด</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="roomDetail">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="col-sm-3 col-form-label">ราคา</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="roomPrice">
                                    </div>
                                </div>
                                <fieldset class="form-group">
                                    <div class="row">
                                        <div class="col-form-label col-sm-3 pt-0">สถานะ</div>
                                        <div class="col-sm-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="roomStatus1" name="status" value="0" checked>
                                                <label class="form-check-label">
                                                    ว่าง
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" id="roomStatus2" name="status" value="1">
                                                <label class="form-check-label">
                                                    ไม่ว่าง
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group">
                                    <label>ชื่อเจ้าของห้อง</label>
                                    <select class="form-control" id="customerRoom" name="customer_room" disabled>
                                        <option value="empty">เลือกชื่อลูกค้า</option>
                                        @foreach($listCustomers as $customer)
                                            <option value="{{ $customer->id }}">{{ "$customer->first_name $customer->last_name" }}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" value="" id="customerRoomId">
                                </div>
                                <div id="customerRoomStatusBody"></div>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="submit" id="btnAddRoom" class="btn btn-primary">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog"  id="modalShowRoom">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ดูข้อมูลห้อง</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                        <div class="modal-body">
                            <div id="bodyRoom"></div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <a href="#" class="btn btn-primary" id="historyRoom" target="_blank">เช็คประวัติห้อง</a>
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
            $('#modalAddEditRoom form')[0].reset()
            $('#customerRoom').prop('disabled', 'disabled')
            $("#customerRoom option[value=0]").attr('selected', 'selected')
        }

        function showRoom(id) {
            $.ajax({
                url: '{{ route('ajax.get.room.by.id') }}',
                data: {id: id},
                success: function (res) {

                    $('#modalShowRoom').modal('show')

                    var roomStatus = res.data.status == 0 ? 'ว่าง' : 'ไมว่าง'
                    var html = '<p>' +
                        'หมายเลขห้อง: ' + res.data.no + '<br>' +
                        'รายละเอียด: ' + res.data.detail + '<br>' +
                        'ราคา: ' + res.data.price + '<br>' +
                        'สถานะ: ' + roomStatus + ' <br>' +
                        '</p>'

                    var url = '{{ route("rooms.history", ":id") }}'
                    url = url.replace(':id', res.data.id);

                    $('#historyRoom').attr('href', url)
                    $('#bodyRoom').html(html)
                }
            })
        }

        function addRoom() {
            clearForm()
            $('#roomNo').val('')
            $('#roomDetail').val('')
            $('#roomPrice').val('')
            $('#modalRoomName').text('เพิ่มห้องใหม่')
            $('#btnAddRoom').text('บันทึก')
        }

        function editRoom(id, url) {

            clearForm()

            $.ajax({
                url: '{{ route('ajax.get.room.by.id') }}',
                data: {id: id},
                success: function (res) {
                    $('#modalAddEditRoom').modal('show')
                    $('#modalRoomName').text('แก้ไขห้อง')
                    $('#btnAddRoom').text('อัพเดท')
                    $('#roomId').val(res.data.id)
                    $('#roomNo').val(res.data.no)
                    $('#roomDetail').val(res.data.detail)
                    $('#roomPrice').val(res.data.price)

                    if (res.data.status != 0) {
                        $("#roomStatus2").prop("checked", true)
                        $('#customerRoom').prop('disabled', false)
                        $("#customerRoom option[value=" + res.etc.customer_id + "]").attr('selected', 'selected')
                        $("#customerRoomId").val(res.etc.customer_room_id)
                    }

                    var html = '<div class="form-group">\n' +
                        '<label class="d-block">สถานะลูกค้า</label>\n' +
                        '<div class="form-check form-check-inline">\n' +
                        '<input class="form-check-input" type="radio" id="inlineradio2" value="old" name="customer_room_status" checked>\n' +
                        '<label class="form-check-label">คงเดิม</label>\n' +
                        '</div>\n' +
                        '<div class="form-check form-check-inline">\n' +
                        '<input class="form-check-input" type="radio" id="inlineradio2" value="change" name="customer_room_status">\n' +
                        '<label class="form-check-label">เปลี่ยนเจ้าของ</label>\n' +
                        '</div>\n' +
                        '<div class="form-check form-check-inline">\n' +
                        '<input class="form-check-input" type="radio" id="inlineradio2" value="move_out" name="customer_room_status">\n' +
                        '<label class="form-check-label">ย้ายออก</label>\n' +
                        '</div>\n' +
                        '</div>'

                    $('#customerRoomStatusBody').html(html)

                    $('#roomId').data('link-to-update', url)
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

        function deleteRoom(id, url) {
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
            $('#addEditRoomForm').on('submit', function (e) {
                e.preventDefault()

                var roomId = $('#roomId').val()
                var url = ''
                var method = ''
                var customerRoomType = ''
                var customerRoomId = ''

                // Case:: Update
                if (roomId != '') {
                    url = $('#roomId').data('link-to-update')
                    method = 'PATCH'

                    customerRoomType = $('input[type=radio][name=customer_room_status]:checked').val()
                    customerRoomId = $("#customerRoomId").val()
                }

                // Case:: Insert New
                else {
                    url = '{{ route('rooms.store') }}'
                    method = 'POST'
                }

                $.ajax({
                    type: method,
                    url: url,
                    data: {
                        _token: "{{ csrf_token() }}",
                        room_no: $('#roomNo').val(),
                        room_detail: $('#roomDetail').val(),
                        room_price: $('#roomPrice').val(),
                        room_status: $("#roomStatus1").prop("checked") ? 0 : 1,
                        customer_room: $('#customerRoom').val(),
                        customer_room_type: customerRoomType,
                        customer_room_id: customerRoomId
                    },
                    success: function (res) {

                        $('#modalAddEditRoom').modal('hide')

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

            $('input[type=radio][name=status]').on('change', function() {
                if (this.value == '0') {
                    $('#customerRoom').prop('disabled', 'disabled')
                }
                else if (this.value == '1') {
                    $('#customerRoom').prop('disabled', false)
                }
            });
        })
    </script>
@endpush