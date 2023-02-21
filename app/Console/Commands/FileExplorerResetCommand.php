<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileExplorerResetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file-explorer:reset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resets the file explorer application';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        if ($this->confirm('Do you want to proceed?')) {
            Storage::disk('public')->deleteDirectory('/tmp');

            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            DB::table('folders')->truncate();
            DB::table('files')->truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}
