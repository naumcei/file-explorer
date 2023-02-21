<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_id',
    ];

    /**
     * Get the files for the folder.
     */
    public function files()
    {
        return $this->hasMany(File::class);
    }

    /**
     * Get the parent folder for the folder.
     */
    public function parent()
    {
        return $this->belongsTo(Folder::class, 'parent_id');
    }

    /**
     * Get the child folder for the folder.
     */
    public function children()
    {
        return $this->hasMany(Folder::class, 'parent_id');
    }
}
