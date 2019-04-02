<?php

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

/*==Admin Linkes===================================================*/
Route::get('/admin', function () {
    if (\Illuminate\Support\Facades\Auth::check()) {
        return redirect('/admin/home');
    } else {
        return redirect('/login');
    }
});
/*Auth=======*/
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['auth', 'locale'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/changelang/{locale}', 'SettingController@changeLang');
    /*Setting=======*/
    Route::any('/setting/{id}/edit', 'SettingController@edit');
    Route::any('/setting/delItem', 'SettingController@delItem');
    /*Language=======*/
    Route::resource('language', 'LanguageController');
    Route::get('/destroyLang/{id}', 'LanguageController@destroyLang');
    /*Slider=======*/
    Route::resource('slider', 'SliderController');
    Route::get('/deleteslider/{id}', 'SliderController@deleteslider');
    /*Pages=======*/
    Route::resource('page', 'PagesController');
    Route::get('/destroyPage/{id}', 'PagesController@destroyPage');
    /*Blog=======*/
    Route::resource('news', 'NewsController');
    Route::get('/deletenews/{id}', 'NewsController@deletenews');
    /* Message ========*/
    Route::get('message', 'MessageController@contactUs');
    Route::get('subscribe', 'MessageController@subscribe');
    Route::get('deletesubscribe/{id}', 'MessageController@deletesubscribe');
    /*Category=======*/
    Route::resource('category', 'CateoryController');
    Route::get('/deleteCat/{id}', 'CateoryController@deleteCat');

    /*User Groups=======*/
    Route::resource('usergroups', 'UsergroupsController');
    Route::get('/delgroup/{id}', 'UsergroupsController@delgroup');
    /*Menu=======*/
    Route::resource('menu', 'MenuController');
    Route::get('/delmenu/{id}', 'MenuController@delmenu');
    /*Admin=======*/
    Route::resource('admin', 'AdminController');
    Route::get('/delAdmin/{id}', 'AdminController@delAdmin');
    /*Level=======*/
    Route::resource('level', 'LevelController');
    Route::get('/delLevel/{id}', 'LevelController@delLevel');
    /*Special=======*/
    Route::resource('special', 'SpecializationController');
    Route::get('/deleteSpecial/{id}', 'SpecializationController@deleteSpecial');

    /*City=======*/
    Route::resource('city', 'CityController');
    Route::get('/delcity/{id}', 'CityController@delcity');
    Route::post('/getCity', 'CityController@getCity');
    Route::post('/getSubCity', 'CityController@getSubCity');
    /*CityState=======*/
    Route::resource('cityState', 'CityStateController');
    Route::get('/delCityState/{id}', 'CityStateController@delCityState');
    /*CityQuarter=======*/
    Route::resource('cityQuarter', 'CityQuarterController');
    Route::get('/delCityQuarter/{id}', 'CityQuarterController@delCityQuarter');

    /*Doctor=======*/
    Route::resource('doctor', 'DoctorController');
    Route::get('/delDoctor/{id}', 'DoctorController@delDoctor');
    /*Durgs=======*/
    Route::resource('drugs', 'DrugsController');
    Route::get('/delDrugs/{id}', 'DrugsController@delDrugs');
    /*Doctor Analyzes=======*/
    Route::resource('doctorAnalyzes', 'DoctorAnalyzesController');
    Route::get('/destroyAn/{id}', 'DoctorAnalyzesController@destroyAn');
    /*Doctor Analyzes=======*/
    Route::resource('doctorRadiation', 'DoctorRadiationController');
    Route::get('/destroyRation/{id}', 'DoctorRadiationController@destroyRation');
    /*Doctor Process=======*/
    Route::resource('doctorProcess', 'DoctorProcessController');
    Route::get('/destroyProcess/{id}', 'DoctorProcessController@destroyProcess');
    /*Doctor Diseases=======*/
    Route::resource('doctorDiseases', 'DoctorDiseasesController');
    Route::get('/destroyDiseases/{id}', 'DoctorDiseasesController@destroyDiseases');

    /*Patient=======*/
    Route::resource('patient', 'PatientController');
    Route::get('/delUser', 'PatientController@delUser');
    Route::get('/history/{id}', 'PatientController@history');
    Route::post('patientSearch', 'PatientController@patientSearch');
    Route::any('advancedSearch', 'PatientController@advancedSearch');
    /*PatientHistory=======*/
    Route::resource('patientHistory', 'PatientHistoryController');

    /*Reservations=======*/
    Route::resource('reservations', 'ReservationsController');
    Route::get('/delReservations/{id}', 'ReservationsController@delReservations');

    /*Processs List=======*/
    Route::resource('processList', 'ProcessListController');
    Route::get('/delprocessList/{id}', 'ProcessListController@delprocessList');
    Route::any('finishedList', 'ProcessListController@finishedList');

});

/*====Site Link==================================================*/
Route::group(['namespace' => 'Site'], function () {
    //All sit links
    Route::get('/', 'IndexController@index');
    Route::get('/page/{id}', 'IndexController@page');
    Route::get('/blogs', 'IndexController@blogs');
    Route::get('/blog/{id}', 'IndexController@blog');
    Route::get('/contact-us', 'IndexController@contactUs');
    Route::post('/contact-us', 'IndexController@contactForm');
    Route::get('/book', 'IndexController@book');

    //user
    Route::get('/signIn', 'UserController@signIn');
    Route::get('/signUp', 'UserController@signUp');
    Route::any('/doctorDashboard', 'UserController@doctorDashboard');
    Route::any('/doctorProfile', 'UserController@doctorProfile');
    Route::any('/editProfile/{id}', 'UserController@show');
    Route::post('/docProfile/{id}', 'UserController@update');

    //User Reigster
    Route::post('/usersave', 'UserController@store');

    Route::post('/home', 'UserController@login');

    Route::get('/userprofile/{id}', 'UserController@profile');

    //search
    Route::any('/search', 'IndexController@search');
//    Route::post('/search_states', 'IndexController@search_states')->name('search_states_');

    Route::get('/logoutuser', 'UserController@userlogout');

    Route::resource('/drugs', 'DrugsController');
    Route::resource('/analyzes', 'AnalyzesController');
    Route::resource('/radiations', 'RadiationsController');
    Route::resource('/processes', 'ProcessesController');

    Route::resource('/patients', 'PatientController');
    Route::get('/viewpatients/{id}', 'PatientController@index');
    Route::get('/addpatients', 'PatientController@create');
    Route::post('/storepatient', 'PatientController@store');
    Route::post('patientupdate/{id}', 'PatientController@updatepatient');


    Route::get('/history/{id}', 'PatientController@history');
    Route::get('/addhistory/{id}', 'PatientController@addhistory');
    Route::post('/storehistory/{id}', 'PatientController@storehistory');

    Route::resource('/reservations','ReservationsController');
    Route::get('/addreservation','ReservationsController@create');
    Route::post('updatereser/{id}', 'ReservationsController@update');
    Route::post('savereser', 'ReservationsController@store');

    Route::get('/Rotchta/{id}','RochtaController@index');
    Route::get('/Rotchtapatient/{id}','RochtaController@show');
    Route::get('/addrochta/{id}','RochtaController@addrochta');
    Route::post('/storerochta/{id}','RochtaController@storerochta');


    Route::get('addpatientrochta/{id}','RochtaController@addpatientrochta');
    Route::post('storerochtadata/{id}','RochtaController@storerochtadata');
    Route::get('viewrochta/{id}','RochtaController@viewrochta');

    Route::post('customsearch','IndexController@customsearch');


});
