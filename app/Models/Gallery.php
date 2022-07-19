<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;


    public function getImageLinkAttribute() {
        if($this->name) {
            return asset("uploads/$this->name");
        }

        return null;
    }
}
