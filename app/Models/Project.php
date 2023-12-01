<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Project extends Model
{
    use HasFactory;

    public function technology() {
        return $this->belongsTo(Technology::class);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public static function generateSlug($string) {
        $slug = Str::slug($string, '-');
        $original_slug = $slug;

        $exists = Project::where('slug', $slug)->first();
        $c = 1;

        while ($exists) {
            $slug = $original_slug .'-'. $c;
            $exists = Project::where('slug', $slug)->first();
            $c++;
        }

        return $slug;
    }

    protected $fillable = ['title', 'slug', 'description', 'technology_id', 'type_id', 'link', 'image', 'image_original_name'];
}
