<?php

namespace App\Providers;
 
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\Services\MyTrait; 

class AuthServiceProvider extends ServiceProvider
{
  
   use MyTrait; 
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    View::composer('adminlayoutenseignant.footer', function ($view) {
            // Fetch data from the API
            $response = Http::get($this->getUrlServer().'/variable');
            $variable = json_decode($response);  // Assuming the response body is JSON

            // Pass the data to the view
            $view->with('variable', $variable);
        });
    }
}

