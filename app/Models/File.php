<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'folder_id',
        'size',
        'path',
    ];

    /**
     * Get the folder that owns the file.
     */
    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
