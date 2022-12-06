@extends('resturant.master')
@section('title','الرئيسية')
@section('css')
    
@endsection
@section('header_title','الرئيسية')
@section('content')

    <div class="kolbutton">
        <ul class="nav nav-tabs nav-tabs-bottom">
            <li class="">
                <a href="#product_desc" data-toggle="tab">
                <div class="dash-widget55 ">
                    <span class="dash-widget-icon bg-success">
                        <i class="fas fa-motorcycle"></i>
                    </span>
                    <h3>دليفري</h3>
                </div>
                </a>
            </li>
            <li>
                <a href="#product_reviews" data-toggle="tab">
                <div class="dash-widget55">
                    <span class="dash-widget-icon bg-success">
                        <i class="fas fa-hot-tub"></i>
                    </span>
                    <h3> صالة</h3>
                </div>
                </a>
            </li>
            <li>
                <a href="#product_sheet" data-toggle="tab">
                <div class="dash-widget55">
                    <span class="dash-widget-icon bg-success">
                        <i class="fas fa-glass-cheers"></i>
                    </span>
                    <h3> تيك  اواي</h3>
                </div>
                </a>
            </li>
        </ul>
    <div class="tab-content">
      <div class="tab-pane " id="product_desc">
        <form>
          <div class="row">
            <div class="col-md-4 col-12 form-group px-0">
              <label>العميل <span style="color:#040202">*</span></label>
              <div class="inputcode">
                <div class="iconantimat"><i class="fas fa-user"></i></div>
                <select name="contributor_type" class="form-control" required="" id="contributor_type" onchange="return types(this.value)">
                  <option value="0">نقدي / فيزا</option>
                  <option value="1">مورد</option>
                  <option value="2">موظف</option>
                  <option value="3">عروض</option>
                  <option value="4">خصومات</option>
                  <option value="5">مجاني</option>
                  <option value="6">خصومات خاصة</option>
                  <option value="7">مسابقات</option>
                  <option value="8">اجل</option>
                  <option value="9">موجل</option>
                  <option value="10"></option>
                </select>
              </div>
            </div>
          
          </div><!-- row -->
        </form>
        <div class="supliersoff">
          <div class="row">
            <div class="col-sm-12 px-0">
              <table  id="table_id" class="display table table-striped table-bordered table-sm">
                <thead>
                  <tr>
                    <th class="th-sm">كود الموظف</th>
                    <th class="th-sm">اسم الموظف</th>
                    <th class="th-sm">الرقم القومي</th>
                    <th class="th-sm">الرقم التاميني</th>
                    <th class="th-sm">الوظيفة </th>
                    <th class="th-sm">الدولة</th>
                    <th class="th-sm">رقم تلفون</th>
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
                  </tr>
                  <tr>
                    <td>2</td>
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

      </div>
      <div class="tab-pane" id="product_reviews">
            <form>
          <div class="row">
            <div class="col-md-4 col-12 form-group px-0">
              <label>العميل <span style="color:#040202">*</span></label>
              <div class="inputcode">
                <div class="iconantimat"><i class="fas fa-user"></i></div>
                <select name="contributor_type" class="form-control" required="" id="contributor_type" onchange="return types(this.value)">
                  <option value="0">نقدي / فيزا</option>
                  <option value="1">مورد</option>
                  <option value="2">موظف</option>
                  <option value="3">عروض</option>
                  <option value="4">خصومات</option>
                  <option value="5">مجاني</option>
                  <option value="6">خصومات خاصة</option>
                  <option value="7">مسابقات</option>
                  <option value="8">اجل</option>
                  <option value="9">موجل</option>
                  <option value="10"></option>
                </select>
              </div>
            </div>
          
          </div><!-- row -->
        </form>
        <div class="supliersoff">
          <div class="row">
            <div class="col-sm-12 px-0">
              <table  id="table_id" class="display table table-striped table-bordered table-sm">
                <thead>
                  <tr>
                    <th class="th-sm">كود الموظف</th>
                    <th class="th-sm">اسم الموظف</th>
                    <th class="th-sm">الرقم القومي</th>
                    <th class="th-sm">الرقم التاميني</th>
                    <th class="th-sm">الوظيفة </th>
                    <th class="th-sm">الدولة</th>
                    <th class="th-sm">رقم تلفون</th>
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
                  </tr>
                  <tr>
                    <td>2</td>
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

      </div>
      <div class="tab-pane" id="product_sheet">
            <form>
          <div class="row">
            <div class="col-md-4 col-12 form-group px-0">
              <label>العميل <span style="color:#040202">*</span></label>
              <div class="inputcode">
                <div class="iconantimat"><i class="fas fa-user"></i></div>
                <select name="contributor_type" class="form-control" required="" id="contributor_type" onchange="return types(this.value)">
                  <option value="0">نقدي / فيزا</option>
                  <option value="1">مورد</option>
                  <option value="2">موظف</option>
                  <option value="3">عروض</option>
                  <option value="4">خصومات</option>
                  <option value="5">مجاني</option>
                  <option value="6">خصومات خاصة</option>
                  <option value="7">مسابقات</option>
                  <option value="8">اجل</option>
                  <option value="9">موجل</option>
                  <option value="10"></option>
                </select>
              </div>
            </div>
          
          </div><!-- row -->
        </form>
        <div class="supliersoff">
          <div class="row">
            <div class="col-sm-12 px-0">
              <table  id="table_id" class="display table table-striped table-bordered table-sm">
                <thead>
                  <tr>
                    <th class="th-sm">كود الموظف</th>
                    <th class="th-sm">اسم الموظف</th>
                    <th class="th-sm">الرقم القومي</th>
                    <th class="th-sm">الرقم التاميني</th>
                    <th class="th-sm">الوظيفة </th>
                    <th class="th-sm">الدولة</th>
                    <th class="th-sm">رقم تلفون</th>
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
                  </tr>
                  <tr>
                    <td>2</td>
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
      
      </div>

    </div>
  </div>
@endsection