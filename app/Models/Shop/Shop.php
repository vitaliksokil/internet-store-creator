<?php

namespace App\Models\Shop;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'name',
        'slug',
        'description',
        'img',
        'address',
        'phone_number',
        'email'
    ];

    const FILE_PATH = 'shops';

    public function getAvatarsFilePath(){
        return self::FILE_PATH.'/'.$this->id.'/avatars';
    }
    public function getImgAttribute($value){
        return '/storage/'.$value;
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }
    public function getSiteUrl(){
        return config('app.url').'/'.$this->slug;
    }

}
