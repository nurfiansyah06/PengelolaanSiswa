<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nama_depan','nama_belakang','agama','jenis_kelamin','alamat','user_id','avatar'
    ];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('images/polos.jpg');
        }

        return asset('images/'.$this->avatar);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot('nilai')->withTimeStamps();
    }


}
