<?php

namespace MohRajab\NovaForms\Models;

use Illuminate\Database\Eloquent\Model;

class FormEntry extends Model
{
    protected $fillable = ['data', 'form_id'];

    protected $casts = [
        'data' => 'array'
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
