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
    public $fillable = [
        'id',
        'no_surat',
        'jenis_surat',
        'tanggal_penerimaan',
        'no_agenda',
        'tanggal_surat',
        'asal_surat',
        'tujuan_surat',
        'perihal'
    ];

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
