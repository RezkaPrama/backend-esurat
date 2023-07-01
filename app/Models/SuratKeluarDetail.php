<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluarDetail extends Model
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
    public function suratKeluar()
    {
        return $this->belongsTo(SuratKeluar::class);
    }
}
