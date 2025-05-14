<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CommonSetupController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\ProductQcController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneralInfoController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\MeasurementController;
use App\Http\Controllers\NewReportController;
use App\Http\Controllers\NPTController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\OperatorPerformanceController;
use App\Http\Controllers\OperatorSkillMetrixController;
use App\Http\Controllers\QualitycheckController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\HourlyproductionController;
use App\Http\Controllers\StopwatchController;

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

Route::get('/locale/{locale}', [LanguageController::class, 'switch'])->name('locale');

//Auth Routes Start
Route::get('/', [HomeController::class, 'login'])->name('login');
//Route::get('/login', [AuthController::class, 'login'])->name('custom.login');
Route::post('/login', [AuthController::class, 'login'])->name('custom.login');
Route::get('register', [AuthController::class, 'registration'])->name('custom.registration');
Route::get('user-create', [AuthController::class, 'create'])->name('userCreate');
Route::post('user-create', [AuthController::class, 'userCreate'])->name('user.create');
Route::post('user-register', [AuthController::class, 'userRegistration'])->name('user.registration');
Route::get('user-list', [AuthController::class, 'userList'])->name('user.list');
Route::get('user-edit/{id}', [AuthController::class, 'userEdit'])->name('edit_user');
Route::POST('user-update/{id}', [AuthController::class, 'userUpdate'])->name('user_update');
Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');
Route::get('/user-active/{id}', [AuthController::class, 'active'])->name('activeUser');
Route::get('/user-inactive/{id}', [AuthController::class, 'inactive'])->name('inactiveUser');

/*Change Password*/
Route::get('change-password', [AuthController::class, 'changePass'])->name('changePassword');
Route::post('change-password', [AuthController::class, 'updatePassword'])->name('update.password');
Route::get('hourly-production', [HourlyproductionController::class, 'hourlyproduction'])->name('hourlyproduction');


Route::POST('/fetch-line-for-hourly', [HourlyproductionController::class, 'fetcLineByFloor'])->name('fetcLineByFloorforhour');
Route::post('hourly-production-store', [HourlyproductionController::class, 'hourlyproductionAdd'])->name('addhourlyproduction');
Route::post('hourly-production-show', [HourlyproductionController::class, 'fetcLineByFloorforhourShow'])->name('fetcLineByFloorforhourShow');
Route::post('updatehourlyproduction', [HourlyproductionController::class, 'hourlyproductionUpdate'])->name('updatehourlyproduction');
Route::POST('/yesterday', [HourlyproductionController::class, 'yesterdayData'])->name('previousdaydata');
Route::get('/hourly-report', [HourlyproductionController::class, 'Report'])->name('hourly_report');
Route::post('/submit-hourly-report', [HourlyproductionController::class, 'ReportSubmit'])->name('hourly_report_submit');
Route::get('/production-summary', [HourlyproductionController::class, 'Summary'])->name('hourlyproduction_summary');
Route::post('/summary/specific/date', [HourlyproductionController::class, 'summary_specific_date'])->name('summary_specific_date');

Route::post('/download-hourly-dawload', [HourlyproductionController::class, 'downloadReport'])->name('download.hourly.report');
Route::POST('/summary_filter', [HourlyproductionController::class, 'SummeryFilter'])->name('summary_filter');
Route::POST('/specific/date', [HourlyproductionController::class, 'SpecificDateData'])->name('specific_date_data');
Route::get('/export-production/{date}', [HourlyproductionController::class, 'SpesificDateexport'])->name('export.production');
Route::post('/datetodate.summary.export', [HourlyproductionController::class, 'DateToDateExport'])->name('datetodate.summary.export');



