<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DmcareCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dmcare:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update summary table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('BEGIN SUMMARY_STATS TABLE UPDATE');

        $users = DB::table('dd_user')->select('kode_user','username')->get();
        foreach($users as $user){
            $kodeUser   = $user->kode_user;
            $username   = $user->username;

            // cek apakah kode user ada di tabel summary_stats
            // kalau belum, insert data kosong
            // kalau sudah, update isi tabel summary_stats

            $numBranches = $this->getTotal('branches', $kodeUser);
            $numCompanies = $this->getTotal('companies', $kodeUser);
            $numPersonalMembers = $this->getTotalMembers($kodeUser, 'personal');
            $numCorporateMembers = $this->getTotalMembers($kodeUser, 'corporate');
            $numRetailProducts = $this->getTotalProducts($kodeUser, 'retail');
            $numCorporateProducts = $this->getTotalProducts($kodeUser, 'corporate');

            $numClaimsUnverified = $this->getTotalClaims($kodeUser, 1);
            $numClaimsVerifying = $this->getTotalClaims($kodeUser, 2);
            $numClaimsVerified = $this->getTotalClaims($kodeUser, 3);
            $numClaimsPaid = $this->getTotalClaims($kodeUser, 4);

            $numTotalClaims = $numClaimsUnverified + $numClaimsVerifying + $numClaimsVerified + $numClaimsPaid;

            $affected = DB::table('summary_stats')
              ->where('kode_user', $kodeUser)
              ->update(
                [
                    'branches' => $numBranches,
                    'companies' => $numCompanies,
                    'corporate_members' => $numCorporateMembers,
                    'personal_members' => $numPersonalMembers,
                    'retail_products' => $numRetailProducts,
                    'corporate_products' => $numCorporateProducts,
                    'total_claims' => $numTotalClaims,
                    'paid_claims' => $numClaimsPaid,
                    'verified_claims' => $numClaimsVerified,
                    'processing_claims' => $numClaimsUnverified
                ]
            );

            Log::info($kodeUser . ' | ' . $numBranches . ' | ' . $numCompanies . ' | ' . $numPersonalMembers . ' | ' . $numCorporateMembers . ' | ' . $numRetailProducts . ' | ' . $numCorporateProducts);
        }

        // $this->info('The command was successful!');
        // $this->newLine(1);

        Log::info('END SUMMARY_STATS TABLE UPDATE');

        return Command::SUCCESS;            

    }
}
