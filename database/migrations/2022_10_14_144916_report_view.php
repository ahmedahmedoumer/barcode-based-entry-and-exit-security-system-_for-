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
     * 
     */
    public function up()
    {
        \DB::statement("
        CREATE view report_view AS 
        SELECT 
        a.id,
        a.role,
        b.id_number,
        b.f_name,
        b.l_name,
        c.user_id AS user_id_week,
        d.user_id AS user_id_month,
        e.user_id AS user_id_year
       
 FROM 
 users AS a
 INNER JOIN user_details AS b ON a.id=b.user_id
 INNER JOIN weekly_absents AS c ON a.id=c.user_id
 INNER JOIN monthly_absents AS d ON a.id=c.user_id
 INNER JOIN yearly_absents AS e ON a.id=c.user_id;
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
