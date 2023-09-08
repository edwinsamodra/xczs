<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Privy;


class PrivyController extends Controller
{
    public function index(Request $request)
    {
        $kodeUser = $request->session()->get('user')->kode_user;

        $membershipType = $request->membershipType;
        $keyword = $request->keyword;

        $privyMembers = DB::table('privy_members')
            ->select(
                'privy_members.id as id',
                'privy_members.nama as nama',
                'privy_members.alamat as alamat',
                'privy_members.tanggal_lahir as tanggal_lahir',
                DB::raw('(CASE WHEN privy_members.jenis_kelamin = 1 THEN "L" ELSE "P" END) AS jenis_kelamin'),
                'privy_members.nomor_polis as nomor_polis',
                'privy_members.membership_type as membership_type')
            ->where('privy_members.kode_user', $kodeUser)
            ->when($keyword, function($query, $keyword){
                $query->where('privy_members.nama', 'like', '%' . $keyword . '%');
            })
            ->when($membershipType, function($query, $membershipType){
                $query->where('privy_members.membership_type', '=', $membershipType);
            })
            ->orderBy('privy_members.id', 'desc')
            ->paginate(5);

        return view('hiss/privy/index',[
            'privyMembers' => $privyMembers,
            'membershipType' => $membershipType,
            'keyword' => $keyword
        ]);
    }


    public function store(Request $request)
    {
        $id = $request->frmDataPrivy_id;
        $kodeUser = $request->session()->get('user')->kode_user;

        if ($id == 0)
        {
            $record = new Privy;
        } else {
            $record = Privy::find($id);
        }

        $record->kode_user                = $kodeUser;
        $record->nama                     = $request->nama;
        $record->alamat                   = $request->alamat;
        $record->tanggal_lahir            = $request->tanggal_lahir;
        $record->jenis_kelamin           = $request->jenis_kelamin;
        $record->nomor_polis    = $request->nomor_polis;
        $record->membership_type     = $request->membership_type;

        if ($record->save())
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


    public function getOne(Request $request)
    {
        $id = $request->id;
        $returnValue = Privy::find($id);
        return response()->json($returnValue);
    }


    public function deleteOne(Request $request)
    {
        $id = $request->id;
        $privy = Privy::find($id);
        $arr = [];
        if ($privy->delete() > 0)
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
