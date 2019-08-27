<?php

namespace MohRajab\NovaForms\Models;

use Illuminate\Database\Eloquent\Model;

class FormEntry extends Model
{
    protected $fillable = ['data', 'form_id'];

    protected static function boot()
    {
        parent::boot();

        self::saved(function (self $model) {
            if (self::count() > 1)
                return;

            $model->form->update(['inputs' => array_keys($model->data)]);
        });
    }

    protected $casts = [
        'data' => 'array'
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
