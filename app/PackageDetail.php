<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageDetail extends Model
{
    protected $table = "packages_details";


    public function package()
    {
        return $this->belongsTo(Package::class);
    }

}
