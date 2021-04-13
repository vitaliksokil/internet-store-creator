<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'branding_color',
        'branding_second_color',
        'admin_menu_item_active_bg_color',
        'admin_menu_item_active_color',
        'admin_header_bg_color',
        'admin_header_color',
        'admin_tables_bg_color',
        'admin_tables_color',
        'shop_bg',
        'shop_bg_color',
    ];
}
