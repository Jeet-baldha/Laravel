<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use phpDocumentor\Reflection\Types\This;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

class Post
{
    public $title;
    public $slug;
    public $excert;
    public $date;
    public $body;

    public function __construct($title, $slug, $excert, $date, $body)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->excert = $excert;
        $this->date = $date;
        $this->body = $body;
    }

    public static function all()
    {
        $files = file::files(resource_path("/posts/"));

        return cache()->rememberForever('post.all', function () use ($files) {
            return collect($files)->map(function ($file) {
                $doc = YamlFrontMatter::parseFile($file);
                return new Post(
                    $doc->matter("title"),
                    $doc->matter("slug"),
                    $doc->matter("excert"),
                    $doc->matter("date"),
                    $doc->body()
                );
            })->sortBy('date');
        });


    }
    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }
}

?>