<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

     /**
     * guarded
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * detail
     *
     * @return void
     */
    public function suratMasukDetail()
    {
        return $this->hasMany(SuratMasukDetail::class);
    }
}
