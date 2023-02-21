<?php

namespace Tests\Unit;

use App\Models\File;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FileTest extends TestCase
{
    public function test_it_can_create_a_file()
    {
        $file = File::factory()->create();

        $this->assertDatabaseHas('files', [
            'id' => $file->id,
            'name' => $file->name,
            'folder_id' => $file->folder_id,
            'size' => $file->size,
            'path' => $file->path,
            'created_at' => $file->created_at,
            'updated_at' => $file->updated_at,
        ]);
    }
}
