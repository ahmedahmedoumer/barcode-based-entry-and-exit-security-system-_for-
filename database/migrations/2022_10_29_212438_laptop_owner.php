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
        CREATE VIEW laptop_owner  
        AS SELECT 
        a.id , 
        a.role , 
        b.id_number ,
        b.f_name , 
        b.l_name , 
        b.department,
         b.email,
          b.phone_no ,
          b.Batch ,
          b.image ,
          c.serial_number,
          c.laptop_name,
           c.laptop_detail ,
            c.laptop_image,
             c.status 
             FROM users a 
             join user_details b on a.id = b.user_id
              join laptop_details c on a.id = c.owner_id  ;
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
