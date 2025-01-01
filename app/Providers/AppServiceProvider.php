<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel's default home route.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * This namespace is applied to your controller routes.
     *
     * It is set to the namespace of your application.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot(): void
    {
        parent::boot();
    }

    /**
     * Define the routes for your application.
     *
     * @return void
     */
    public function map(): void
    {
        $this->mapWebRoutes();
        $this->mapApiRoutes();
        // If you have more custom routes like admin, you can map them here
        // $this->mapAdminRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes are typically used for web pages, sessions, authentication, etc.
     *
     * @return void
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically used for API calls.
     *
     * @return void
     */
    protected function mapApiRoutes(): void
    {
        Route::prefix('api') // This prefix is added to all API routes
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * You can define more custom route groups, such as admin or other APIs.
     */
    // protected function mapAdminRoutes(): void
    // {
    //     Route::prefix('admin')
    //         ->middleware('admin')
    //         ->namespace($this->namespace)
    //         ->group(base_path('routes/admin.php'));
    // }
}