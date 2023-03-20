<?php

namespace App\Models;

use Faker\Core\File;
use Illuminate\Http\File as HttpFile;
use Illuminate\Support\Facades\File as FacadesFile;

use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog
{
    public $title;
    public $slug;
    public $intro;
    public $body;
    public $date;
    public function __construct($title, $slug, $intro, $body, $date)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->intro = $intro;
        $this->body = $body;
        $this->date = $date;
    }

    public static function all()
    {
        return collect(FacadesFile::files(resource_path("blogs")))
            ->map(function ($files) {
                $obj = YamlFrontMatter::parseFile($files);
                return new Blog($obj->title, $obj->slug, $obj->intro, $obj->body(), $obj->date);
            })
            ->sortByDesc('date');
    }
    public static function find($slug)
    {
        $blogs = static::all();
        return $blogs->firstWhere('slug', $slug);
    }
}
