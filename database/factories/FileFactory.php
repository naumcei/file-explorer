<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    protected $model = File::class;

    public function definition()
    {
        $folderIds = Folder::pluck('id')->toArray();
        $folderId = $this->faker->randomElement($folderIds);
        $file = $this->faker->filePath() . '.log';
        $name = explode('/', $file);
        Storage::disk('public')->put($file, $this->faker->text);

        return [
            'name' => end($name),
            'folder_id' => $folderId,
            'size' => Storage::disk('public')->size($file),
            'path' => $file,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
