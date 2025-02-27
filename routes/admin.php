<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\SubSubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BusinessSettingsController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeCategoryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\FlashDealController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\SEOController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SupportTicketController;
use App\Http\Controllers\PickupPointController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AddonController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CustomerBulkUploadController;
use App\Http\Controllers\CustomerPackageController;
use App\Http\Controllers\CustomerProductController;
use App\Http\Controllers\PaymentController;

Route::get('/admin', [DashboardController::class, 'admin_dashboard'])
    ->name('admin.dashboard')
    ->middleware(['auth', 'admin']);

Route::post('/admin/users/{id}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');
Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


// Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

//     // Categories
//     Route::resource('categories', CategoryController::class);
//     Route::get('/categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
//     Route::post('/categories/featured', [CategoryController::class, 'updateFeatured'])->name('categories.featured');

//     // Subcategories  
//     Route::resource('subcategories', SubCategoryController::class);
//     Route::get('/subcategories/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('subcategories.destroy');

//     // SubSubcategories
//     Route::resource('subsubcategories', SubSubCategoryController::class);
//     Route::get('/subsubcategories/destroy/{id}', [SubSubCategoryController::class, 'destroy'])->name('subsubcategories.destroy');

//     // Brands
//     Route::resource('brands', BrandController::class);
//     Route::get('/brands/destroy/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');

    // Products
    Route::get('/products/admin', [ProductController::class, 'admin_products'])->name('products.admin');
    Route::get('/products/seller', [ProductController::class, 'seller_products'])->name('products.seller');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/products/admin/{id}/edit', [ProductController::class, 'admin_product_edit'])->name('products.admin.edit');
    Route::get('/products/seller/{id}/edit', [ProductController::class, 'seller_product_edit'])->name('products.seller.edit');
    Route::post('/products/todays_deal', [ProductController::class, 'updateTodaysDeal'])->name('products.todays_deal');
    Route::post('/products/get_products_by_subsubcategory', [ProductController::class, 'get_products_by_subsubcategory'])->name('products.get_products_by_subsubcategory');

//     // Sellers
//     Route::resource('sellers', SellerController::class);
//     Route::get('/sellers/destroy/{id}', [SellerController::class, 'destroy'])->name('sellers.destroy');
//     Route::get('/sellers/view/{id}/verification', [SellerController::class, 'show_verification_request'])->name('sellers.show_verification_request');
//     Route::get('/sellers/approve/{id}', [SellerController::class, 'approve_seller'])->name('sellers.approve');
//     Route::get('/sellers/reject/{id}', [SellerController::class, 'reject_seller'])->name('sellers.reject');
//     Route::post('/sellers/payment_modal', [SellerController::class, 'payment_modal'])->name('sellers.payment_modal');
//     Route::get('/seller/payments', [PaymentController::class, 'payment_histories'])->name('sellers.payment_histories');
//     Route::get('/seller/payments/show/{id}', [PaymentController::class, 'show'])->name('sellers.payment_history');

//     // Customers
//     Route::resource('customers', CustomerController::class);
//     Route::get('/customers/destroy/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');

//     // Newsletter
//     Route::get('/newsletter', [NewsletterController::class, 'index'])->name('newsletters.index');
//     Route::post('/newsletter/send', [NewsletterController::class, 'send'])->name('newsletters.send');

//     // Profile
//     Route::resource('profile', ProfileController::class);

