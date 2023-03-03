<?php

namespace Ctroms\AlfredValet;

use Illuminate\Support\Arr;

class Site
{
    public $title;
    public $subtitle;
    public $arg;

    public function __construct($site)
    {
        $this->title = Arr::get($site, 'site');
        $this->subtitle = $this->subtitle($site);
        $this->arg = implode(',', [
            'url' => Arr::get($site, 'url'),
            'path' => Arr::get($site, 'path'),
        ]);
    }

    public function subtitle($site)
    {
       $subtitle = '';

       // Show lock emoji if the site is secured
       if (! empty(Arr::get($site, 'secured'))) {
            $subtitle .= "\u{1F512} | ";
       }

       $subtitle .= Arr::get($site, 'phpVersion')." | ".Arr::get($site, 'path');

       return $subtitle;
    }
}
