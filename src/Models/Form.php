<?php

namespace MohRajab\NovaForms\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['name'];

    public function entries()
    {
        return $this->hasMany(FormEntry::class);
    }
}
