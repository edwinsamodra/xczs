<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UsersSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        $user = User::create([
            'email' => 'admin@d-mcare.id',
            'password' => Hash::make('1234'),
            'name' => 'Administrator',
            'kode_user' => '1',
        ]);

        $user = User::create([
            'email' => 'operator@d-mcare.id',
            'password' => Hash::make('1234'),
            'name' => 'Operator',
            'kode_user' => '2',
        ]);

        $cs = User::create([
            'email' => 'irwan@d-mcare.id',
            'password' => Hash::make('1234'),
            'name' => 'Irwan Setiawan',
            'kode_user' => '3',
        ]);

        $user->roles()->attach(Role::where('slug', 'admin')->first());
        $cs->roles()->attach(Role::where('slug', 'customer')->first());
    }
}
