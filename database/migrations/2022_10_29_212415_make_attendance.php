<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
        CREATE VIEW make_attendance 
        AS SELECT 
         a.id,
         b.id_number, 
         b.f_name, 
         b.l_name,
         b.phone_no,
         b.department,
         b.Batch,b.email,
         b.image,b.section,
         c.get_out_time, 
         c.get_in_time , c.status
          FROM users a
           join user_details b on a.id = b.user_id
           join attendance_detail c on a.id = c.user_id  ;
           ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