Route::POST('/fetch-floor', [AjaxController::class, 'fetchFloor'])->name('fetchFloor');
Route::POST('/fetch-buyer', [AjaxController::class, 'fetchBuyer'])->name('fetchBuyer');
Route::POST('/fetch-line-by-floor', [AjaxController::class, 'fetcLineByFloor'])->name('fetcLineByFloor');
Route::POST('/fetch-buyer-by-line', [AjaxController::class, 'fetchBuyerbyline'])->name('fetchBuyerByLine');
Route::POST('/fetch-operator-by-line', [AjaxController::class, 'fetchOperatorByLine'])->name('fetchOperatorByLine');
/*Dashboard Routes*/
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::get('/view-summary', [HomeController::class, 'viewSummary'])->name('viewSummary');

    // /*Ajax Route for Location*/
    // Route::POST('/fetch-floor', [AjaxController::class, 'fetchFloor'])->name('fetchFloor');
    // Route::POST('/fetch-buyer', [AjaxController::class, 'fetchBuyer'])->name('fetchBuyer');
    // Route::POST('/fetch-line-by-floor', [AjaxController::class, 'fetcLineByFloor'])->name('fetcLineByFloor');
    // Route::POST('/fetch-buyer-by-line', [AjaxController::class, 'fetchBuyerbyline'])->name('fetchBuyerByLine');
    // Route::POST('/fetch-operator-by-line', [AjaxController::class, 'fetchOperatorByLine'])->name('fetchOperatorByLine');

    /*QC Route*/
    Route::get('/production_add', [HourlyproductionController::class, 'ProductionAdd'])->name('production_add');
    Route::get('/production_show', [HourlyproductionController::class, 'production_show'])->name('production_show');
    Route::get('/previous_day', [HourlyproductionController::class, 'previous_day'])->name('previous_day');
    Route::get('/specific_date', [HourlyproductionController::class, 'specific_date'])->name('specific_date');
    Route::get('/qc-form', [ProductQcController::class, 'qc_add'])->name('productForm');
    Route::post('/qc-form', [ProductQcController::class, 'qc_store'])->name('productFormSubmit');
    // Measurement Route
    Route::get('/measurement', [MeasurementController::class, 'Measurement'])->name('measurement');
    Route::get('/measurement_report', [MeasurementController::class, 'MeasurementReport'])->name('measurement_report');
    Route::get('/measurement-form', [MeasurementController::class, 'Measurement_form'])->name('measurement_form');
    Route::POST('/measurement-form', [MeasurementController::class, 'Measurement_store'])->name('measurement_form_submit');
    Route::POST('/measurment_report_result', [MeasurementController::class, 'measurment_report_result'])->name('measurment_report_result');
    //NPT Route
    Route::get('/npt',[NPTController::class,'index'])->name('npt_list');
    Route::get('/npt-create',[NPTController::class,'Create'])->name('npt_create');
    Route::POST('/npt',[NPTController::class,'Store'])->name('npt_store');
    Route::POST('/npt_report',[NPTController::class,'npt_report_result'])->name('npt_report_result');
    Route::get('/npt_report',[NPTController::class,'npt_report'])->name('npt_report');
    /*General Info Route*/
    Route::get('/general-form', [GeneralInfoController::class, 'general_add'])->name('generalForm');
    Route::post('/general-form', [GeneralInfoController::class, 'general_store'])->name('generalFormSubmit');
    Route::get('/general-form-view', [GeneralInfoController::class, 'general_view'])->name('generalFormView');
    Route::get('/edit-general-info/{id}', [GeneralInfoController::class, 'edit'])->name('editGeneralForm');
    Route::post('/update-general-info/{id}', [GeneralInfoController::class, 'update'])->name('updateGeneralForm');
    /*Buyer Setup*/
    Route::get('/buyer-list', [BuyerController::class, 'index'])->name('buyerList');
    Route::get('/buyer-setup', [BuyerController::class, 'buyer_add'])->name('buyerSetup');
    Route::post('/buyer-setup', [BuyerController::class, 'buyer_store'])->name('buyerSave');
    Route::get('/buyer-status/{id}', [BuyerController::class, 'buyer_status'])->name('buyerStatus');
    /*oparato Setup*/
    Route::get('/operator_list', [OperatorController::class, 'index'])->name('operator_list');
    Route::get('/operator_create', [OperatorController::class, 'oparator_create'])->name('oparetor_create');
    Route::post('/operator_store', [OperatorController::class, 'operator_store'])->name('operator_store');
    Route::get('/operator-status/{id}', [OperatorController::class, 'operator_status'])->name('operator_status');

    /*Process Setup*/
    Route::get('/process-list', [CommonSetupController::class, 'process_list'])->name('processList');
    Route::get('/process-setup', [CommonSetupController::class, 'process_add'])->name('processSetup');
    Route::post('/process-setup', [CommonSetupController::class, 'process_store'])->name('processSave');
    Route::get('/process-edit/{id}', [CommonSetupController::class, 'process_edit'])->name('process_edit');
    Route::post('/process-edit/{id}', [CommonSetupController::class, 'process_update'])->name('processUpdate');
    Route::get('/process-status/{id}', [CommonSetupController::class, 'process_status'])->name('processStatus');
    /*MC Setup*/
    Route::get('/mc-list', [CommonSetupController::class, 'mc_list'])->name('mcList');
    Route::get('/mc-setup', [CommonSetupController::class, 'mc_add'])->name('mcSetup');
    Route::post('/mc-setup', [CommonSetupController::class, 'mc_store'])->name('mcSave');
    Route::get('/mc-edit/{id}', [CommonSetupController::class, 'mc_edit'])->name('mc_edit');
    Route::post('/mc-edit/{id}', [CommonSetupController::class, 'mc_update'])->name('mcUpdate');
    Route::get('/mc-status/{id}', [CommonSetupController::class, 'mc_status'])->name('mcStatus');
    /*MC Setup*/
    Route::get('/size-list', [SizeController::class, 'size_list'])->name('sizeList');
    Route::get('/size-setup', [SizeController::class, 'size_add'])->name('sizeSetup');
    Route::post('/size-setup', [SizeController::class, 'size_store'])->name('sizeSave');
    Route::get('/size-edit/{id}', [SizeController::class, 'size_edit'])->name('size_edit');
    Route::put('/size-edit/{id}', [SizeController::class, 'size_update'])->name('sizeUpdate');
    Route::delete('/size-edit/{id}', [SizeController::class, 'size_Delete'])->name('size_delete');
    Route::get('/size-status/{id}', [SizeController::class, 'size_status'])->name('sizeStatus');
    /*Defect Code Setup*/
    Route::get('/defect-list', [CommonSetupController::class, 'defect_list'])->name('defectList');
    Route::get('/defect-setup', [CommonSetupController::class, 'defect_add'])->name('defectSetup');
    Route::post('/defect-setup', [CommonSetupController::class, 'defect_store'])->name('defectSave');
    Route::get('/defect-edit/{id}', [CommonSetupController::class, 'defect_edit'])->name('defect_edit');
    Route::post('/defect-edit/{id}', [CommonSetupController::class, 'defect_update'])->name('defectUpdate');
    Route::get('/defect-status/{id}', [CommonSetupController::class, 'defect_status'])->name('defectStatus');
    /*TenCard Setup*/
    Route::get('/tenCard-list', [CommonSetupController::class, 'tenCard_list'])->name('tenCardList');
    Route::get('/tenCard-setup', [CommonSetupController::class, 'tenCard_add'])->name('tenCardSetup');
    Route::post('/tenCard-setup', [CommonSetupController::class, 'tenCard_store'])->name('tenCardSave');
    Route::get('/tenCard-edit/{id}', [CommonSetupController::class, 'tenCard_edit'])->name('tenCard_edit');
    Route::post('/tenCard-edit/{id}', [CommonSetupController::class, 'tenCard_update'])->name('tenCardUpdate');
    Route::get('/tenCard-status/{id}', [CommonSetupController::class, 'tenCard_status'])->name('tenCardStatus');
    /*Floor Setup*/
    Route::get('/floor-list', [FloorController::class, 'index'])->name('floorList');
    Route::get('/floor-setup', [FloorController::class, 'floor_add'])->name('floorSetup');
    Route::post('/floor-setup', [FloorController::class, 'floor_store'])->name('floorSave');
    Route::get('/floor_status/{id}', [FloorController::class, 'floor_status'])->name('floor_status');


    Route::get('/floor_edit/{id}', [FloorController::class, 'floor_edit'])->name('floor_edit');
    Route::POST('/floor_update/{id}', [FloorController::class, 'floor_update'])->name('floor_update');
    /*Line Setup*/
    Route::get('/line-list', [LineController::class, 'index'])->name('lineList');
    Route::get('/line-setup', [LineController::class, 'line_add'])->name('lineSetup');
    Route::post('/line-setup', [LineController::class, 'line_store'])->name('lineSave');
    Route::get('/line-status/{id}', [LineController::class, 'line_status'])->name('line_status');
    Route::get('/line_edit/{id}', [LineController::class, 'line_edit'])->name('line_edit');
    Route::post('/line_update/{id}', [LineController::class, 'line_update'])->name('line_update');