//     // Business Settings
//     Route::post('/business-settings/update', [BusinessSettingsController::class, 'update'])->name('business_settings.update');
//     Route::post('/business-settings/update/activation', [BusinessSettingsController::class, 'updateActivationSettings'])->name('business_settings.update.activation');
//     Route::get('/activation', [BusinessSettingsController::class, 'activation'])->name('activation.index');
//     Route::get('/payment-method', [BusinessSettingsController::class, 'payment_method'])->name('payment_method.index');
//     Route::get('/social-login', [BusinessSettingsController::class, 'social_login'])->name('social_login.index');
//     Route::get('/smtp-settings', [BusinessSettingsController::class, 'smtp_settings'])->name('smtp_settings.index');
//     Route::get('/google-analytics', [BusinessSettingsController::class, 'google_analytics'])->name('google_analytics.index');
//     Route::get('/facebook-chat', [BusinessSettingsController::class, 'facebook_chat'])->name('facebook_chat.index');
//     Route::post('/env_key_update', [BusinessSettingsController::class, 'env_key_update'])->name('env_key_update.update');
//     Route::post('/payment_method_update', [BusinessSettingsController::class, 'payment_method_update'])->name('payment_method.update');
//     Route::post('/google_analytics', [BusinessSettingsController::class, 'google_analytics_update'])->name('google_analytics.update');
//     Route::post('/facebook_chat', [BusinessSettingsController::class, 'facebook_chat_update'])->name('facebook_chat.update');
//     Route::post('/facebook_pixel', [BusinessSettingsController::class, 'facebook_pixel_update'])->name('facebook_pixel.update');

    // Currency Settings
    Route::get('/currency', [CurrencyController::class, 'currency'])->name('currency.index');
    Route::post('/currency/update', [CurrencyController::class, 'updateCurrency'])->name('currency.update');
    Route::post('/your-currency/update', [CurrencyController::class, 'updateYourCurrency'])->name('your_currency.update');
    Route::get('/currency/create', [CurrencyController::class, 'create'])->name('currency.create');
    Route::post('/currency/store', [CurrencyController::class, 'store'])->name('currency.store');
    Route::post('/currency/currency_edit', [CurrencyController::class, 'edit'])->name('currency.edit');
    Route::post('/currency/update_status', [CurrencyController::class, 'update_status'])->name('currency.update_status');

//     // Verification Form
//     Route::get('/verification/form', [BusinessSettingsController::class, 'seller_verification_form'])->name('seller_verification_form.index');
//     Route::post('/verification/form', [BusinessSettingsController::class, 'seller_verification_form_update'])->name('seller_verification_form.update');
//     Route::get('/vendor_commission', [BusinessSettingsController::class, 'vendor_commission'])->name('business_settings.vendor_commission');
//     Route::post('/vendor_commission_update', [BusinessSettingsController::class, 'vendor_commission_update'])->name('business_settings.vendor_commission.update');

//     // Languages
//     Route::resource('/languages', LanguageController::class);
//     Route::post('/languages/update_rtl_status', [LanguageController::class, 'update_rtl_status'])->name('languages.update_rtl_status');
//     Route::get('/languages/destroy/{id}', [LanguageController::class, 'destroy'])->name('languages.destroy');
//     Route::get('/languages/{id}/edit', [LanguageController::class, 'edit'])->name('languages.edit');
//     Route::post('/languages/{id}/update', [LanguageController::class, 'update'])->name('languages.update');
//     Route::post('/languages/key_value_store', [LanguageController::class, 'key_value_store'])->name('languages.key_value_store');

//     // Frontend Settings
//     Route::get('/frontend_settings/home', [HomeController::class, 'home_settings'])->name('home_settings.index');
//     Route::post('/frontend_settings/home/top_10', [HomeController::class, 'top_10_settings'])->name('top_10_settings.store');
//     Route::get('/sellerpolicy/{type}', [PolicyController::class, 'index'])->name('sellerpolicy.index');
//     Route::get('/returnpolicy/{type}', [PolicyController::class, 'index'])->name('returnpolicy.index');
//     Route::get('/supportpolicy/{type}', [PolicyController::class, 'index'])->name('supportpolicy.index');
//     Route::get('/terms/{type}', [PolicyController::class, 'index'])->name('terms.index');
//     Route::get('/privacypolicy/{type}', [PolicyController::class, 'index'])->name('privacypolicy.index');

//     // Policies
//     Route::post('/policies/store', [PolicyController::class, 'store'])->name('policies.store');

