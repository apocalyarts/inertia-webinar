<?php

namespace App\Foundation\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Gate;

trait ChecksPolicies {

    private $policies = [];

    public function policies($policies){
        $this->policies = is_string($policies) ? func_get_args() : $policies;
        return $this;
    }

    public function toArray(){
        return array_merge(parent::toArray(), ['allows' => $this->policiesToArray()]);
    }

    private function policiesToArray(){
        return collect($this->policies)->mapWithKeys(fn($a) => [$a => Gate::allows($a, $this)])->all();
    }

    public function newCollection(array $models = []){
        return new PolicyCollection($models);
    }
}

class PolicyCollection extends Collection {
    public function policies($policies){
        return $this->each->policies($policies);
    }
}