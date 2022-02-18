<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutheController as authCtrl;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontEnd;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\Doctorschedule;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\InPatientController;
use App\Http\Controllers\MedicineDetailsController;
use App\Http\Controllers\OutPatientController;
use App\Http\Controllers\Dutyshift;
use App\Http\Controllers\Appointment;
use App\Http\Controllers\Birhtcontroller;
use App\Http\Controllers\Deathcontroller;
use App\Http\Controllers\InPatientTestinvoiceController;
use App\Http\Controllers\InSaleController;
use App\Http\Controllers\MedicineBrand;
use App\Http\Controllers\MedicineGeneric;
use App\Http\Controllers\MedicinePurchaseController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\Operationtheatre;
use App\Http\Controllers\Operationtype as ControllersOperationtype;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TestcategoryController;
use App\Http\Controllers\TestnameController;
use App\Http\Controllers\TestinvoiceController;
use App\Http\Controllers\ab;
use App\Models\operationtype;

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


/*for fronend*/
Route::get('/', [FrontEnd::class, 'index'])->name('default');
Route::get('/index', [FrontEnd::class, 'index'])->name('index');
Route::get('/about', [FrontEnd::class, 'about'])->name('front.about');
Route::get('/doctors', [FrontEnd::class, 'doctors'])->name('front.doctors');
Route::get('/departments', [FrontEnd::class, 'department'])->name('front.department');
Route::get('/blog', [FrontEnd::class, 'blog'])->name('front.blog');
Route::get('/blog/blog_detail', [FrontEnd::class, 'blog_detail'])->name('front.blog_detail');
Route::get('/blog/element', [FrontEnd::class, 'element'])->name('front.element');
Route::get('/contact', [FrontEnd::class, 'contact'])->name('front.contact');

Route::get('/ab', [ab::class, 'index'])->name('index');
Route::get('/ba', [ab::class, 'show'])->name('index');


/* for sign in and sign up*/
Route::group(['middleware'=>'UnknownUser'],function(){
   /* Route::get('/', [authCtrl::class, 'signInForm'])->name('default');*/
    
    Route::get('/login', [authCtrl::class, 'signInForm'])->name('login');
    Route::get('/sign-in', [authCtrl::class, 'signInForm'])->name('signin');
    Route::post('/sign-in', [authCtrl::class, 'signIn'])->name('signin.varify');


    Route::get('/sign-up', [authCtrl::class, 'signUpForm'])->name('signup');
    Route::post('/sign-up', [authCtrl::class, 'signUpStore'])->name('signUpStore');
   
   
    Route::get('/forget-password', [authCtrl::class, 'forgetForm'])->name('forget');

    // Route::resource('room', RoomController::class);
    // Route::resource('doctor', DoctorController::class);
    // Route::resource('nurse', NurseController::class);
    // Route::resource('in-patient', InPatientController::class);
    

  

   
    
});



/*for logout*/
Route::get('/logout', [authCtrl::class, 'logout'])->name('logout');
/*frontend*/
Route::get('/ffindpatient',[Appointment::class,'FindPatient'])->name('ffindpatient');
Route::get('/ffindpatientsug',[Appointment::class,'FindPatientsug'])->name('ffindpatientsug');
Route::get('/ffinddoctor',[Appointment::class,'FindDoctor'])->name('ffinddoctor');
Route::get('/ffindschedule',[Appointment::class,'FindSchedule'])->name('ffindschedule');
Route::get('/ffindserial',[Appointment::class,'FindSerial'])->name('ffindserial');
Route::post('/savepatient',[Appointment::class,'SaveAppoint'])->name('appointment.save');