//     // Frontend Settings Group
//     Route::prefix('frontend_settings')->group(function () {
//         Route::resource('sliders', SliderController::class);
//         Route::get('/sliders/destroy/{id}', [SliderController::class, 'destroy'])->name('sliders.destroy');

//         Route::resource('home_banners', BannerController::class);
//         Route::get('/home_banners/create/{position}', [BannerController::class, 'create'])->name('home_banners.create');
//         Route::post('/home_banners/update_status', [BannerController::class, 'update_status'])->name('home_banners.update_status');
//         Route::get('/home_banners/destroy/{id}', [BannerController::class, 'destroy'])->name('home_banners.destroy');

//         Route::resource('home_categories', HomeCategoryController::class);
//         Route::get('/home_categories/destroy/{id}', [HomeCategoryController::class, 'destroy'])->name('home_categories.destroy');
//         Route::post('/home_categories/update_status', [HomeCategoryController::class, 'update_status'])->name('home_categories.update_status');
//         Route::post('/home_categories/get_subsubcategories_by_category', [HomeCategoryController::class, 'getSubSubCategories'])->name('home_categories.get_subsubcategories_by_category');
//     });

//     // Roles & Staff
//     Route::resource('roles', RoleController::class);
//     Route::get('/roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

//     Route::resource('staffs', StaffController::class);
//     Route::get('/staffs/destroy/{id}', [StaffController::class, 'destroy'])->name('staffs.destroy');

//     // Flash Deals
//     Route::resource('flash_deals', FlashDealController::class);
//     Route::get('/flash_deals/destroy/{id}', [FlashDealController::class, 'destroy'])->name('flash_deals.destroy');
//     Route::post('/flash_deals/update_status', [FlashDealController::class, 'update_status'])->name('flash_deals.update_status');
//     Route::post('/flash_deals/update_featured', [FlashDealController::class, 'update_featured'])->name('flash_deals.update_featured');
//     Route::post('/flash_deals/product_discount', [FlashDealController::class, 'product_discount'])->name('flash_deals.product_discount');
//     Route::post('/flash_deals/product_discount_edit', [FlashDealController::class, 'product_discount_edit'])->name('flash_deals.product_discount_edit');

//     // Orders
//     Route::get('/orders', [OrderController::class, 'admin_orders'])->name('orders.index.admin');
//     Route::get('/orders/{id}/show', [OrderController::class, 'show'])->name('orders.show');
//     Route::get('/sales/{id}/show', [OrderController::class, 'sales_show'])->name('sales.show');
//     Route::get('/orders/destroy/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
//     Route::get('/sales', [OrderController::class, 'sales'])->name('sales.index');

//     // Links
//     Route::resource('links', LinkController::class);
//     Route::get('/links/destroy/{id}', [LinkController::class, 'destroy'])->name('links.destroy');

//     // General Settings
//     Route::resource('generalsettings', GeneralSettingController::class);
//     Route::get('/logo', [GeneralSettingController::class, 'logo'])->name('generalsettings.logo');
//     Route::post('/logo', [GeneralSettingController::class, 'storeLogo'])->name('generalsettings.logo.store');
//     Route::get('/color', [GeneralSettingController::class, 'color'])->name('generalsettings.color');
//     Route::post('/color', [GeneralSettingController::class, 'storeColor'])->name('generalsettings.color.store');

//     // SEO Settings
//     Route::resource('seosetting', SEOController::class);

//     // Commission
//     Route::post('/pay_to_seller', [CommissionController::class, 'pay_to_seller'])->name('commissions.pay_to_seller');

