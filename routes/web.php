<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MedicineController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\ProductController; 
use App\Http\Controllers\Admin\CustomerController; 
use App\Http\Controllers\Admin\OrderController; 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Customer\ProductController as CustomerProductController;
use App\Http\Controllers\Customer\MedicineController as CustomerMedicineController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\Customer\InvoiceController as CustomerInvoiceController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Models\Medicine;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Frontend\MedicineController as FrontendMedicineController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;




Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// =========================
// ADMIN ROUTES
// =========================

Route::prefix('admin')
    ->middleware(['auth','admin'])
    ->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
    Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');
    Route::get('/categoies/{id}',[CategoryController::class,'delete'])->name('categories.delete');
    Route::get('/categories/{id}/edit',[CategoryController::class,'edit'])->name('categories.edit');
    Route::put('/categories/{id}',[CategoryController::class,'update'])->name('categories.update');
    Route::get('/search',[SearchController::class,'index'])->name('search');

// =========================
// Profile
// =========================

    Route::get('/admin/account-settings', function () {
    return view('admin.account-settings');
    })->name('admin.account.settings');

    
    Route::get('/change-password', function () {
    return view('admin.change-password');
    })->name('admin.password.change');

    Route::post(
    '/change-password',
    [AccountController::class, 'updatePassword']
    )->name('admin.password.update');

// =========================
// Medicine
// =========================
    Route::get('/medicines',[MedicineController::class,'index'])->name('medicines.index');
    Route::get('/medicines/create',[MedicineController::class,'create'])->name('medicines.create');
    Route::post('/medicines/store',[MedicineController::class,'store'])->name('medicines.store');
    Route::get('/medicines/{id}/edit',[MedicineController::class,'edit'])->name('medicines.edit');
    Route::put('/medicines/{id}',[MedicineController::class,'update'])->name('medicines.update');
    Route::delete('/medicines/{id}/delete',[MedicineController::class,'delete'])->name('medicines.delete');
    Route::get('/medicines/{id}',[MedicineController::class,'show'])->name('medicines.show');

    // Dashboard

    // Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

// =========================
// Product
// =========================

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// =========================
// Customers
// =========================
    Route::patch('/customers/{customer}/approve', [CustomerController::class, 'approve'])
    ->name('customers.approve');
 
    Route::patch('/customers/{customer}/reject', [CustomerController::class, 'reject'])
    ->name('customers.reject');

    Route::resource('customers', CustomerController::class);

    Route::get('/customers/{customer}/edit',[CustomerController::class, 'edit']
    )->name('customers.edit');

 // =========================
 // Orders
 // =========================
    
    Route::get('/orders', [OrderController::class, 'index'])
    ->name('admin.orders.index');
    
    Route::get('/orders/customer/{customer}', [OrderController::class, 'customerOrders'])
    ->name('admin.orders.customer');
    
    Route::get('/orders/{order}', [OrderController::class, 'show'])
    ->name('admin.orders.show');
    
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])
    ->name('admin.orders.update-status');

// =========================
// Invoice 
// =========================

    Route::get('/invoices', [InvoiceController::class, 'index'])
    ->name('admin.invoices.index');

    Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])
    ->name('admin.invoices.show');




});


// =========================
// CUSTOMER ROUTES
// =========================


Route::prefix('customer')
    ->middleware(['auth','customer'])
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('customer.dashboard');
        })->name('customer.dashboard');


        Route::get('/profile', function () {
            $customer = Auth::user()->customer;
            return view('customer.profile', compact('customer'));
        })->name('customer.profile');

        Route::get('/products', [CustomerProductController::class, 'index'])
        ->name('customer.products.index');

        Route::get('/products/{product}', [CustomerProductController::class, 'show'])
       ->name('customer.products.show');

        Route::get('/cart', [CartController::class, 'index'])
       ->name('customer.cart.index');

        Route::post('/cart/add/{product}', [CartController::class, 'add'])
       ->name('customer.cart.add');

        Route::patch('/cart/update/{key}', [CartController::class, 'update'])
      ->name('customer.cart.update');

        Route::delete('/cart/remove/{key}', [CartController::class, 'remove'])
      ->name('customer.cart.remove');

       //Medicine

       Route::get('/medicines', [CustomerMedicineController::class, 'index'])
      ->name('customer.medicines.index');

       Route::get('/medicines/{medicine}', [CustomerMedicineController::class, 'show'])
      ->name('customer.medicines.show');

      Route::post('/cart/add-medicine/{medicine}', [CartController::class, 'addMedicine'])
     ->name('customer.cart.add-medicine');

     //Order

     Route::get('/checkout', [CheckoutController::class, 'index'])
    ->name('customer.checkout.index');

    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])
    ->name('customer.checkout.place-order');

    Route::get('/orders', [CustomerOrderController::class, 'index'])
    ->name('customer.orders.index');

    Route::get('/orders/{order}', [CustomerOrderController::class, 'show'])
    ->name('customer.orders.show');

    Route::get('/customer/invoices', [CustomerInvoiceController::class, 'index'])
    ->name('customer.invoices.index');

    Route::get('/customer/invoices/{invoice}', [CustomerInvoiceController::class, 'show'])
    ->name('customer.invoices.show');




    });

    require __DIR__.'/auth.php';





    // FrontEnd Side

Route::view('/home', 'frontend.home')->name('frontend.home');

Route::get('/frontend/medicines', [FrontendMedicineController::class, 'index'])
    ->name('frontend.medicines');

Route::get('/frontend/medicines/{medicine}', [FrontendMedicineController::class, 'show'])
    ->name('frontend.medicine.show');

Route::get('/frontend/products', [FrontendProductController::class, 'index'])
    ->name('frontend.products');

Route::get('/frontend/products/{product}', [FrontendProductController::class, 'show'])
    ->name('frontend.products.show');

Route::view('/frontend/cart', 'frontend.cart.index')
    ->name('frontend.cart');

Route::view('/frontend/checkout', 'frontend.checkout.index')
    ->name('frontend.checkout');

Route::view('/frontend/about', 'frontend.about')
    ->name('frontend.about');

Route::view('/frontend/business', 'frontend.business')
    ->name('frontend.business');

Route::view('/frontend/hospitals', 'frontend.hospitals')
    ->name('frontend.hospitals');

Route::view('/frontend/clinics', 'frontend.clinics')
    ->name('frontend.clinics');

Route::view('/frontend/medical-stores', 'frontend.medical-stores')
    ->name('frontend.medical-stores');

Route::view('/frontend/contact', 'frontend.contact')
    ->name('frontend.contact');