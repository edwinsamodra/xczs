<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AuthController, 
    DiseaseController, 
    DashboardController, 
    WebsiteController, 
    UserController, 
    posisi, 
    BranchController, 
    CompanyController,
    ProductController,
    KepesertaanController,
    ProviderController,
    PrivyController,
    MemberController,
    MedicineController,
    ProfileController,    
    SlaController,
    AsuransiController,
    TestController,
};

use App\Http\Controllers\ajax\ListKelurahanController;
use App\Http\Controllers\ajax\ChartController;
use App\Http\Controllers\RumahSakit\
{
    RumahSakitController,
    DataasuransiController,
    DataperusahaanController,
    PengaturanController,
    RegistrasiController
};
use App\Models\Asuransi;
use Monolog\Handler\Slack\SlackRecord;

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

// Web
Route::get('/', [WebsiteController::class,'home']);
Route::get('/about', [WebsiteController::class,'about']);
Route::get('/benefit', [WebsiteController::class,'benefit']);
Route::get('/contact', [WebsiteController::class,'contact']);



// Dashboard 
Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class,'customAuthenticate']);
Route::post('/logout', [AuthController::class,'logout'])->name('logout');
Route::post('/posisi', [posisi::class,'save']);
Route::get('/ajax/chart/claims', [ChartController::class,'claims']);



//Profile
Route::get('/profile', [DashboardController::class,'profile'])->name('profile')->middleware('auth'); // ->middleware('auth')

Route::get('/ajax/profile/current', [ProfileController::class,'getCurrentProfile'])->name('profile-current')->middleware('auth');

Route::get('/ajax/profile/branches', [ProfileController::class,'getBranches'])->name('profile-branches')->middleware('auth');
Route::get('/ajax/profile/companies', [ProfileController::class,'getCompanies'])->name('profile-mitra')->middleware('auth');
Route::get('/ajax/profile/members', [ProfileController::class,'getPesertaPerusahaan'])->name('profile-members')->middleware('auth');
Route::get('/ajax/profile/membersumum', [ProfileController::class,'getPesertaUmum'])->name('profile-membersumum')->middleware('auth');
Route::get('/ajax/profile/produkritel', [ProfileController::class,'getProdukRitel'])->name('profile-produkritel')->middleware('auth');
Route::get('/ajax/profile/produkkorporasi', [ProfileController::class,'getProdukRitel'])->name('profile-produkkorporasi')->middleware('auth');

Route::get('/ajax/branches/count', [BranchController::class,'ajaxBranchesCount'])->name('ajax-branches-count')->middleware('auth'); // ->middleware('auth')
Route::get('/ajax/companies/count', [CompanyController::class,'ajaxCompaniesCount'])->name('ajax-branches-count')->middleware('auth'); // ->middleware('auth')

Route::get('/ajax/members-corporate/count', [MemberController::class,'ajaxMembers_corporateCount'])->name('ajax-members-corporate-count')->middleware('auth'); // ->middleware('auth')
Route::get('/ajax/members-personal/count', [MemberController::class,'ajaxMembers_personalCount'])->name('ajax-members-personal-count')->middleware('auth'); // ->middleware('auth')

Route::get('/ajax/products-corporate/count', [ProductController::class,'ajaxProducts_corporateCount'])->name('ajax-products-corporate-count')->middleware('auth'); // ->middleware('auth')
Route::get('/ajax/products-retail/count', [ProductController::class,'ajaxProducts_retailCount'])->name('ajax-products-retail-count')->middleware('auth'); // ->middleware('auth')


// CABANG
Route::get('/cabang', [BranchController::class,'index'])->name('cabang')->middleware('auth');
Route::post('/cabang', [BranchController::class,'store'])->middleware('auth'); // add, update
Route::get('/cabang/{id}', [BranchController::class,'getBranch'])->middleware('auth'); // get one record
Route::get('/cabang/detail/{id}', [BranchController::class,'detail'])->middleware('auth');
Route::post('/cabang/delete', [BranchController::class,'deleteBranch'])->middleware('auth');
Route::get('/cabangprofile', [BranchController::class,'profileasuransi'])->middleware('auth');


// MITRA USAHA
Route::get('/mitrausaha', [CompanyController::class, 'index'])->name('mitrausaha')->middleware('auth'); // ->middleware('auth')
Route::post('/mitrausaha', [CompanyController::class,'store'])->middleware('auth'); // add, update
Route::post('/cabangmitra', [CompanyController::class,'storecabangmitra'])->middleware('auth'); // add, update
Route::get('/cabangmitra/{id}', [CompanyController::class,'cabang_perusahaan'])->name('cabang_perusahaan')->middleware('auth');
Route::get('/getcabangmitra/{id}', [CompanyController::class,'getCabangMitra'])->middleware('auth');
Route::get('/mitrausaha/{id}', [CompanyController::class,'getCompany'])->middleware('auth'); // get one record
Route::post('/cabangmitra/delete', [CompanyController::class,'deletecabangmitra'])->middleware('auth');
Route::get('/mitrausaha/detail/{id}', [CompanyController::class,'detail'])->middleware('auth'); // get one record
Route::post('/mitrausaha/delete', [CompanyController::class,'deleteCompany'])->middleware('auth');


