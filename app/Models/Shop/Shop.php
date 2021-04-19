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
        'email',
        'shop_type_id',
        'theme_id'
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

    public function categories(){
        return $this->hasMany(Category::class);
    }

    public function type(){
        return $this->belongsTo(ShopType::class,'shop_type_id');
    }
    public function settings(){
        return $this->hasOne(ShopSettings::class);
    }

    public function theme(){
        return $this->belongsTo(Theme::class);
    }
    public function getTheme(){
        return $this->theme ?? Theme::where('type',Theme::BLOCK_TYPE)->first();
    }

}
