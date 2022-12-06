<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\BankAccountController;
use App\Http\Controllers\Admin\NotificationCategoryController;
use App\Http\Controllers\Admin\NotificationItemController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\PurchaseWarehouseController;
use App\Http\Controllers\Admin\ReturnController;
use App\Http\Controllers\Admin\ReturnWarehouseController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\HolidayController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\CurencyController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplierReportController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\Admin\DiscountBonusController;
use App\Http\Controllers\Admin\UniformController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ProductionController;
use App\Http\Controllers\Admin\InvestorController;
use App\Http\Controllers\Admin\LoanController;
use App\Http\Controllers\Admin\TransportController;
use App\Http\Controllers\Admin\LoanInstallmentController;
use App\Http\Controllers\Admin\MainExpensesController;
use App\Http\Controllers\Admin\SubExpensesController;
use App\Http\Controllers\Admin\ExpenseRecordingController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\WarehouseActionController;
use App\Http\Controllers\Admin\InstallmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    Route::get('/login'                                  , [LoginController::class,'showAdminLoginForm'])->name('login');
    Route::post('/login/admin'                           , [LoginController::class,'adminLogin'])->name('adminLogin');
    Route::group(['middleware'=>'auth:web'],function (){
    Route::get('Logout'                                  , [LoginController::class,'logout'])->name('Logout');
    Route::get('/'                                       , [HomeController::class, 'index'])->name('home');
    Route::get('maintenance'                             , [HomeController::class, 'maintenance'])->name('maintenance');
    Route::get('notifications'                           , [HomeController::class, 'notifications'])->name('notifications.view');
    Route::get('/read/{id}'                              , [HomeController::class,'markRead'])->name('notifications.read');
    Route::get('/read-all'                               , [HomeController::class,'markAllRead'])->name('notifications.readAll');
    Route::resource('/suppliers'                         , SupplierController::class);
    Route::post('supplier/import'                        , [SupplierController::class, 'import'])->name('supplier.import');
    Route::get('suppliers/stop/{id}/{status}'            , [SupplierController::class,'stop'])->name('suppliers.stop');
    Route::get('employees/genpass', [EmployeeController::class, 'generatePassword']);
    Route::resource('/employees'                         , EmployeeController::class);
    Route::get('employees/stop/{id}/{status}'            , [EmployeeController::class,'stop'])->name('employees.stop');
    Route::post('employees/edit/device{id}'              , [EmployeeController::class,'edit_device'])->name('employees.edit.device');
    Route::resource('/employees'                         , EmployeeController::class);
    Route::post('employees/send/notifications{id}'       , [EmployeeController::class,'send_notifications'])->name('send_notifications');
    Route::post('employees/send/notifications/all'       , [EmployeeController::class,'send_notifications_all'])->name('send_notifications_all');
    Route::resource('/countries'                         , CountryController::class);
    Route::resource('/payment_methods'                   , PaymentMethodController::class);
    Route::resource('/notification_categories'           , NotificationCategoryController::class);
    Route::resource('/notification_items'                , NotificationItemController::class);
    Route::resource('/purchases'                         , PurchaseController::class);
    Route::resource('/purchase-warehouse'                , PurchaseWarehouseController::class);
    Route::resource('/returns'                           , ReturnController::class);
    Route::resource('/return-warehouse'                  , ReturnWarehouseController::class);
    Route::resource('/payment_suppliers'                 , PaymentController::class);
    Route::resource('/units'                             , UnitController::class);
    Route::resource('/currencies'                        , CurencyController::class);
    Route::resource('/products'                          , ProductController::class);
    Route::post('/get-product-unit'                      , [ProductController::class,'getProductUnit'])->name('getProductUnit');
    Route::resource('/productions'                       , ProductionController::class);
    Route::resource('/exports'                           , ExportController::class);
    Route::post('/exports/store'                         , [ExportController::class,'store'])->name('exports.store');
    Route::post('warehouse/products'                     , [ExportController::class,'warehouse_products'])->name('warehouse.products');
    Route::post('dueAmount'                              , [PaymentController::class,'dueAmount'])->name('dueAmount');
    Route::post('supplierAccount'                        , [PaymentController::class,'supplierAccount'])->name('supplierAccount');
    Route::post('/selectInvoice'                         , [ReturnController::class,'selectInvoice'])->name('selectInvoice');
    Route::post('/selectPurchase'                        , [ProductionController::class,'selectPurchase'])->name('selectPurchase');
    Route::post('/selectPurchaseWarehouse'               , [ReturnWarehouseController::class,'selectPurchaseWarehouse'])->name('selectPurchaseWarehouse');
    Route::post('purchaseDetails'                        , [PurchaseController::class,'purchaseDetails'])->name('purchaseDetails');
    Route::post('purchase_products'                      , [ProductionController::class,'purchase_products'])->name('purchase_products');
    Route::post('purchases/purchase-data'                , [PurchaseController::class,'purchaseData']);
    Route::get('purchases/product_purchase/{id}'         , [PurchaseController::class,'productPurchaseData']);
    Route::post('purchaseWarehouse/purchase-data'        , [PurchaseWarehouseController::class,'purchaseData']);
    Route::get('purchaseWarehouse/product_purchase/{id}' , [PurchaseWarehouseController::class,'productPurchaseData']);
    
    //************************************** Warehouse Route ***********************************************
    Route::resource('/warehouses'                        , WarehouseController::class);
    Route::post('/selectwarehouse'                       , [WarehouseController::class,'selectwarehouse'])->name('selectwarehouse');
    Route::post('/warehouse-data'                         , [WarehouseController::class,'warehouseData'])->name('warehouseData');
    //************************************** Branch Route ***********************************************
    Route::resource('/branches'                          , BranchController::class);
    Route::get('branches/stop/{id}/{status}'             , [BranchController::class,'stop'])->name('branches.stop');
    //************************************** Holidays Route *********************************************
    Route::resource('/holidays'                          , HolidayController::class);
    Route::post('employeeName'                           , [HolidayController::class,'employeeName'])->name('employeeName');
    Route::get('holidays/approve/{id}/{status}'          , [HolidayController::class,'approve'])->name('holidays.approve'); 
    Route::get('/holidayReport/{id}'                     , [ReportController::class,'holidayReport'])->name('holidayReport');
    Route::post('/holidayReportByDate/{id}'              , [ReportController::class,'holidayReportByDate'])->name('holidayReportByDate');  
    //************************************** HR Route ****************************************************
    Route::resource('/discountBonus'                     , DiscountBonusController::class);
    Route::resource('/attendances'                       , AttendanceController::class);
    Route::get('/employeeReports'                        , [ReportController::class,'index'])->name('employeeReports');
    Route::post('/employeeReportByDate'                  , [ReportController::class,'employeeReportByDate'])->name('employeeReportByDate');

    //************************************** Supplier Reports Route **************************************
    Route::get('/supplierReports'                        , [SupplierReportController::class,'index'])->name('supplierReports');
    Route::get('/reports/{id}'                           , [SupplierReportController::class,'supplierRebort'])->name('reports');
    Route::post('/selectSupplier'                        , [SupplierReportController::class,'selectSupplier'])->name('selectSupplier');
    Route::post('/filterSupplier'                        , [SupplierReportController::class,'filterSupplier'])->name('filterSupplier');
    Route::post('/supplierReportByDate'                  , [SupplierReportController::class,'supplierReportByDate'])->name('supplierReportByDate');
    Route::get('/summary'                                , [SupplierReportController::class,'summary'])->name('summary');

    //************************************** Bank Account Route ****************************************
    
    Route::resource('/bank_accounts'                    , BankAccountController::class);
    Route::post('/bank/{id}'                            , [BankAccountController::class,'plus'])->name('plus');
    Route::post('/bankminus/{id}'                       , [BankAccountController::class,'minus'])->name('minus');
    Route::get('/bank/{id}'                             , [BankAccountController::class,'all'])->name('all');
    //************************************** Partners Route ****************************************
    Route::resource('/partners'                         , PartnerController::class);
    Route::post('/partners/plus/{id}'                   , [PartnerController::class,'plus'])->name('partner_plus');
    Route::post('/partners/minus/{id}'                  , [PartnerController::class,'minus'])->name('partner_minus');
    //************************************** Investor Route ****************************************
    Route::resource('/investors'                        , InvestorController::class);
    Route::post('/investor/plus/{id}'                   , [InvestorController::class,'plus'])->name('investor_plus');
    Route::post('/investors/minus/{id}'                 , [InvestorController::class,'minus'])->name('investor_minus');
    //************************************** loans Route *******************************************
    Route::resource('/loans'                            , LoanController::class);
    Route::resource('/loan_installments'                , LoanInstallmentController::class);
    //************************************** Transports Route *******************************************
    Route::resource('/Transports'                       , TransportController::class);
    //************************************** Expenses Route *******************************************
    Route::resource('/main_expenses'                     , MainExpensesController::class);
    Route::resource('/sub_expenses'                      , SubExpensesController::class);
    Route::resource('/expense_recording'                 , ExpenseRecordingController::class);
    Route::get('/main/{id}'                              , [ExpenseRecordingController::class,'record'])->name('record');
    Route::get('/ExpensesReport'                         , [ExpenseRecordingController::class,'report'])->name('report');
    //************************************** Media Route *******************************************
    Route::resource('/media'                             , MediaController::class);
    //************************************** Media Route *******************************************
    Route::get('setting/general_setting'                 , [SettingController::class,'generalSetting'])->name('setting.general');
	Route::post('setting/general_setting_store'          , [SettingController::class, 'generalSettingStore'])->name('setting.generalStore');

    //************************************** Warehouse Action Route *******************************************
    Route::get('warehouse/product-card/{id}'             , [WarehouseActionController::class,'card'])->name('warehouse.productCard');
    //************************************** Installments Route ****************************************
    Route::resource('/installments'                      , InstallmentController::class);
    Route::post('/installment/plus'                      , [InstallmentController::class,'plus'])->name('installment_plus');
    Route::post('get/subcategories'                      , [InstallmentController::class,'getSubcategories'])->name('getSubcategories');
    Route::post('get/links'                              , [InstallmentController::class,'getLinks'])->name('getLinks');





});

