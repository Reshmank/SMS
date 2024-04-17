<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendor_Category;
use DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::statement('TRUNCATE TABLE vendor_category');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        DB::table('vendor_category')->insert([
            ['catgory_name' => 'Electrical','created_by' => 1,'updated_by' => 1,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['catgory_name' => 'Hardware','created_by' => 1,'updated_by' => 1,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
            ['catgory_name' => 'Machines','created_by' => 1,'updated_by' => 1,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],  
        ]);

    }
}
