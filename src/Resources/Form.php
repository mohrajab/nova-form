<?php

namespace MohRajab\NovaForms\Nova;

use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Resource;
use MarkRassamni\InlineBoolean\InlineBoolean;
use Benjaminhirsch\NovaSlugField\Slug;

class Form extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \MohRajab\NovaForms\Models\Form::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('name')
                ->rules('required'),

            Slug::make('Slug')
                ->help("This text will appear in the url!")
                ->onlyOnForms()
                ->creationRules("required", 'unique:forms,slug', 'max:254')
                ->updateRules("required", 'unique:forms,slug,{{resourceId}}', 'max:254'),

            InlineBoolean::make('Mailable')
                ->inlineOnIndex()
                ->inlineOnDetail()
                ->enableMessage('Mail has been enabled.')
                ->disableMessage('Mail has been disabled.')
                ->trueText('Enabled')
                ->falseText('Disabled')
                ->showTextOnIndex(),

            Text::make('Entries Count', function () {
                return $this->entries()->count();
            }),

            HasMany::make('Entries', 'entries', FormEntry::class)
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
