<?php

use Illuminate\Database\Seeder;

class AccessTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

     // Make sure we're talking to the global database
      $_db = \Config::get('database.connections.globaldb.database');
      $table = $_db . ".accesstypes";

     // Make sure table is empty
      if (DB::table($table)->get()->count() == 0) {
          DB::table($table)->insert([
                                ['id' => 1, 'name' => 'Controlled'],
                                ['id' => 2, 'name' => 'OA_Gold'],
                                ['id' => 3, 'name' => 'Other_Free_To_Read'],
                             ]);
      }
    }
}
