<?php

namespace App\ModelFilters\Admin;

use EloquentFilter\ModelFilter;

class CardGroupFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function search($search)
    {
        return $this->where('name', 'like', '%' . $search . '%')
            ->orWhere('name_en', 'like', '%' . $search . '%');
    }

    public function color($color)
    {
        return $this->where('color', $color);
    }

    public function isPro($isPro)
    {
        switch ($isPro) {
            case 'yes':
                $this->where('is_pro', true);
                break;
            case 'no':
                $this->where('is_pro', false);
                break;
        }
    }

    public function status($status)
    {
        switch ($status) {
            case 'enable':
                $this->where('status', true);
                break;
            case 'disable':
                $this->where('status', false);
                break;
        }
    }
}