// PRODUCT
Route::get('/produkasuransi', [ProductController::class, 'index'])->name('produkasuransi')->middleware('auth');
// Route::post('/produkasuransi', [ProductController::class, 'store'])->middleware('auth'); // add, update
// Route::post('/produkasuransi', [ProductController::class, 'storeTarif'])->middleware('auth'); // add, update
// Route::get('/produkasuransi/{id}', [ProductController::class,'getProduct'])->middleware('auth'); // get one record
// Route::get('/produkasuransi/{id}', [ProductController::class,'getTarif'])->middleware('auth'); // get one record
// Route::post('/produkasuransi/delete', [ProductController::class,'deleteProduct'])->middleware('auth');
// Route::post('/produkasuransi/deletetarif', [ProductController::class,'deleteTarif'])->middleware('auth');
Route::get('/detail/paket/{id}', [ProductController::class,'detail'])->name('detailpaket')->middleware('auth');
Route::get('/detailklas/{id}', [ProductController::class,'detailKelas'])->name('detailKelas')->middleware('auth');

Route::get('/ajax/products', [ProductController::class,'ajaxGetProducts'])->name('ajax-get-products')->middleware('auth');


// ASURANSI
Route::get('/asuransi', [DashboardController::class,'asuransi'])->name('asuransi')->middleware('auth'); 

Route::get('/perusahaan', [DashboardController::class,'blank'])->name('perusahaan')->middleware('auth'); 
Route::get('/datars', [DashboardController::class,'blank'])->name('datars')->middleware('auth'); 
Route::get('/datapklu', [DashboardController::class,'blank'])->name('datapklu')->middleware('auth'); 
Route::get('/verifikasi', [DashboardController::class,'blank'])->name('verifikasi')->middleware('auth'); 
Route::get('/billing', [DashboardController::class,'blank'])->name('billing')->middleware('auth'); 
Route::get('/klaim', [DashboardController::class,'blank'])->name('klaim')->middleware('auth'); 
Route::get('/verifklaim', [DashboardController::class,'blank'])->name('verifklaim')->middleware('auth'); 
Route::get('/kinerjaasuransi', [DashboardController::class,'blank'])->name('kinerjaasuransi')->middleware('auth'); 
Route::get('/kinerjapeserta', [DashboardController::class,'blank'])->name('kinerjapeserta')->middleware('auth'); 
Route::get('/kinerjaverifikasi', [DashboardController::class,'blank'])->name('kinerjaverifikasi')->middleware('auth'); 
Route::get('/kinerjapembyaran', [DashboardController::class,'blank'])->name('kinerjapembyaran')->middleware('auth'); 
Route::get('/kinerjaklaim', [DashboardController::class,'blank'])->name('kinerjaklaim')->middleware('auth'); 
Route::get('/privy', [DashboardController::class,'blank'])->name('kinerjaklaim')->middleware('auth'); 
Route::get('/provider', [DashboardController::class,'blank'])->name('kinerjaklaim')->middleware('auth'); 
Route::get('/riwayatpengobatan', [DashboardController::class,'blank'])->name('riwayatpengobatan')->middleware('auth');
Route::get('/dashboard', [DashboardController::class,'blank'])->name('dashboard1')->middleware('auth');



// DISEASE : DRUG DICTIONARY
Route::get('/diseases/obat', [MedicineController::class,'index'])->name('medicineIndex')->middleware('auth');
Route::get('/ajax/medicine/search', [MedicineController::class,'search'])->name('medicineSearch')->middleware('auth');
Route::get('/ajax/medicine/detail/{id}', [MedicineController::class,'getDetail'])->name('medicineDetail')->middleware('auth');

// disease 
Route::get('/diseases/webSearch', [DiseaseController::class,'webSearch'])->name('webSearch')->middleware('auth');
Route::get('/diseases/webInput', [DiseaseController::class,'webInput'])->name('diseaseInput')->middleware('auth');
Route::post('/diseases/webUpdate', [DiseaseController::class,'webUpdate'])->name('diseaseUpdate')->middleware('auth');
Route::post('/diseases/webSave', [DiseaseController::class,'webSave'])->name('diseaseSave')->middleware('auth');
Route::post('/diseases/add', [DiseaseController::class,'store'])->name('diseaseAdd')->middleware('auth');

// data wilayah

