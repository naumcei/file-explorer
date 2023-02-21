<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class FileExplorerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'file-explorer:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a specific number of folder';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('-------File Explorer-------');

        $numberOfRootFolders = $this->ask('Please enter the number of root folder');
        if (is_numeric($numberOfRootFolders) === false || $numberOfRootFolders < 0) {
            throw new \InvalidArgumentException('Invalid root folder number!');
        }

        $numberOfFolders = $this->ask('Please enter the number of folder');
        if (is_numeric($numberOfFolders) === false || $numberOfFolders < 0) {
            throw new \InvalidArgumentException('Invalid folder number!');
        }

        $numberOfFiles = $this->ask('Please enter the number of files');
        if (is_numeric($numberOfFiles) === false || $numberOfFolders < 0) {
            throw new \InvalidArgumentException('Invalid files number!');
        }

        if ($this->confirm('Do you want to proceed?')) {
            for ($i = 0; $i < $numberOfRootFolders; $i++) {
                Artisan::call('db:seed', ['--class' => 'RootFolderSeeder']);
            }

            for ($i = 0; $i < $numberOfFolders; $i++) {
                Artisan::call('db:seed', ['--class' => 'FolderSeeder']);
            }

            for ($i = 0; $i < $numberOfFiles; $i++) {
                Artisan::call('db:seed', ['--class' => 'FileSeeder']);
            }
        } else {
            $this->info('File explorer exited!');
        }
    }
}
