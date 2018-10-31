<?php

namespace App;

use App\PackageDetail;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['file'];

    public function packagesdetails()
    {
        return $this->hasMany(PackageDetail::class);
    }
}
