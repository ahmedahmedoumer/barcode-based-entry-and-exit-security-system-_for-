<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\users;
use App\Models\user_detail;
use DB;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $admin_seeder= users::create([
                       'username'=>'admin',
                       'password'=>'admin',
                       'role'=>'1',
                       'status'=>'approved',
       ]);
       user_detail::create([
        'user_id'=> DB::getPdo()->lastInsertId(),
        'f_name' => 'ahmedin',
        'l_name' => 'ahmedin',
        'id_number' => 'admin',
        'phone_no' => '+251927970190',
        'email' => 'ahmedinoumer13@gmail.com',
        'image' => 'NULL',
        'sex'   =>'male',
       ]);


    }
}
