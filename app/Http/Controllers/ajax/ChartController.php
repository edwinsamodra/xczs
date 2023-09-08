<?php

namespace App\Http\Controllers\ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Claim;

class ChartController extends Controller
{
    public function claims(Request $request)
    {
        $kodeUser = $request->session()->get('user')->kode_user;

        $result = DB::table('summary_stats')->select(
            'branches',
            'companies',
            'corporate_members',
            'personal_members',
            'retail_products',
            'corporate_products',
            'total_claims',
            'processing_claims',
            'verified_claims',
            'paid_claims'
        )->get();

        $stats = $result[0];
        $numBranches = $stats->branches;
        $numNonCorporateMembers = $stats->personal_members;
        $numCorporateMembers = $stats->corporate_members;
        $numCompanies = $stats->companies;
        $numProductsRetail = $stats->retail_products;
        $numProductsCorporate = $stats->corporate_products;

        $numClaims  = $stats->total_claims;
        $numVerifyingClaims = $stats->processing_claims;
        $numVerifiedClaims = $stats->verified_claims;
        $numPaidClaims = $stats->paid_claims;

        $numCompanies = $stats->companies;

        $data = [            
            'numBranches' => $numBranches,
            'numCompanies' => $numCompanies,
            'numNonCorporateMembers' => $numNonCorporateMembers,
            'numCorporateMembers' => $numCorporateMembers,
            'numProductsRetail' => $numProductsRetail,
            'numProductsCorporate' => $numProductsCorporate,
            'numClaims' => $numClaims,
            'numVerifyingClaims' => $numVerifyingClaims,
            'numVerifiedClaims' => $numVerifiedClaims,
            'numPaidClaims' => $numPaidClaims
        ]; 

        return response()->json($data);
    }
   
}
