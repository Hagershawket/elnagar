<div class="sidebar" id="sidebar">
  <div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
      <div id="sidebar-menu" class="sidebar-menu">
        <ul>
          <li class="active">
            <a href="{{route('home')}}"> الرئيسية</a>
          </li>

          <li class="submenu">
            <a href="#" ><i class="fa fa-laptop" aria-hidden="true"></i> <span> الموارد البشرية</span> <span class="menu-arrow"></span></a>          
                <ul class="list-unstyled" style="display: none;">
                  <li><a href="{{ route('employees.index') }}">  قائمة الموظفين </a></li>
                  <li><a href="{{ route('attendances.index') }}">حضور وانصراف</a></li>
                  <li><a href="{{ route('holidays.index') }}"> طلبات الاجازة</a></li>
                  <li><a href="{{ route('discountBonus.index') }}"> الخصومات والمكافأت</a></li>
                  <li><a href="{{ route('employeeReports') }}"> تقارير</a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="#" ><i class="fa fa-laptop" aria-hidden="true"></i> <span>موردين </span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled" style="display: none;">
              <li><a class="" href="{{route('suppliers.index')}}">اضافة مورد </a></li>
              <li><a class="" href="{{route('payment_suppliers.index')}}">سداد مورد </a></li>
              {{-- <li><a class="" href="{{route('maintenance') }}">كشف حساب مورد </a></li> --}}
              <li><a class="" href="{{route('summary')}}">تقاير حساب موردين </a></li>
              <li><a href="" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#supplierModal">كشف حساب مورد</a></li>
           
            </ul>
          </li>
          <li class="submenu">
            <a href="#" ><i class="fa fa-laptop" aria-hidden="true"></i> <span>مشتريات  </span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled" style="display: none;">
              <li><a class="" href="{{route('purchase-warehouse.index') }}"> فاتورة مستودع</a></li>
              <li><a class="" href="{{route('purchases.index')}}"> فاتورة سمك</a></li>
              <li><a class="" href="{{route('return-warehouse.index') }}">مرتجع مستودع </a></li>
              <li><a class="" href="{{route('returns.index')}}">مرتجع سمك </a></li>
           
            </ul>
          </li>
          <li class="submenu">
            <a href="#" ><i class="fa fa-laptop" aria-hidden="true"></i> <span>الفروع </span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled" style="display: none;">
              <li><a class="" href="{{route('branches.index')}}">اضافة فرع </a></li>
              <li><a class="" href="{{route('maintenance') }}">سداد ايجارات </a></li>
           
            </ul>
          </li>

          <li class="submenu">
            <a href="#"><i class="fa fa-columns" aria-hidden="true"></i> <span> الاعدادات</span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled" style="display: none;">
              <li><a href="{{route('setting.general')}}"> الاعدادات الرئيسية</a></li>
              <li><a href="{{route('products.index')}}"> الاصناف</a></li>
              <li><a href="{{route('currencies.index')}}"> العملات</a></li>
              <li><a href="{{route('countries.index')}}"> الدول</a></li>
              <li><a href="{{route('payment_methods.index')}}"> طرق الدفع</a></li>
              <li><a href="{{route('units.index')}}"> الوحدات</a></li>
              <li><a href="{{route('Transports.index') }}">وسائل النقل </a></li>        
              <li><a href="{{route('main_expenses.index') }}">مصروفات</a></li>
              <li><a href="{{route('maintenance') }}">صلاحيات</a></li>
              <li><a href="{{route('notification_categories.index')}}"> فئات الاشعارات</a></li>
              <li><a href="{{route('notification_items.index')}}"> الاشعارات</a></li>
              <li><a href="{{ route('media.index')}}"> فيديوهات </a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="#"><i class="fa fa-rocket" aria-hidden="true"></i> <span>المستودع  </span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled" style="display: none;">
              <li><a href="{{ route('products.index')}}"> الاصناف</a></li>
              <li><a href="{{ route('warehouses.index') }}">اضافة مستودع </a></li>
              <li><a href="" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#warehouseDataModal">بيانات المستودع </a></li>
              <li><a href="{{ route('exports.index') }}"> المنصرف من المستودع </a></li>
              <li><a href="" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#warehouseModal">تقرير المستودع </a></li>             
            </ul>
          </li>
          <li class="submenu">
            <a href="#"><i class="fa fa-rocket" aria-hidden="true"></i> <span>المصنع  </span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled" style="display: none;">
              <li><a href="{{ route('warehouses.index') }}">جرد المصنع </a></li>
              <li><a href="{{ route('productions.create') }}">تصنيع </a></li>
              <li><a href="{{ route('maintenance') }}"> تقرير المصنع </a></li>               
            </ul>
          </li>
          <li class="submenu">
            <a href="#"><i class="fa fa-rocket" aria-hidden="true"></i> <span> الحسابات العامة </span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled" style="display: none;">
              <li class="submenu"><a href="#"> دليل الحسابات  <span class="menu-arrow"></span> </a>
                <ul class="list-unstyled" style="display: none;">
                  <li class="submenu"><a href="#"> الأصول <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled" style="display: none;">
                      <li><a href="#"> الاصول طويلة الاجل </a></li>
                      <li><a href="#"> الاصول الثابتة </a></li>
                    </ul>
                  </li>
                  <li class="submenu"><a href="#"> الخصوم <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                      <li><a href="#"> حقوق الملكية </a></li>
                      <li><a href="#"> الالتزمات المتداولة </a></li>
                    </ul>
                  </li>
                  <li class="submenu"><a href="#"> المصروفات <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                      <li><a href="#"> خامات ومواد وقطع غيار </a></li>
                      <li><a href="#"> اجور </a></li>
                      <li><a href="#"> مصروفات </a></li>
                      <li><a href="#"> مشتريات بضائع بغرض البيع </a></li>
                      <li><a href="#"> اعباء وخسائر </a></li>
                      <li><a href="#"> تكاليف انتاج </a></li>
                      <li><a href="#"> التكاليف التسويقية </a></li>
                      <li><a href="#"> المصروفات الادارية والتمويلية </a></li>
                    </ul>
                  </li>  
                  <li class="submenu"><a href="#"> الايرادات <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled" style="display: none;">
                      <li><a href="#"> ايردات النشاط   </a></li>
                      <li><a href="#"> منح واعانات </a></li>
                      <li><a href="#"> ايرادات استثمارية وفوائد </a></li>
                      <li><a href="#"> ايرادات وارباح وخسائر  </a></li>
                    </ul>
                  </li>                            
                </ul>
              </li>
              <li><a href="{{ route('maintenance') }}">الخزينة الرئيسية </a></li>
              <li><a href="{{ route('partners.index') }}"> الشركاء </a></li> 
              <li><a href="{{ route('investors.index') }}"> المستثمرين </a></li>   
              <li><a href="{{ route('loans.index') }}">القروض</a></li>  
              <li><a href="{{ route('installments.index') }}">الاقساط</a></li>    
              <li><a href="{{ route('bank_accounts.index') }}"> حسابات البنوك</a></li>  
              <li><a href="{{ route('main_expenses.index') }}">اقسام المصروفات</a></li>
              <li><a href="{{ route('report') }}">تسجيل مصروف  </a></li>  
              <li><a href="{{ route('maintenance') }}">التقارير  </a></li>
            </ul>
          </li>
          <li class="submenu">
            <a href="#"><i class="fa fa-rocket" aria-hidden="true"></i> <span>  المزرعة </span> <span class="menu-arrow"></span></a>
            <ul class="list-unstyled" style="display: none;">
              <li><a href="{{ route('maintenance') }}"> بيانات اساسية </a></li>
              <li><a href="{{ route('maintenance') }}">اضافة زريعة </a></li>
              <li><a href="{{ route('maintenance') }}">اضافة وجبة  </a></li>
              <li><a href="{{ route('maintenance') }}">مصروفات  </a></li>
              <li><a href="{{ route('maintenance') }}">مبيعات  </a></li>
              <li><a href="{{ route('maintenance') }}"> تقارير </a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>



  <!-- Select Supplier Modal body -->