//     // Reports
//     Route::get('/stock_report', [ReportController::class, 'stock_report'])->name('stock_report.index');
//     Route::get('/in_house_sale_report', [ReportController::class, 'in_house_sale_report'])->name('in_house_sale_report.index');
//     Route::get('/seller_report', [ReportController::class, 'seller_report'])->name('seller_report.index');
//     // Reports (continued)
//     Route::get('/seller_sale_report', [ReportController::class, 'seller_sale_report'])->name('seller_sale_report.index');
//     Route::get('/wish_report', [ReportController::class, 'wish_report'])->name('wish_report.index');

    // Coupons
    Route::resource('coupon', CouponController::class);
    Route::post('/coupon/get_form', [CouponController::class, 'get_coupon_form'])->name('coupon.get_coupon_form');
    Route::post('/coupon/get_form_edit', [CouponController::class, 'get_coupon_form_edit'])->name('coupon.get_coupon_form_edit');
    Route::get('/coupon/destroy/{id}', [CouponController::class, 'destroy'])->name('coupon.destroy');

//     // Reviews
//     Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
//     Route::post('/reviews/published', [ReviewController::class, 'updatePublished'])->name('reviews.published');

//     // Support Tickets
//     Route::get('support_ticket/', [SupportTicketController::class, 'admin_index'])->name('support_ticket.admin_index');
//     Route::get('support_ticket/{id}/show', [SupportTicketController::class, 'admin_show'])->name('support_ticket.admin_show');
//     Route::post('support_ticket/reply', [SupportTicketController::class, 'admin_store'])->name('support_ticket.admin_store');

//     // Pickup Points
//     Route::resource('pick_up_points', PickupPointController::class);
//     Route::get('/pick_up_points/destroy/{id}', [PickupPointController::class, 'destroy'])->name('pick_up_points.destroy');
//     Route::get('orders_by_pickup_point', [OrderController::class, 'order_index'])->name('pick_up_point.order_index');
//     Route::get('/orders_by_pickup_point/{id}/show', [OrderController::class, 'pickup_point_order_sales_show'])->name('pick_up_point.order_show');

//     // Invoices
//     Route::get('invoice/admin/{order_id}', [InvoiceController::class, 'admin_invoice_download'])->name('admin.invoice.download');

//     // Conversations
//     Route::get('conversations', [ConversationController::class, 'admin_index'])->name('conversations.admin_index');
//     Route::get('conversations/{id}/show', [ConversationController::class, 'admin_show'])->name('conversations.admin_show');
//     Route::get('/conversations/destroy/{id}', [ConversationController::class, 'destroy'])->name('conversations.destroy');

//     // Seller Profile
//     Route::post('/sellers/profile_modal', [SellerController::class, 'profile_modal'])->name('sellers.profile_modal');
//     Route::post('/sellers/approved', [SellerController::class, 'updateApproved'])->name('sellers.approved');

//     // Attributes
//     Route::resource('attributes', AttributeController::class);
//     Route::get('/attributes/destroy/{id}', [AttributeController::class, 'destroy'])->name('attributes.destroy');

//     // Addons
//     Route::resource('addons', AddonController::class);
//     Route::post('/addons/activation', [AddonController::class, 'activation'])->name('addons.activation');

//     // Customer Bulk Upload
//     Route::get('/customer-bulk-upload/index', [CustomerBulkUploadController::class, 'index'])->name('customer_bulk_upload.index');
//     Route::post('/bulk-user-upload', [CustomerBulkUploadController::class, 'user_bulk_upload'])->name('bulk_user_upload');
//     Route::post('/bulk-customer-upload', [CustomerBulkUploadController::class, 'customer_bulk_file'])->name('bulk_customer_upload');
//     Route::get('/user', [CustomerBulkUploadController::class, 'pdf_download_user'])->name('pdf.download_user');

//     // Customer Package
//     Route::resource('customer_packages', CustomerPackageController::class);
//     Route::get('/customer_packages/destroy/{id}', [CustomerPackageController::class, 'destroy'])->name('customer_packages.destroy');

//     // Classified Products
//     Route::get('/classified_products', [CustomerProductController::class, 'customer_product_index'])->name('classified_products');
//     Route::post('/classified_products/published', [CustomerProductController::class, 'updatePublished'])->name('classified_products.published');
// });
