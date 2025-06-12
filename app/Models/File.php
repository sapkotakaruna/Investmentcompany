<?php

namespace App\Models;

use App\Facades\ViewHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class File extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'title',
        'nepali_title',
        'slug',
        'file_type',
        'rank',
        'file',
        'link',
        'excerpt',
        'status',
    ];
    public function image_path()
    {
        if (isset($this->file)) {
            return
                $this->file ? asset('images/file/' . $this->file) : null;
        } else {

            dd($this->link);
            return $this->link;
        }
    }
    public function image_path_withAsset()
    {
        if (isset($this->file)) {
            return ViewHelper::getImagePath('file', $this->file);
        } else {
            return $this->link;
        }
        // return 
        //  $this->file ? asset('images/file/' . $this->file) : null;
    }
    public function video_link()
    {
        $data = null;
        $you_url = 'https://www.youtube.com/oembed?url=' . $this->link . '';
        $data = null;
        try {
            $res_you = Http::timeout(15)->get($you_url);
            $response = $res_you->json();
            $data = $response['html'];
        } catch (\Exception $e) {
        }
        return $data;
    }
}
