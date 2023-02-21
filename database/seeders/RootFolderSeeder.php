<?php

namespace Database\Seeders;

use App\Models\Folder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RootFolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            //Seed root directory
            Folder::factory()->setRoot()->create();

            // Commit the transaction
            DB::commit();
        } catch (\Exception $e) {
            // Roll back the transaction if an error occurs
            DB::rollback();
            throw $e;
        }
    }
}
