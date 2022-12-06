
@section('nnn')
    <div class="grouponr">

        <div class="dainfo">
            <h3>تيست</h3>

        </div>
        <form method="post" action="{{ route('makeOrder') }}">
            @csrf
            <div class="row">
                <div class="col-md-4 col-12 form-group px-0">
                    <label> الاجمالي<span style="color:#040202">*</span> </label>
                    <div class="inputcode">
                        <div class="iconantimat"><i class="fas fa-eraser"></i></div>
                        <input type="text" class="form-control" required  name="sub_total"
                            value="">
                    </div>
                </div>
                <div class="col-md-4 col-12 form-group">
                    <label> الخصم<span style="color:#040202">*</span></label>
                    <div class="inputcode">
                        <div class="iconantimat"><i class="fas fa-user"></i></div>
                        <input type="text" name="discount" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4 col-12 form-group px-0">
                    <label> الصافي<span style="color:#040202">*</span></label>
                    <div class="inputcode">
                        <div class="iconantimat"><i class="fas fa-flask"></i></div>
                        <input type="text" name="total_price" class="form-control" required >
                    </div>
                </div>

                <!-- end head -->
                <div class="col-md-4 col-12 form-group px-0">
                    <label>نوع العميل <span style="color:#040202">*</span></label>
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
                <div class="col-8" id="type0" style="display:none">
                    <div class="container text-center mb-2">
                        <div class="row">

                            <div class="col">
                                <label> اسم العميل <span style="color:#040202">*</span> </label>
                                <div class="inputcode">
                                    <div class="iconantimat"><i class="fas fa-eraser"></i></div>
                                    <input type="text" class="form-control">
                                </div><!-- inputcode -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end value 0 -->
                <!-- ------------------------------ -->
                <!-- form for 1 value  -->
                <div class="col-8" id="type1" style="display:none">
                    <div class="container text-center mb-2">
                        <div class="row">
                            <div class="col">
                                <label> اسم المورد <span style="color:#040202">*</span> </label>
                                <div class="inputcode">
                                    <div class="iconantimat"><i class="fas fa-eraser"></i></div>
                                    <select class="form-control">
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
                <div class="col-8" id="type2" style="display:none">
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
                
                <div class="col-md-12 col-12 form-group px-0 M-2">
                    <button type="submit" class="btn btn-info">حفظ</button>
                </div>
            </div><!-- row -->
        </form>

        <div class="loppoo">
            <h3>مجموعة الاصناف</h3>
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <button type="button" class="btn btn-secondary">صنف الاول</button>
                <button type="button" class="btn btn-secondary">صنف الاول</button>
                <button type="button" class="btn btn-secondary">صنف الاول</button>
                <button type="button" class="btn btn-secondary">صنف الاول</button>
                <button type="button" class="btn btn-secondary">صنف الاول</button>
                <button type="button" class="btn btn-secondary">صنف الاول</button>
                <button type="button" class="btn btn-secondary">صنف الاول</button>
                <button type="button" class="btn btn-secondary">صنف الاول</button>
                <button type="button" class="btn btn-secondary">صنف الاول</button>
            </div>

        </div>
    </div><!-- grouponr -->
    <div class="supliersoff">
        <div class="row">
            <div class="col-sm-12 px-0">
                <table id="table_id" class="display table table-striped table-bordered table-sm">
                    <thead>
                        <tr>
                            <th class="th-sm">م</th>
                            <th class="th-sm">الصنف</th>
                            <th class="th-sm">رقم البوكس</th>
                            <th class="th-sm">الوحدة</th>
                            <th class="th-sm">الوزن</th>
                            <th class="th-sm">الاجمالي</th>
                            <th class="th-sm">الصافي</th>
                            <th class="th-sm">السعر</th>
                            <th class="th-sm">القيمة</th>
                            <th class="th-sm">حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><i class="fas fa-trash-alt"></i></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- supliers counteriesoff -->
@endsection
@section('scripts')

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


@endsection
