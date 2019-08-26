<?php

namespace MohRajab\NovaForms\Models;

use Illuminate\Database\Eloquent\Model;

class FormEmail extends Model
{
    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
