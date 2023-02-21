<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileSeeder extends Seeder
{
    public function run(): void
    {
        DB::beginTransaction();

        try {
            // Seed users table with
            File::factory()->create();

            // Commit the transaction
            DB::commit();
        } catch (\Exception $e) {
            // Roll back the transaction if an error occurs
            DB::rollback();
            throw $e;
        }
    }
}
