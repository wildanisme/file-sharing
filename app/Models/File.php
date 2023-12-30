<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $table ='file';

    public function incrementViews(){
        return $this->increment('views', 1);
    }

    public function incrementDownloads(){
        return $this->increment('downloads', 1);
    }
}