//designation`
    Route::get('/designation',[DesignationController::class,'index'])->name('designation');
    Route::get('/designation_add',[DesignationController::class,'create'])->name('designation_add');
    Route::post('/designation_store',[DesignationController::class,'store'])->name('designation_store');
    Route::get('/designation_edit/{id}',[DesignationController::class,'edit'])->name('designation_edit');
    Route::post('/designation_update/{id}',[DesignationController::class,'update'])->name('designation_update');
    Route::get('/designationsStatus/{id}',[DesignationController::class,'des_status'])->name('designationsStatus');
// operator_performances
    Route::get('/operator_performances_add',[OperatorPerformanceController::class,'create'])->name('operator_performances_add');
    Route::post('/operator_performances_store',[OperatorPerformanceController::class,'store'])->name('operator_performances_store');
    // operator_performances report
     Route::get('/opp_report',[OperatorPerformanceController::class,'opp_report'])->name('opp_report');
     Route::Post('/opp_report_view',[OperatorPerformanceController::class,'opp_report_view'])->name('opp_report_view');
     // operator_skill_metrix
    Route::get('/operator_skill_metrix',[OperatorSkillMetrixController::class,'index'])->name('operator_skill_metrix');
    Route::get('/operator_skill_metrix_add',[OperatorSkillMetrixController::class,'create'])->name('operator_skill_metrix_add');
    Route::post('/op_p_skill_metrix_submit',[OperatorSkillMetrixController::class,'store'])->name('op_p_skill_metrix_submit');
    Route::get('/op_p_skill_metrix_edit/{id}',[OperatorSkillMetrixController::class,'edit'])->name('op_p_skill_metrix_edit');
    Route::get('/op_p_skill_metrix_view/{id}',[OperatorSkillMetrixController::class,'view'])->name('op_p_skill_metrix_view');
    Route::delete('/op_p_skill_metrix_delete/{id}',[OperatorSkillMetrixController::class,'destroy'])->name('op_p_skill_metrix_delete');
    Route::post('/op_p_skill_metrix_update/{id}',[OperatorSkillMetrixController::class,'update'])->name('op_p_skill_metrix_update');
    Route::get('/operator_skill_metrix_report',[OperatorSkillMetrixController::class,'report'])->name('operator_skill_metrix_report');
    Route::post('/operator_skill_metrix_report',[OperatorSkillMetrixController::class,'report_view'])->name('operator_skill_metrix_report_view');
    /*Report Route*/
    Route::get('/general-report', [ReportController::class, 'general_report'])->name('generalReport');
    Route::post('general-report-result',  [ReportController::class, 'general_report_result'])->name('resultGeneralReport');
    Route::post('details-report-result/{id}',  [ReportController::class, 'general_report_details'])->name('resultGeneralReportDetails');
    //redirect lines dashboard
    Route::get('redirect_line_dashboard/{id}',  [HomeController::class, 'redirect_line_dashboard'])->name('redirect_line_dashboard');
    Route::get('/ie-report', [ReportController::class, 'ie_report'])->name('ie_report');
    Route::post('/ie-report-result', [ReportController::class, 'ie_report_result'])->name('ie_report_result');

    /*Dhu Effi report*/
    Route::get('/dhu-report', [ReportController::class, 'dhu_report'])->name('dhu_report');
    Route::post('/dhu-report-result', [ReportController::class, 'dhu_report_result'])->name('dhu_report_result');

    /*Buyer Report*/
    Route::get('/buyer-report', [ReportController::class, 'buyer_report'])->name('buyer_report');
    Route::post('/buyer-report-result', [ReportController::class, 'buyer_report_result'])->name('buyer_report_result');
    /*new Buyer Report*/
     Route::get('/buyer_new_report', [NewReportController::class, 'buyer_new_report'])->name('buyer_new_report');
    Route::post('/buyer_new_report_result', [NewReportController::class, 'buyer_new_report_result'])->name('buyer_new_report_result');
    //quality_report
    Route::get('/quality_report', [ReportController::class, 'quality_report'])->name('quality_report');
    Route::post('/quality_report_result', [ReportController::class, 'quality_report_result'])->name('quality_report_result');
    // general_info admin side
    Route::get('/genarel_infos', [GeneralInfoController::class, 'info_admin_side'])->name('general_info');
    // quality admin side
    Route::get('/quality_check_view', [QualitycheckController::class, 'quality_check_view'])->name('quality_check_view');
    Route::get('/quality_check', [QualitycheckController::class, 'index'])->name('quality_check');
    Route::get('/quelity_edit/{id}', [QualitycheckController::class, 'quelity_edit'])->name('quelity_edit');
    Route::POST('/product_uptade/{id}', [QualitycheckController::class, 'product_uptade'])->name('product_uptade');
    Route::get('/target-page', function () {
        return view('target-page');
    });

    Route::get('/stopwatch', [StopwatchController::class, 'index'])->name('stopwatch');

});

