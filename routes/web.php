<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Educational\CategoryController;
use App\Http\Controllers\Admin\Educational\CommentController;
use App\Http\Controllers\Admin\Educational\CourseController;
use App\Http\Controllers\Admin\Educational\DiscountController;
use App\Http\Controllers\Admin\Educational\lessonController;
use App\Http\Controllers\Admin\Educational\PaymentController;
use App\Http\Controllers\Admin\Notify\EmailController;
use App\Http\Controllers\Admin\Notify\EmailFileController;
use App\Http\Controllers\Admin\Notify\SMSController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Ticket\TicketCategoryController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use App\Http\Controllers\Admin\User\TeacherController;
use App\Http\Controllers\Customer\HomeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.home');

    Route::prefix('educational')->namespace('Educational')->group(function () {
        //category 

        Route::prefix('category')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('admin.educational.category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.educational.category.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('admin.educational.category.store');
            Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('admin.educational.category.edit');
            Route::put('/update/{category}', [CategoryController::class, 'update'])->name('admin.educational.category.update');
            Route::delete('/delete/{category}', [CategoryController::class, 'destroy'])->name('admin.educational.category.destroy');
            Route::get('/status/{category}', [CategoryController::class, 'status'])->name('admin.educational.category.status');
        });
        //--------------------------------------------------------------------------

        //comment 

        Route::prefix('comment')->group(function () {
            Route::get('/', [CommentController::class, 'index'])->name('admin.educational.comment.index');
            Route::get('/show/{comment}', [CommentController::class, 'show'])->name('admin.educational.comment.show');
            Route::post('/answer/{comment}', [CommentController::class, 'answer'])->name('admin.educational.comment.answer');
            Route::get('/status/{comment}', [CommentController::class, 'status'])->name('admin.educational.comment.status');
            Route::get('/approved/{comment}', [CommentController::class, 'approved'])->name('admin.educational.comment.approved');
        });
        //--------------------------------------------------------------------------

        //discount 

        Route::prefix('discount')->group(function () {
            Route::get('/copan', [DiscountController::class, 'copan'])->name('admin.educational.discount.copan');
            Route::get('/copan/create', [DiscountController::class, 'copanCreate'])->name('admin.educational.discount.copan.create');
            Route::post('/copan/store', [DiscountController::class, 'copanStore'])->name('admin.educational.discount.copan.store');
            Route::delete('/copan/delete/{copan}', [DiscountController::class, 'copanDestroy'])->name('admin.educational.discount.copan.destroy');
            Route::get('/copan/status/{copan}', [DiscountController::class, 'copanStatus'])->name('admin.educational.discount.copan.status');
            Route::get('/copan/edit/{copan}', [DiscountController::class , 'copanEdit'])->name('admin.educational.discount.copan.edit');
            Route::put('/copan/update/{copan}', [DiscountController::class , 'copanUpdate'])->name('admin.educational.discount.copan.update');
            
            
            Route::get('/common-discount', [DiscountController::class, 'commonDiscount'])->name('admin.educational.discount.commonDiscount');
            Route::get('/common-discount/create', [DiscountController::class, 'commonDiscountCreate'])->name('admin.educational.discount.commonDiscount.create');
            Route::post('/common-discount/store', [DiscountController::class, 'commonDiscountStore'])->name('admin.educational.discount.commonDiscount.store');
            Route::get('/common-discount/status/{commonDiscount}', [DiscountController::class, 'commonDiscountStatus'])->name('admin.educational.discount.commonDiscount.status');
            Route::get('/common-discount/edit/{commonDiscount}', [DiscountController::class, 'commonDiscountEdit'])->name('admin.educational.discount.commonDiscount.edit');
            Route::put('/common-discount/update/{commonDiscount}', [DiscountController::class, 'commonDiscountUpdate'])->name('admin.educational.discount.commonDiscount.update');
            Route::delete('/common-discount/delete/{commonDiscount}', [DiscountController::class, 'commonDiscountDestroy'])->name('admin.educational.discount.commonDiscount.destroy');
           
           
            Route::get('/amazing-sale', [DiscountController::class, 'amazingSale'])->name('admin.educational.discount.amazingSale');
            Route::get('/amazing-sale/create', [DiscountController::class, 'amazingSaleCreate'])->name('admin.educational.discount.amazingSale.create');
            Route::post('/amazing-sale/store', [DiscountController::class, 'amazingSaleStore'])->name('admin.educational.discount.amazingSale.store');
            Route::get('/amazing-sale/edit/{amazingSale}', [DiscountController::class, 'amazingSaleEdit'])->name('admin.educational.discount.amazingSale.edit');
            Route::put('/amazing-sale/update/{amazingSale}', [DiscountController::class, 'amazingSaleUpdate'])->name('admin.educational.discount.amazingSale.update');
            Route::delete('/amazing-sale/delete/{amazingSale}', [DiscountController::class, 'amazingSaleDestroy'])->name('admin.educational.discount.amazingSale.destroy');
            Route::get('/amazing-sale/status/{amazingSale}', [DiscountController::class, 'amazingSaleStatus'])->name('admin.educational.discount.amazingSale.status');
        });
        //--------------------------------------------------------------------------

        //payment 

        Route::prefix('payment')->group(function () {
            Route::get('/', [PaymentController::class, 'index'])->name('admin.educational.payment.index');
            Route::get('/attendance', [PaymentController::class, 'attendance'])->name('admin.educational.payment.attendance');
            Route::get('/confirm', [PaymentController::class, 'confirm'])->name('admin.educational.payment.confirm');
        });
        //--------------------------------------------------------------------------

        //cource 

        Route::prefix('course')->group(function () {
            Route::get('/', [CourseController::class, 'index'])->name('admin.educational.course.index');
            Route::get('/approved/{course}', [CourseController::class , 'approved'])->name('admin.educational.course.approved');
            Route::get('/create', [CourseController::class, 'create'])->name('admin.educational.course.create');
            Route::post('/store', [CourseController::class, 'store'])->name('admin.educational.course.store');
            Route::get('/edit/{cours}', [CourseController::class, 'edit'])->name('admin.educational.course.edit');
            Route::put('/update/{cours}', [CourseController::class, 'update'])->name('admin.educational.course.update');
            Route::delete('/delete/{cours}', [CourseController::class, 'destroy'])->name('admin.educational.course.destroy');
            Route::get('/status/{cours}', [CourseController::class, 'status'])->name('admin.educational.course.status');
        });
        //--------------------------------------------------------------------------
        
        //lesson

        Route::prefix('lesson')->group(function () {
            Route::get('/{course}', [lessonController::class, 'index'])->name('admin.educational.lesson.index');
            Route::get('/{course}/create', [lessonController::class, 'create'])->name('admin.educational.lesson.create');
            Route::post('/{course}/store', [lessonController::class, 'store'])->name('admin.educational.lesson.store');
            Route::get('/edit/{lesson}', [LessonController::class, 'edit'])->name('admin.educational.lesson.edit');
            Route::put('/update/{lesson}', [LessonController::class, 'update'])->name('admin.educational.lesson.update');
            Route::delete('{course}/destroy/{lesson}', [LessonController::class, 'destroy'])->name('admin.educational.lesson.destroy');
            Route::get('/status/{lesson}', [lessonController::class, 'status'])->name('admin.educational.lesson.status');
        });
        //--------------------------------------------------------------------------

    });
    Route::prefix('user')->namespace('User')->group(function () {

        //teacher

        Route::prefix('teacher')->group(function () {
            Route::get('/', [TeacherController::class, 'index'])->name('admin.user.teacher.index');
            Route::get('/create', [TeacherController::class, 'create'])->name('admin.user.teacher.create');
            Route::post('/store', [TeacherController::class, 'store'])->name('admin.user.teacher.store');
            Route::get('/show/{teacher}', [TeacherController::class, 'show'])->name('admin.user.teacher.show');
            Route::delete('/delete/{teacher}', [TeacherController::class, 'destroy'])->name('admin.user.teacher.destroy');
            Route::get('/status/{teacher}', [TeacherController::class, 'status'])->name('admin.user.teacher.status');
            Route::get('/validationable/{teacher}', [TeacherController::class, 'validationable'])->name('admin.user.teacher.validationable');

        });
        //--------------------------------------------------------------------------
    });

    Route::prefix('notify')->namespace('Notify')->group(function () {

        //email
        Route::prefix('email')->group(function () {
            Route::get('/', [EmailController::class, 'index'])->name('admin.notify.email.index');
            Route::get('/create', [EmailController::class, 'create'])->name('admin.notify.email.create');
            Route::post('/store', [EmailController::class, 'store'])->name('admin.notify.email.store');
            Route::get('/edit/{email}', [EmailController::class, 'edit'])->name('admin.notify.email.edit');
            Route::put('/update/{email}', [EmailController::class, 'update'])->name('admin.notify.email.update');
            Route::delete('/delete/{email}', [EmailController::class, 'destroy'])->name('admin.notify.email.destroy');
            Route::get('/status/{email}', [EmailController::class, 'status'])->name('admin.notify.email.status');
        });
        //--------------------------------------------------------------------------

        //email file
        Route::prefix('email-file')->group(function () {
            Route::get('/{email}', [EmailFileController::class, 'index'])->name('admin.notify.email-file.index');
            Route::get('/create/{email}', [EmailFileController::class, 'create'])->name('admin.notify.email-file.create');
            Route::post('/store/{email}', [EmailFileController::class, 'store'])->name('admin.notify.email-file.store');
            Route::get('/edit/{email-file}', [EmailFileController::class, 'edit'])->name('admin.notify.email-file.edit');
            Route::put('/update/{email-file}', [EmailFileController::class, 'update'])->name('admin.notify.email-file.update');
            Route::delete('/delete/{email-file}', [EmailFileController::class, 'destroy'])->name('admin.notify.email-file.destroy');
            Route::get('/status/{email-file}', [EmailFileController::class, 'status'])->name('admin.notify.email-file.status');
        });
        //--------------------------------------------------------------------------

        //sms

        Route::prefix('sms')->group(function () {
            Route::get('/', [SMSController::class, 'index'])->name('admin.notify.sms.index');
            Route::get('/create', [SMSController::class, 'create'])->name('admin.notify.sms.create');
            Route::post('/store', [SMSController::class, 'store'])->name('admin.notify.sms.store');
            Route::get('/edit/{sms}', [SMSController::class, 'edit'])->name('admin.notify.sms.edit');
            Route::put('/update/{sms}', [SMSController::class, 'update'])->name('admin.notify.sms.update');
            Route::delete('/delete/{sms}', [SMSController::class, 'destroy'])->name('admin.notify.sms.destroy');
            Route::get('/status/{sms}', [SMSController::class, 'status'])->name('admin.notify.sms.status');
        });
        //--------------------------------------------------------------------------
    });
    Route::prefix('ticket')->namespace('Ticket')->group(function () {
        Route::get('/new-tickets', [TicketController::class, 'newTickets'])->name('admin.ticket.new-tickets');
        Route::get('/open-tickets', [TicketController::class, 'openTickets'])->name('admin.ticket.open-tickets');
        Route::get('/close-tickets', [TicketController::class, 'closeTickets'])->name('admin.ticket.close-tickets');
        Route::get('/', [TicketController::class, 'index'])->name('admin.ticket.index');
        Route::get('/create', [TicketController::class, 'create'])->name('admin.ticket.create');
        Route::get('/show', [TicketController::class, 'show'])->name('admin.ticket.show');
        Route::post('/store', [TicketController::class, 'store'])->name('admin.ticket.store');
        Route::get('/edit/{id}', [TicketController::class, 'edit'])->name('admin.ticket.edit');
        Route::put('/update/{id}', [TicketController::class, 'update'])->name('admin.ticket.update');
        Route::delete('/delete/{id}', [TicketController::class, 'destroy'])->name('admin.ticket.destroy');

        //ticket-category

        Route::prefix('category')->group(function () {
            Route::get('/', [TicketCategoryController::class, 'index'])->name('admin.ticket.category.index');
            Route::get('/create', [TicketCategoryController::class, 'create'])->name('admin.ticket.category.create');
            Route::post('/store', [TicketCategoryController::class, 'store'])->name('admin.ticket.category.store');
            Route::get('/edit/{ticketCategory}', [TicketCategoryticketCategory::class, 'edit'])->name('admin.ticket.category.edit');
            Route::put('/update/{ticketCategory}', [TicketCategoryController::class, 'update'])->name('admin.ticket.category.update');
            Route::delete('/delete/{ticketCategory}', [TicketCategoryController::class, 'destroy'])->name('admin.ticket.category.destroy');
            Route::get('/status/{ticketCategory}', [TicketCategoryController::class, 'status'])->name('admin.ticket.category.status');
        });
        //--------------------------------------------------------------------------
    });

    Route::prefix('setting')->namespace('Setting')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('admin.setting.index');
        Route::get('/edit/{setting}', [SettingController::class, 'edit'])->name('admin.setting.edit');
        Route::put('/update/{setting}', [SettingController::class, 'update'])->name('admin.setting.update');
    });

});

Route::get('/', [HomeController::class, 'index'])->name('customer.home');