@extends('resturant.master')
@section('title', 'دليفري')
@section('css')

@endsection
@section('header_title', 'دليفري')
@section('content')
<div class="dainfo">
    <h3 style="font-size: 30px; color:blue">دليفري </h3>
</div>
<form method="post" action="{{ route('makeOrderdelivary') }}">
    @csrf
    <div class="row">
        <input type="hidden" name="order" value="2">
        <div class="col-md-3 col-12 form-group">
            <label> الطيار <span style="color:#040202;">*</span></label>
            <div class="inputcode">
                <div class="iconantimat"> <i class="fas fa-eraser"></i></div>
                <input type="text" class="form-control" name="delivery_agent">
            </div>
        </div>

        <div class="col-md-3 col-12 form-group px-0">
            <label>نوع العميل <span style="color:#040202;">*</span></label>
            <div class="inputcode">
                <div class="iconantimat"><i class="fas fa-user"></i></div>
                <select class="form-control" id="type" onchange="changtype()">
                    <option disabled selected>اختر نوع العميل </option>
                    <option value="0">فرد</option>
                    <option value="1">مورد</option>
                    <option value="2">موظف</option>
                </select>
            </div>
        </div>
        <!-- form for 0 value  -->
        <div class="col-6" id="type0" style="display:none">
            <div class="container text-center mb-2">
                <div class="row">
                    <div class="col">
                        <label> اسم العميل <span style="color:#040202">*</span> </label>
                        <div class="inputcode">
                            <div class="iconantimat"><i class="fas fa-eraser"></i></div>
                            <input type="text" class="form-control" name="customer_id">
                        </div><!-- inputcode -->
                    </div>
                    <div class="col">
                        <label> رقم التليفون <span style="color:#040202">*</span> </label>
                        <div class="inputcode">
                            <div class="iconantimat"><i class="fas fa-eraser"></i></div>
                            <input type="text" class="form-control" name="phone">
                        </div><!-- inputcode -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end value 0 -->
        <!-- ------------------------------ -->
        <!-- form for 1 value  -->
        <div class="col-6" id="type1" style="display:none">
            <div class="container text-center mb-2">
                <div class="row">
                    <div class="col">
                        <label> اسم المورد <span style="color:#040202">*</span> </label>
                        <div class="inputcode">
                            <div class="iconantimat"><i class="fas fa-eraser"></i></div>
                            <select class="form-control" name="supplier_id">
                                <option disabled selected>اختر المورد </option>
                                @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div><!-- inputcode -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end value 1 -->
        <!-- ------------------------------ -->
        <!-- form for 2 value  -->
        <div class="col-6" id="type2" style="display:none">
            <div class="container text-center mb-2">
                <div class="row">
                    <div class="col">
                        <label> اسم الموظف <span style="color:#040202">*</span> </label>
                        <div class="inputcode">
                            <div class="iconantimat"><i class="fas fa-eraser"></i></div>
                            <select class="form-control" name="employee_id">
                                <option disabled selected> اختر الموظف </option>
                                @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div><!-- inputcode -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end value 1 -->

        <div class="loppoo " style="background-color: gray">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <table class="table AddTable" id="AddTable">
                            <thead class="thead-dark">
                                <tr>

                                    <th scope="col" class="text-center">الصنف</th>
                                    <th scope="col" class="text-center">الكميه</th>
                                    <th scope="col" class="text-center">الكميه بالصافى</th>
                                    <th scope="col" class="text-center"> الوزن </th>
                                    <th scope="col" class="text-center"> السعر</th>
                                    <th scope="col" class="text-center"> الاجمالى </th>
                                    <th scope="col" class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody class="orderItem">
                                <tr>
                                    <td class="text-center col-4">
                                        <div class="inputcode">
                                            <div class="iconantimat"><i class="fas fa-eraser"></i></div>
                                            <select class="form-control" name="product_id[]" id="product">
                                                <option disabled selected>اخترالصنف </option>
                                                @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}

                                                </option>

                                                @endforeach
                                            </select>
                                        </div><!-- inputcode -->
                                    </td>

                                    <td class="text-center">
                                        <input type="text" name="quantity[]" class="form-control quantity" required>
                                    </td>
                                    <td class="text-center">

                                        <input type="text" name="netQty[]" class="form-control" required>

                                    </td>
                                    <td class="text-center">

                                        <input type="text" name="wieght[]" class="form-control" required>

                                    </td>
                                    <td class="text-center">
                                        <input type="text" name="price[]" class="form-control price" required>
                                    </td class="text-center">
                                    <td>
                                        <input type="text" name="total[]" class="form-control total" readonly>
                                    </td>
                                    <td><button type="button" class="btn btn-success" id="add">+</button></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-12 form-group">
            <label> الاجمالي<span style="color:#040202">*</span> </label>
            <div class="inputcode">
                <div class="iconantimat"><i class="fas fa-eraser"></i></div>
                <input type="text" class="form-control" name="sub_total" readonly>
            </div>
        </div>
        <div class="col-md-3 col-12 form-group ">
            <label>   خدمه الدليفرى <span style="color:#040202;">*</span></label>
            <div class="inputcode">
                <div class="iconantimat"> <i class="fas fa-eraser"></i></div>
                <input type="text" class="form-control" name="delivery_cost">
            </div>
        </div>
        <div class="col-md-3 col-12 form-group ">
            <label> الخصم<span style="color:#040202">*</span></label>
            <div class="inputcode">
                <div class="iconantimat"><i class="fas fa-user"></i></div>
                <input type="text" name="discount" class="form-control discount" >
            </div>
        </div>

        <div class="col-md-3 col-12 form-group">
            <label> المطلوب سداده <span style="color:#040202">*</span></label>
            <div class="inputcode">
                <div class="iconantimat"><i class="fas fa-flask"></i></div>
                <input type="text" name="total_price" class="form-control" readonly>
            </div>
        </div>
        <div class="col-md-12 col-12 form-group px-0 ">
            <button type="submit" class="btn btn-info submit" style="font-size: 20px;">حفظ</button>
        </div>
    </div><!-- row -->
