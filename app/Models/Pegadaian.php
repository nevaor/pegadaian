<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Respon;


class Pegadaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'age',
        'phone_number',
        'item',
        'nik',
        'item_photo',
    ];

    public function response ()
    {
        //hashone : one to one
        // table yang berperan sebagai PK
        // nama fungsi == nama model FK
        return $this->hasOne
        (Respon::class);
    }
}
