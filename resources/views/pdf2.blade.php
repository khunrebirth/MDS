<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        body {
            font-family: "THSarabunNew";
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        #header  {
            background-color: #4CAF50;
            color: white;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
        @foreach ($listRooms as $room)
            <?php $invoiceParent = \App\Invoice::find($room->id) ?>
            <?php $invoices = \App\InvoiceDetail::where('invoice_id', '=', $room->id)->get(); ?>

            หมายเลขห้อง {{ $invoiceParent->room->id }}<br>
            รายละเอียดบิล {{ '(งวด ' . \Carbon\Carbon::create($invoiceParent->date)->format('Y-m') . ')' }}

            <table style="margin-top: 18px;">
                <tr id="header">
                    <td>#</td>
                    <td>รายการ</td>
                    <td>หน่วยครั้งที่แล้ว</td>
                    <td>หน่วยปัจจุบัน</td>
                    <td>ราคา</td>
                    <td>รวม</td>
                </tr>
                <tbody>
                <?php $total = 0; $priceRoom = 0; ?>
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
                        <td>{{ $total + $priceRoom . ' บาท'}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="page-break"></div>
        @endforeach
</body>
</html>