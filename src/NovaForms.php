<?php

namespace MohRajab\NovaForms;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;
use MohRajab\NovaForms\Nova\FormEntry;
use MohRajab\NovaForms\Nova\Form;

class NovaForms extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */

    public $resources = [Form::class,FormEntry::class];

    private static $templates = [];

    public function boot()
    {
        Nova::script('nova-forms', __DIR__ . '/../dist/js/tool.js');
        Nova::style('nova-forms', __DIR__ . '/../dist/css/tool.css');

        Nova::resources($this->resources);
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('nova-forms::navigation');
    }

    public function setResource($resources)
    {
        $this->resources = $resources;
        return $this;
    }
}
