<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .invoice {
            width: 40vw;
            margin: 25px auto;
            text-align: center;
            background-color: rgba(209, 209, 209, .5);
            padding: 20px;
            border-radius: 30px;
        }
        img {
            padding: 5px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <div class="invoice">
        <div class="invoice_head">
            <img src="{{asset('public/admin/assets/mona/assets/img/logo22.png')}}" width="80">
            <h3>مجموعه النجار ترحب بكم </h3>
            <h3 class="type">{{ $order->type }}</h3>
            <h4 style="color: blue"> # {{ $order->code }}</h4>
            <h5>{{ $order->date }}</h5>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">السعر</th>
                    <th scope="col">اجمالى</th>
                    <th scope="col">صافى</th>
                    <th scope="col">الوزن</th>
                    <th scope="col">الصنف</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 0;
                @endphp
                @foreach ($items as $item)
                <tr>
                    <td class="tx-center">{{ $item->price }}</td>
                    <td class="tx-center">{{ $item->netQty }}</td>
                    <td class="tx-center">{{ $item->quantity }}</td>
                    <td class="tx-center">{{ $item->wieght }}</td>
                    <td class="tx-center">{{ $item->product->name }}</td>
                    <td class="tx-center">{{ ++$i }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer">
            <table class="table ">
                <thead>
                    <tr>
                        <th> {{ $order->sub_total }}</th>
                        <th colspan="6">الاجمالى </th>
                    </tr>
                    <tr class="delivery">
                        <th>{{ $order->delivery_cost }}</th>
                        <th colspan="6">دليفرى</th>
                    </tr>
                    <tr>
                        <th>{{ $order->total_price }}</th>
                        <th colspan="6">المطلوب سداده</th>
                    </tr>

                </thead>
            </table>
            <p style="color:red">
                المرتجع خلال 48 ساعه ويستثنى الفسيخ السنجارى مع احضار اصل الفاتوره
            </p>
        </div>
        <div class="">
            <img src="{{asset('public/admin/assets/mona/assets/img/qrcode_elnagarfish.com.png')}}" width="100"
                style="border-radius: 50%">
            <p>لمزيد من المعلومات يمكنك زياره موقعنا </p>
        </div>
        <button class="btn btn-danger  float-left mt-3 mr-2 btnprn" id="print_Button"> <i
                class="mdi mdi-printer ml-1"></i>طباعة</button>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('public/admin/assets/js/printThis.js')}}"></script>
    <script>
        $('#print_Button').click(function() {
            $('.invoice').printThis();
            $(this).hide();
        });

        $('#d').click(function() {
            $('.invoice').download();
            $(this).hide();
        });

        $(document).ready(function() {
            var type = $('.type').text();
            data = $('.data').text();
            supplier = $('.supplier_id').val();
            customer = $('.customer_id').val();
            employee = $('employee_id').val();
            // change type ......
            if (type == 0) {
                $('.type').text('تيك اواى');
                $('.head').hide();
                $('.delivery').hide();
            } else if (type == 1) {
                $('.type').text('صاله');
                $('.head').hide();
                $('.delivery').hide();
            } else {
                $('.type').text('دليفرى');
                $('.head').hide();
            }
            // end change type .....
        });
    </script>
</body>
</html>