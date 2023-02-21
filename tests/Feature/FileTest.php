<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\File;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FileTest extends TestCase
{
    public function test_if_file_exists_on_file_system()
    {
        $file = File::all()->random();
        $path = storage_path() . '/app/public' . $file->path;

        $this->assertFileExists($path);
    }

    public function test_if_file_has_content()
    {
        $file = File::all()->random();
        $content = Storage::disk('public')->get($file->path);

        $this->assertNotEmpty($content);
    }
}
