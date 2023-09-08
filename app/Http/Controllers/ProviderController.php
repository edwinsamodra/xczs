<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Provider;
use App\Models\ProviderCategory;
use App\Models\PartnershipScheme;

class ProviderController extends Controller
{
    private $table = 'providers';

    public function index(Request $request)
    {
        $kodeUser = $request->session()->get('user')->kode_user;

        $keyword = $request->keyword;
        $providerCategory = $request->providerCategory;

        $providers = DB::table('providers')
            ->select(
                'providers.id as id',
                'providers.kode_user as kode_user',
                'providers.nama as nama_provider',
                'providers.alamat as alamat',
                'providers.nomor_telepon as nomor_telepon',
                'providers.contact_person as contact_person',
                DB::raw('(CASE WHEN providers.is_active = 1 THEN "Aktif" ELSE "Non-aktif" END) AS is_active'),
                'partnership_schemes.name as partnership',
                'provider_categories.name as provider_category')
            ->join('partnership_schemes','providers.id_partnership_scheme', '=' , 'partnership_schemes.id')
            ->join('provider_categories', 'providers.id_provider_category', '=' , 'provider_categories.id')
            ->where('providers.kode_user', $kodeUser)
            ->when($keyword, function($query, $keyword){
                $query->where('providers.nama', 'like', '%' . $keyword . '%');
            })
            ->when($providerCategory, function($query, $providerCategory){
                $query->where('providers.id_provider_category', '=', $providerCategory);
            })
            ->orderBy('providers.id', 'desc')
            ->paginate(5);
            // ->toSql();

            //dd($providers);
            // ->paginate(10);

        $providerCategories = ProviderCategory::get_all();
        $partnershipSchemes = PartnershipScheme::get_all();

        return view('hiss/provider/index',[
            'providers' => $providers,
            'providerCategories' => $providerCategories,
            'partnershipSchemes' => $partnershipSchemes,
        ]);
    }

    public function detail(Request $request)
    {
        $kodeUser = $request->session()->get('user')->kode_user;
        $id = $request->id;

        $providers = DB::table('providers')
            ->select(
                'providers.id as tid',
                'providers.nama as nama_provider',
                'providers.alamat as alamat',
                'providers.nomor_telepon as nomor_telepon',
                'providers.contact_person as contact_person',
                DB::raw('(CASE WHEN providers.is_active = 1 THEN "Aktif" ELSE "Non-aktif" END) AS is_active'),
                DB::raw('(CASE WHEN providers.id_partnership_scheme = 1 THEN "Perjanjian Kerjasama" ELSE "Kerjasama Tripartit" END) AS partnership'),
                DB::raw('(CASE WHEN providers.id_provider_category = 1 THEN "Rumah Sakit" providers.id_provider_category = 2 THEN "Klinik" ELSE "Lab/MCU" END) AS `categori`'))
            ->where('providers.kode_user', $kodeUser)
            ->find($id);
                return response()->json($providers);
    }


    public function store(Request $request)
    {        
        $idProvider = $request->frmDataProvider_id;
        $kodeUser = $request->session()->get('user')->kode_user;

        if ($idProvider == 0)
        {
            $provider = new Provider;
            $provider->is_active = 0;
        } else {
            $provider = Provider::find($idProvider);
        }

        
        $provider->nama                     = $request->nama;
        $provider->kode_user                = $kodeUser;
        $provider->alamat                   = $request->alamat;
        $provider->nomor_telepon            = $request->nomor_telepon;
        $provider->contact_person           = $request->contact_person;
        $provider->id_partnership_scheme    = $request->id_partnership_scheme;
        $provider->id_provider_category     = $request->id_provider_category;
        $provider->is_active                = $request->is_active;

        if ($provider->save())
        {
            $arr = [
                'error' => 0,
                'message' => 'Data telah disimpan'
            ];
        } else {
            $arr = [
                'error' => 1,
                'message' => 'Data gagal disimpan'
            ];
        }

        return response()->json($arr);
    }


    public function getProvider(Request $request)
    {
        $idProvider = $request->id;
        $provider = Provider::find($idProvider);
        return response()->json($provider);
    }


    public function deleteProvider(Request $request)
    {
        $idProvider = $request->id;
        $provider = Provider::find($idProvider);
        $arr = [];
        if ($provider->delete() > 0)
        {
            $arr['error'] = 0;
            $arr['message'] = 'Data telah sukses dihapus';
        } else {
            $arr['error'] = 1;
            $arr['message'] = 'Data gagal dihapus';
        }
        return response()->json($arr);
    }
}
