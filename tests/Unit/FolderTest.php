<?php

namespace Tests\Unit;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FolderTest extends TestCase
{
    public function test_it_can_create_a_root_folder()
    {
        $folder = Folder::factory()->setRoot()->create();

        $this->assertDatabaseHas('folders', [
            'id' => $folder->id,
            'parent_id' => null,
        ]);
    }

    public function test_it_can_create_a_folder()
    {
        $folder = Folder::factory()->create();

        $this->assertDatabaseHas('folders', [
            'id' => $folder->id,
            'parent_id' => $folder->parent_id,
        ]);
    }

}
