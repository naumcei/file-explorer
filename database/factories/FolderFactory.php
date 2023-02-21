<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FolderFactory extends Factory
{
    protected $model = Folder::class;

    public function definition()
    {
        $name = 'Folder' . $this->faker->numerify;
        $folderIds = Folder::pluck('id')->toArray();
        $parent_id = $this->faker->randomElement($folderIds);

        return [
            'name' => $name,
            'parent_id' => $parent_id,
        ];
    }

    public function setRoot()
    {
        return $this->state(function (array $attributes) {
            return ['parent_id' => null];
        });
    }
}
