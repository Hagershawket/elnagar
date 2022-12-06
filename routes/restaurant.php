<?php

use App\Http\Controllers\Branch\MainController;
use App\Http\Controllers\Branch\ReceiptController;
use App\Http\Controllers\Branch\Cash\ExchangeController;


    Route::get('restaurant',function(){
        return view('resturant.splash');
        
    });

    Route::group(['middleware'=>'auth:web'],function (){
        Route::group(['prefix'=>'branshes'],function (){

            //************************************** Order Route *******************************************

            Route::get('receipt'                            ,[ReceiptController::class,'create'])->name('receipt.create');
            Route::post('receipt/store'                     ,[ReceiptController::class,'store'])->name('receipt.store');
            Route::post('receipt/confirm'                   ,[ReceiptController::class,'confirm'])->name('receipt.confirm');
            Route::post('receipt/delivery'                  ,[ReceiptController::class,'deliveryEmployee'])->name('receipt.delivery');
            Route::get('box/product-data/{id}'              ,[ReceiptController::class,'boxData']);
            Route::post('barcode/search'                    ,[ReceiptController::class,'barcodeSearch']);

            //************************************** selling Route *******************************************
            Route::get('selling'               ,[MainController::class,'selling'])->name('branches.selling');
            Route::get('delivery'              ,[MainController::class,'delivery'])->name('branches.delivery');
            Route::get('takeAway'              ,[MainController::class,'takeAway'])->name('branches.takeAway');
            Route::get('hall'                  ,[MainController::class,'hall'])->name('branches.hall');

            //************************************** Order Route *******************************************

      
            Route::post('makeOrdertakaway'             ,[MainController::class,'makeOrdertakaway'])->name('makeOrdertakaway');
            Route::post('makeOrderdelivary'            ,[MainController::class,'makeOrderdelivary'])->name('makeOrderdelivary');
            Route::post('makeOrderhall'                ,[MainController::class,'makeOrderhall'])->name('makeOrderhall');


            //************************************** Cash Route *******************************************
            Route::resource('/cashExchange'         , ExchangeController::class);
            Route::post('subcats'                   ,[MainController::class,'subcats'])->name('subcats');

              //************************************** Print Route *******************************************
            Route::get('/print/{id}'                                 ,[MainController::class,'printInvoice'])->name('print');
            Route::get('/get/{id}'                                 ,[MainController::class,'getprice']);
         
        });
        
    });