<div class="modal fade" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <?php $suppliers = App\Models\Supplier::active()->get(); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اختر اسم المورد</h5>
      </div>
      <form method="post" action="{{route('selectSupplier')}}">
        @csrf
        <div class="modal-body">
          <label for="inputState"><strong>اسم المورد </strong></label>
          <select  name="supplier" class="form-control supplier" required>
          <option value="">اختر اسم المورد</option>
          @foreach ($suppliers as $supplier)
              <option value="{{$supplier->id}}">{{$supplier->name}}</option>
          @endforeach
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">غلق</button>
          <button type="submit" class="btn btn-info">اختر</button>
        </div>
      </form>
    </div>
  </div>
</div>

 <!-- Select Warehouse Modal body -->
 <div class="modal fade" id="warehouseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <?php $warehouses = App\Models\Warehouse::active()->get(); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اختر اسم المستودع</h5>
      </div>
      <form method="post" action="{{route('selectwarehouse')}}">
        @csrf
        <div class="modal-body">
          <label for="inputState"><strong>اسم المستودع </strong></label>
          <select  name="warehouse_id" class="form-control warehouse" required>
          <option value="">اختر اسم المستودع</option>
          @foreach ($warehouses as $warehouse)
              <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
          @endforeach
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">غلق</button>
          <button type="submit" class="btn btn-info">اختر</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Select Warehouse Modal body -->
<div class="modal fade" id="warehouseDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <?php $warehouses = App\Models\Warehouse::active()->get(); ?>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اختر اسم المستودع</h5>
      </div>
      <form method="post" action="{{route('warehouseData')}}">
        @csrf
        <div class="modal-body">
          <label for="inputState"><strong>اسم المستودع </strong></label>
          <select  name="warehouse_id" class="form-control warehouse" required>
          <option value="">اختر اسم المستودع</option>
          @foreach ($warehouses as $warehouse)
              <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
          @endforeach
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">غلق</button>
          <button type="submit" class="btn btn-info">اختر</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Select Purchase for Production Modal body -->
<div class="modal fade" id="productionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اختر رقم الفاتورة</h5>
      </div>
      <?php $purchases = App\Models\Purchase::active()->get()?>
      <form method="post" action="{{route('selectPurchase')}}">
        @csrf
        <div class="modal-body">
          <label for="inputState"><strong>رقم الفاتورة </strong></label>
          <select  name="purchase_id" class="form-control supplier">
          <option value="">اختر رقم الفاتورة</option>
          @foreach ($purchases as $purchase)
              <option value="{{$purchase->id}}">{{$purchase->id}}</option>
          @endforeach
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">غلق</button>
          <button type="submit" class="btn btn-info">اختر</button>
        </div>
      </form>
    </div>
  </div>
</div>