/* superadmin group */
Route::group(['middleware'=>'isSuperadmin'],function(){
    Route::prefix('superadmin')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'superadmin'])->name('superadmin.dashboard');
        Route::resource('department', DepartmentController::class,['as'=>'superadmin']);
        Route::resource('roomtype', RoomTypeController::class,['as'=>'superadmin']);
        Route::resource('room', RoomController::class,['as'=>'superadmin']);
        Route::resource('doctor', DoctorController::class,['as'=>'superadmin']);
        Route::resource('in-patient', InPatientController::class,['as'=>'superadmin']);
        Route::resource('out-patient', OutPatientController::class,['as'=>'superadmin']);
        Route::resource('nurse', NurseController::class,['as'=>'superadmin']);
        Route::resource('users', UserController::class);
        Route::resource('employee', EmployeeController::class,['as'=>'superadmin']);
        Route::resource('ot_type', ControllersOperationtype::class,['as'=>'superadmin']);


        Route::resource('medpurchase', MedicinePurchaseController::class,['as'=>'superadmin']);
        Route::get('/findmedproduct',[MedicinePurchaseController::class,'findProduct'])->name('superadmin.findproduct');
        Route::get('/findgetmedproduct',[MedicinePurchaseController::class,'findgetProduct'])->name('superadmin.findgetproduct');

        Route::resource('medsale', SalesController::class,['as'=>'superadmin']);
        Route::resource('inmedsale', InSaleController::class,['as'=>'superadmin']);
          /*for ajax edit */


        Route::get('/s_id/{param}', [DepartmentController::class, 'get_id'])->name('get_id');


        Route::prefix('medicine_details')->group(function(){
            Route::get('/all',[MedicineDetailsController::class,'index'])->name('superadmin.medicinedetail');
            Route::get('/add',[MedicineDetailsController::class,'addMed'])->name('superadmin.addmedicinedetail');
            Route::post('/add',[MedicineDetailsController::class,'storeMed'])->name('superadmin.storemedicinedetail');
            Route::get('/edit/{id}',[MedicineDetailsController::class,'getMed'])->name('superadmin.getmedicinedetail');
            Route::post('/update',[MedicineDetailsController::class,'updateMed'])->name('superadmin.updatemedicinedetail');
            Route::post('/delete/{id}',[MedicineDetailsController::class,'deleteMed'])->name('superadmin.deletemedicinedetail');
        });
        Route::resource('medicinegeneric', MedicineGeneric::class,['as'=>'superadmin']);
        Route::resource('medicinebrand', MedicineBrand::class,['as'=>'superadmin']);
        Route::resource('dutyshift', Dutyshift::class,['as'=>'superadmin']);

        Route::resource('doctorschedule', Doctorschedule::class,['as'=>'superadmin']);

        Route::resource('appointment',Appointment::class,['as'=>'superadmin']);
        /*route for appointment ajax call*/
        Route::get('/findpatient',[Appointment::class,'FindPatient'])->name('superadmin.findpatient');

        Route::get('/findpatientsug',[Appointment::class,'FindPatientsug'])->name('superadmin.findpatientsug');
        Route::get('/finddoctor',[Appointment::class,'FindDoctor'])->name('superadmin.finddoctor');
        Route::get('/findschedule',[Appointment::class,'FindSchedule'])->name('superadmin.findschedule');
        Route::get('/findserial',[Appointment::class,'FindSerial'])->name('superadmin.findserial');
        
        Route::resource('prescription',PrescriptionController::class,['as'=>'superadmin']);

        Route::resource('o_theatre',Operationtheatre::class,['as'=>'superadmin']);
        Route::resource('operation',OperationController::class,['as'=>'superadmin']);
        Route::get('/findopserial',[OperationController::class,'FindOperationSerial'])->name('superadmin.findoperationserial');
        Route::get('/findoptk',[OperationController::class,'FindOperationTk'])->name('superadmin.findoperationtk');
        Route::resource('testcategory',TestcategoryController::class,['as'=>'superadmin']);

        Route::resource('testname',TestnameController::class,['as'=>'superadmin']);

        Route::resource('testinvoice',TestinvoiceController::class,['as'=>'superadmin']);
        Route::get('/findpatientsugdet',[TestinvoiceController::class,'FindPatientsugdet'])->name('superadmin.findpatientsugdet');
        Route::get('/findtestname',[TestinvoiceController::class,'FindTestName'])->name('superadmin.findtestname');
        Route::get('/findtestprice',[TestinvoiceController::class,'FindTestPrice'])->name('superadmin.findtestprice');


        Route::resource('intestinvoice',InPatientTestinvoiceController::class,['as'=>'superadmin']);
        Route::get('/findinpatientsug',[InPatientTestinvoiceController::class,'FindPatientsug'])->name('superadmin.findinpatientsug');
        Route::get('/findinpatientsugdet',[InPatientTestinvoiceController::class,'FindPatientsugdet'])->name('superadmin.findinpatientsugdet');
        
        Route::resource('birthreg',Birhtcontroller::class,['as'=>'superadmin']);
        Route::resource('deathreg',Deathcontroller::class,['as'=>'superadmin']);
    
    });
});



/* admin group */
Route::group(['middleware'=>'isAdmin'],function(){
    Route::prefix('admin')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
        Route::resource('department', DepartmentController::class,['as'=>'admin']);
         Route::get('/add',[MedicineDetailsController::class,'addMed'])->name('admin.addmedicinedetail');
    });
});


/* user group */
Route::group(['middleware'=>'isUser'],function(){
    Route::prefix('user')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');

    });
});



/* Doctor group */
Route::group(['middleware'=>'isDoctor'],function(){
    Route::prefix('doctor')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'doctor'])->name('doctor.dashboard');

    });
});



/* patient group */
Route::group(['middleware'=>'isPatient'],function(){
    Route::prefix('patient')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'patient'])->name('patient.dashboard');

    });
});



/* accountant group */
Route::group(['middleware'=>'isAccountant'],function(){
    Route::prefix('accountant')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'accountant'])->name('accountant.dashboard');

    });
});



/* nurse group */
Route::group(['middleware'=>'isNurse'],function(){
    Route::prefix('nurse')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'nurse'])->name('nurse.dashboard');

    });
});



/* receptionist group */
Route::group(['middleware'=>'isNurse'],function(){
    Route::prefix('receptionist')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'receptionist'])->name('receptionist.dashboard');

    });
});



/* casemanager group */
Route::group(['middleware'=>'isCaseManager'],function(){
    Route::prefix('casemanager')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'casemanager'])->name('casemanager.dashboard');

    });
});



/* laboratorist group */
Route::group(['middleware'=>'isLabratorist'],function(){
    Route::prefix('laboratorist')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'laboratorist'])->name('laboratorist.dashboard');

    });
});



/* ispharmacist group */
Route::group(['middleware'=>'isPharmacist'],function(){
    Route::prefix('pharmacist')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'pharmacist'])->name('pharmacist.dashboard');

    });
});