Route::get('/wilayah/kelurahan/{id}', [ListKelurahanController::class,'kelurahan'])->name('listkelurahan')->middleware('auth');
Route::get('/wilayah/list/kelurahan/', [ListKelurahanController::class,'list'])->name('listkelurahan')->middleware('auth');
   
// Keluarga Peserta 
Route::get('/keluarga-peserta', [MemberController::class,'indexkeluarga'])->name('keluarga-peserta')->middleware('auth');
Route::get('/indexkeluargapesertaperusahaan/{id}', [MemberController::class,'keluargapesertaPerusahaan'])->name('keluarga-peserta')->middleware('auth');
Route::get('/keluargapesertaperusahaan/{id}', [MemberController::class,'keluargapeserta'])->name('keluargapeserta-peserta')->middleware('auth');
Route::get('/ajax/member-relatives/{id}', [MemberController::class,'getMemberRelatives'])->middleware('auth'); // get one record
Route::post('/ajax/member-relatives/create', [MemberController::class,'storeMemberRelative'])->middleware('auth');
Route::get('/ajax/family-relationships', [MemberController::class,'getFamilyRelationships'])->middleware('auth');       


//Kepesertaan

Route::get('/ajax/kepesertaan/jkp', [KepesertaanController::class,'getJKP'])->name('getJKP')->middleware('auth');
Route::get('/ajax/kepesertaan/KK', [KepesertaanController::class,'getKK'])->name('getKK')->middleware('auth');
Route::get('/ajax/kepesertaan/istri', [KepesertaanController::class,'getistri'])->name('getistri')->middleware('auth');
Route::get('/ajax/kepesertaan/anak', [KepesertaanController::class,'getanak'])->name('getanak')->middleware('auth');
Route::get('/ajax/kepesertaan/lajang', [KepesertaanController::class,'getlajang'])->name('getlajang')->middleware('auth');

// Pendaftaran Peserta
Route::get('/kepesertaan', [KepesertaanController::class,'index'])->name('kepesertaan')->middleware('auth');
Route::get('/pesertaperusahaan/{id}', [MemberController::class,'pesertaPerusahaan'])->name('pesertaPerusahaan')->middleware('auth');

Route::get('/pendaftaranPeserta', [MemberController::class,'index'])->name('pendaftaranPeserta')->middleware('auth');
Route::get('/pendaftaranPeserta/{id}/', [MemberController::class,'getMember'])->middleware('auth'); // get one record
Route::post('/pendaftaranPeserta/upload', [MemberController::class,'uploadMemberData'])->name('uploadMemberData')->middleware('auth');
Route::post('/pendaftaranPeserta/delete', [MemberController::class,'deleteMember'])->name('deleteMember');

Route::get('/ajax/members/{id}', [MemberController::class,'getMember'])->middleware('auth'); // get one record
Route::post('/ajax/members', [MemberController::class,'store'])->middleware('auth');

        
// SLA
Route::get('/sla', [SlaController::class, 'index'])->name('sla')->middleware('auth'); // ->middleware('auth')
Route::get('/sla/member/{id}', [SlaController::class, 'getSlaMemberInfo'])->name('slaMemberInfo')->middleware('auth'); // ->middleware('auth')

Route::post('/asuransi', [AsuransiController::class, 'update']);

Route::get('/test', [TestController::class, 'index']);


//aplikasi rumah sakit statis

Route::get('/profileRS', [RumahSakitController::class,'index'])->name('profileRS')->middleware('auth');
Route::get('/dataAsuransi', [DataasuransiController::class,'index'])->name('dataAsuransi');
Route::get('/indexasuransi/{id}', [DataasuransiController::class,'indexasuransi'])->name('dataAsuransi');
Route::get('/dataPerusahaan', [DataperusahaanController::class,'index'])->name('dataPerusahaan');
Route::get('/pengaturan', [PengaturanController::class,'index'])->name('pengaturan');
Route::get('/registrasi', [RegistrasiController::class,'index'])->name('registrasi');
Route::get('/RScariPasien', [RegistrasiController::class,'cariPasien'])->name('pengaturan');
Route::get('/registrasi/Pasien', [RegistrasiController::class,'indexpasien'])->name('registrasi');
Route::get('/registrasi/tambah', [RegistrasiController::class,'tambah'])->name('registrasi');

Route::get('/ajax/company/packages', [CompanyController::class, 'getCompanyInsurancePackages']);
Route::get('/ajax/rumahsakit/{kodeKlinik}', [RumahSakitController::class, 'getKlinik']);

Route::get('/blank', [RumahSakitController::class, 'blank'])->name('blank');

Route::post('/rumahsakit', [RumahSakitController::class, 'store'])->name('rumahSakitStore');

Route::get('/ajax/kelurahan/{id}', [ListKelurahanController::class,'getKelurahan'])->name('getkelurahan')->middleware('auth');