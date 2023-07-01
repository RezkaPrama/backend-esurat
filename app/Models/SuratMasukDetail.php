<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasukDetail extends Model
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
    public function suratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class);
    }
}
