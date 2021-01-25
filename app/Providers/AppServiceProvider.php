<?php

namespace App\Providers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LengthAwarePaginator::class, function($app, $values) {
            return new class(...array_values($values)) extends LengthAwarePaginator {
                protected $additional = [];

                public function additional($values){
                    $this->additional = is_string($values) ? func_get_args() : $values;
                    return $this;
                }

                public function toArray() {
                    return parent::toArray() + $this->additional;
                }

                public function policies($policies){
                    $policies = is_string($policies) ? func_get_args() : $policies;
                    $this->setCollection($this->getCollection()->policies($policies));
                    return $this;
                }

                protected function linkCollection()
                {
                    $this->appends(Request::all());
                    return collect($this->elements())->flatMap(function ($item) {
                        if (! is_array($item)) {
                            return [['url' => null, 'label' => '...', 'active' => false]];
                        }

                        return collect($item)->map(function ($url, $page) {
                            return [
                                'url' => $url,
                                'label' => $page,
                                'active' => $this->currentPage() === $page,
                            ];
                        });
                    })->prepend([
                        'url' => $this->previousPageUrl(),
                        'label' => 'Previous',
                        'active' => false,
                    ])->push([
                        'url' => $this->nextPageUrl(),
                        'label' => 'Next',
                        'active' => false,
                    ]);
                }
            };
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