</form>

@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    function changtype() {
        var x = document.getElementById('type').value;
        if (x == 0) {
            document.getElementById("type0").style.display = "block";
            document.getElementById("type1").style.display = "none";
            document.getElementById("type2").style.display = "none";
        } else if (x == 1) {
            document.getElementById("type0").style.display = "none";
            document.getElementById("type2").style.display = "none";
            document.getElementById("type1").style.display = "block";
        } else if (x == 2) {
            document.getElementById("type0").style.display = "none";
            document.getElementById("type1").style.display = "none";
            document.getElementById("type2").style.display = "block";
        } else {
            // document.getElementById("type1").style.display = "none";
        }
    }
</script>

<script>
    $(document).ready(function() {
        $("#add").click(function() {
            var html = ' <tr>'
            html +=
                ' <td class = "text-center col-4"><div class="inputcode"><div class="iconantimat"><i class="fas fa-eraser"></i></div><select class="form-control" name="product_id[]" id="product"><option disabled selected>اخترالصنف </option> @foreach ($products as $product)<option value="{{ $product->id }}">{{ $product->name }} </option> @endforeach</select></div></td>';
            html +=
                '  <td class = "text-center"><input type="text" name="quantity[]" class="form-control quantity" required></td>';
            html +=
                '  <td class = "text-center"><input type="text" name="netQty[]" class="form-control" required></td>';
            html +=
                '  <td class = "text-center"><input type="text" name="wieght[]" class="form-control" required></td>';
            html +=
                '  <td class = "text-center"><input type="text" name="price[]" class="form-control price" required></td>';
            html +=
                '  <td class = "text-center"><input type="text" name="total[]" class="form-control total" required></td>';
            html += ' <td><button type="button" class="btn btn-danger" id="remove">X</button></td>';
            html += '</tr>';
            $('.AddTable').append(html);
        });
        $('#AddTable').on('click', '#remove', function() {
            $(this).closest('tr').remove();
        });
    });
</script>

<script>
    function sum() {
        var sum = 0;
        //iterate through each textboxes and add the values
        $(".total").each(function() {
            //add only if the value is number
            if (!isNaN(this.value) && this.value.length != 0) {
                sum += parseFloat(this.value);
            }
        });
        $('input[name="sub_total"]').val(sum);
        $('input[name="total_price"]').val(sum);
        $('input[name="discount"]').keyup(function() {
            var discount = $('input[name="discount"]').val();
            service = parseFloat($('input[name="delivery_cost"]').val());
            $('input[name="total_price"]').val(sum + service - discount);
        });
    }
    $('table').delegate('.price, .quantity', 'keyup', function() {
        var tr = $(this).parent().parent();
        var price = tr.find('.price').val();
        var quantity = tr.find('.quantity').val();
        var amount = price * quantity;
        tr.find('.total').val(amount);
        sum();
    });
</script>

@endsection