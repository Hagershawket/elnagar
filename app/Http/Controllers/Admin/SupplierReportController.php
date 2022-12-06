<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\Returns;


class SupplierReportController extends Controller
{
    public function index()
    {
        $paymentsSuppliers = Payment::get();
        $purchases = Purchase::get();
        $returns = Returns::get();
        return view('admin.supplierReports.index',compact(['paymentsSuppliers','purchases','returns']));
    }

    public function supplierRebort($id)
    {
        $idSupplier =  $id;
        $paymentsSuppliers = Payment::where('supplier_id',$id)->get();
        $purchases = Purchase::where('supplier_id',$id)->get();
        $returns = Returns::where('supplier_id',$id)->get();
        return view('admin.supplierReports.supplierReport',compact(['paymentsSuppliers','idSupplier',
        'purchases','returns']));
    }

    public function selectSupplier(Request $request)
    {
        $idSupplier = $request->supplier;
        $supplier = Supplier::where('id',$idSupplier)->first();
        $paymentsSuppliers = Payment::where('supplier_id',$idSupplier)->get();
        $purchases = Purchase::where('supplier_id',$idSupplier)->get();
        $returns = Returns::where('supplier_id',$idSupplier)->get();
        $TotalPurchase = Purchase::where('supplier_id',$idSupplier)->sum('grand_total');
        $TotalPayment = Payment::where('supplier_id',$idSupplier)->sum('amount');
        $TotalReturns = Returns::where('supplier_id',$idSupplier)->sum('grand_total');

        return view('admin.supplierReports.supplierReport',compact(['supplier', 'paymentsSuppliers','idSupplier',
        'purchases','returns','TotalPurchase','TotalPayment','TotalReturns']));
    }

    public function filterSupplier(Request $request)
    {
        $paymentsSuppliers = Payment::where('supplier_id',$request->supplierName)->whereBetween('date',[$request->startDate,$request->endDate])->get();
        $purchases = Purchase::where('supplier_id',$request->supplierName)->whereBetween('date',[$request->startDate,$request->endDate])->get();
        $returns = Returns::where('supplier_id',$request->supplierName)->whereBetween('date',[$request->startDate,$request->endDate])->get();
        $id = $request->paymentHidden;
        return view('admin.supplierReports.index',compact(['paymentsSuppliers','id','purchases','returns']));
    }

    public function supplierReportByDate(Request $request)
    {
        $paymentsSuppliers = Payment::where('supplier_id',$request->supplierId)->
                    whereBetween('date',[$request->startDate,$request->endDate])->get();
        $purchases = Purchase::where('supplier_id',$request->supplierId)->
                    whereBetween('date',[$request->startDate,$request->endDate])->get();
        $returns = Returns::where('supplier_id',$request->supplierId)->
                    whereBetween('date',[$request->startDate,$request->endDate])->get();            
        $idSupplier = $request->supplierId;

        $TotalPurchase = Purchase::where('supplier_id',$idSupplier)->
                    whereBetween('date',[$request->startDate,$request->endDate])->sum('grand_total'); 

        $TotalPayment = Payment::where('supplier_id',$idSupplier)->
                    whereBetween('date',[$request->startDate,$request->endDate])->sum('amount');

        $TotalReturns = Returns::where('supplier_id',$idSupplier)->sum('grand_total');
        return view('admin.supplierReports.supplierReport',compact(['paymentsSuppliers','idSupplier',
        'purchases','returns','TotalPurchase','TotalPayment','TotalReturns']));
    }

    public function summary()
    {
        $suppliers = Supplier::get();
        return view('admin.supplierReports.summary',compact('suppliers'));
    }

    
}
