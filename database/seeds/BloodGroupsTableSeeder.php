<?php

use Carbon\Carbon;
use App\Library\Utilities;
use App\Models\TblBloodGroups;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bloodGroups = ["A+" => "A RhD positive" ,
        "A-" => "A RhD negative" ,
        "B+" => "B RhD positive" ,
        "B-" => "B RhD negative" ,
        "O+" => "O RhD positive" ,
        "O-" => "O RhD negative" ,
        "AB+" => "AB RhD positive" ,
        "AB-" => "AB RhD negative"];

        foreach ($bloodGroups as $key => $value) {
            DB::table('blood_groups')->insert([
                'blood_group_id' => Utilities::uuid(),
                'blood_group_code' => $key,
                'blood_group_name' => $value,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]);
        }
    }
}
