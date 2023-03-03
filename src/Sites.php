<?php

namespace Ctroms\AlfredValet;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Valet\Site;

class Sites {

    protected $valetSite;

    public function __construct(Site $valetSite)
    {
        $this->valetSite = $valetSite;
    }

    public function getSites()
    {
        return $this->valetSite->links()
            ->merge($this->valetSite->parked());
    }

    public function search($query)
    {
        $sites = $this->getSites();

        $result = ($query == '*')
            ? $sites->sortBy('site')
            : $sites->filter(fn ($value) => Str::contains(Arr::get($value, 'site'), $query));

        return $result->sortBy('site');
    }
}
