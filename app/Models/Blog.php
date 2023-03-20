<?php

namespace App\Models;

use Faker\Core\File;
use Illuminate\Support\Facades\File as FacadesFile;

class Blog
{
    public static function all()
    {
        $files=FacadesFile::files(resource_path("blogs"));
        $blogs=array_map(function($file){
            return $file->getContents("blogs");
        },$files);  
        return $blogs;      
    }
    public static function find($slug)
    {
        $path=resource_path("blogs/$slug.html");
        if (!file_exists($path)) {
            return redirect('/');
        }
        return cache()->remember('posts.$slug', 5, function () use ($path) {
            return file_get_contents($path);
        });
    }
}
