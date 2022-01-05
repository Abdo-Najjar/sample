<?php

namespace App\Providers;

use DigitalCreative\CollapsibleResourceManager\CollapsibleResourceManager;
use DigitalCreative\CollapsibleResourceManager\Resources\TopLevelResource;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            // new Help,
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new CollapsibleResourceManager([
                'disable_default_resource_manager' => true, // default
                'remember_menu_state' => false, // default
                'navigation' => [
                    TopLevelResource::make([
                        'expanded'  => false,
                        'linkTo'    => \App\Nova\User::class,
                        'icon'      => ' <svg fill="white" stroke="white" flood-color="white" lighting-color= "white" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 460.8 460.8" style="enable-background:new 0 0 460.8 460.8;" xml:space="preserve"><g>                            <g>                                <path d="M230.432,0c-65.829,0-119.641,53.812-119.641,119.641s53.812,119.641,119.641,119.641s119.641-53.812,119.641-119.641                                    S296.261,0,230.432,0z"/>                            </g>                        </g>                        <g>                            <g>                                <path d="M435.755,334.89c-3.135-7.837-7.314-15.151-12.016-21.943c-24.033-35.527-61.126-59.037-102.922-64.784                                    c-5.224-0.522-10.971,0.522-15.151,3.657c-21.943,16.196-48.065,24.555-75.233,24.555s-53.29-8.359-75.233-24.555                                    c-4.18-3.135-9.927-4.702-15.151-3.657c-41.796,5.747-79.412,29.257-102.922,64.784c-4.702,6.792-8.882,14.629-12.016,21.943                                    c-1.567,3.135-1.045,6.792,0.522,9.927c4.18,7.314,9.404,14.629,14.106,20.898c7.314,9.927,15.151,18.808,24.033,27.167                                    c7.314,7.314,15.673,14.106,24.033,20.898c41.273,30.825,90.906,47.02,142.106,47.02s100.833-16.196,142.106-47.02                                    c8.359-6.269,16.718-13.584,24.033-20.898c8.359-8.359,16.718-17.241,24.033-27.167c5.224-6.792,9.927-13.584,14.106-20.898                                    C436.8,341.682,437.322,338.024,435.755,334.89z"/>                            </g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g></g><g></g><g></g><g></g></svg>'
                    ]),
                    TopLevelResource::make([
                        'expanded'  => false,
                        'linkTo'    => \App\Nova\Category::class,
                        'icon'      => ' <svg fill="white" stroke="white" flood-color="white" lighting-color= "white" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 460.8 460.8" style="enable-background:new 0 0 460.8 460.8;" xml:space="preserve"><g>                            <g>                                <path d="M230.432,0c-65.829,0-119.641,53.812-119.641,119.641s53.812,119.641,119.641,119.641s119.641-53.812,119.641-119.641                                    S296.261,0,230.432,0z"/>                            </g>                        </g>                        <g>                            <g>                                <path d="M435.755,334.89c-3.135-7.837-7.314-15.151-12.016-21.943c-24.033-35.527-61.126-59.037-102.922-64.784                                    c-5.224-0.522-10.971,0.522-15.151,3.657c-21.943,16.196-48.065,24.555-75.233,24.555s-53.29-8.359-75.233-24.555                                    c-4.18-3.135-9.927-4.702-15.151-3.657c-41.796,5.747-79.412,29.257-102.922,64.784c-4.702,6.792-8.882,14.629-12.016,21.943                                    c-1.567,3.135-1.045,6.792,0.522,9.927c4.18,7.314,9.404,14.629,14.106,20.898c7.314,9.927,15.151,18.808,24.033,27.167                                    c7.314,7.314,15.673,14.106,24.033,20.898c41.273,30.825,90.906,47.02,142.106,47.02s100.833-16.196,142.106-47.02                                    c8.359-6.269,16.718-13.584,24.033-20.898c8.359-8.359,16.718-17.241,24.033-27.167c5.224-6.792,9.927-13.584,14.106-20.898                                    C436.8,341.682,437.322,338.024,435.755,334.89z"/>                            </g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g></g><g></g><g></g><g></g></svg>'
                    ]),
                    TopLevelResource::make([
                        'expanded'  => false,
                        'linkTo'    => \App\Nova\Product::class,
                        'icon'      => ' <svg fill="white" stroke="white" flood-color="white" lighting-color= "white" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 460.8 460.8" style="enable-background:new 0 0 460.8 460.8;" xml:space="preserve"><g>                            <g>                                <path d="M230.432,0c-65.829,0-119.641,53.812-119.641,119.641s53.812,119.641,119.641,119.641s119.641-53.812,119.641-119.641                                    S296.261,0,230.432,0z"/>                            </g>                        </g>                        <g>                            <g>                                <path d="M435.755,334.89c-3.135-7.837-7.314-15.151-12.016-21.943c-24.033-35.527-61.126-59.037-102.922-64.784                                    c-5.224-0.522-10.971,0.522-15.151,3.657c-21.943,16.196-48.065,24.555-75.233,24.555s-53.29-8.359-75.233-24.555                                    c-4.18-3.135-9.927-4.702-15.151-3.657c-41.796,5.747-79.412,29.257-102.922,64.784c-4.702,6.792-8.882,14.629-12.016,21.943                                    c-1.567,3.135-1.045,6.792,0.522,9.927c4.18,7.314,9.404,14.629,14.106,20.898c7.314,9.927,15.151,18.808,24.033,27.167                                    c7.314,7.314,15.673,14.106,24.033,20.898c41.273,30.825,90.906,47.02,142.106,47.02s100.833-16.196,142.106-47.02                                    c8.359-6.269,16.718-13.584,24.033-20.898c8.359-8.359,16.718-17.241,24.033-27.167c5.224-6.792,9.927-13.584,14.106-20.898                                    C436.8,341.682,437.322,338.024,435.755,334.89z"/>                            </g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g></g><g></g><g></g><g></g></svg>'
                    ]),
                    TopLevelResource::make([
                        'expanded'  => false,
                        'linkTo'    => \App\Nova\Color::class,
                        'icon'      => ' <svg fill="white" stroke="white" flood-color="white" lighting-color= "white" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 460.8 460.8" style="enable-background:new 0 0 460.8 460.8;" xml:space="preserve"><g>                            <g>                                <path d="M230.432,0c-65.829,0-119.641,53.812-119.641,119.641s53.812,119.641,119.641,119.641s119.641-53.812,119.641-119.641                                    S296.261,0,230.432,0z"/>                            </g>                        </g>                        <g>                            <g>                                <path d="M435.755,334.89c-3.135-7.837-7.314-15.151-12.016-21.943c-24.033-35.527-61.126-59.037-102.922-64.784                                    c-5.224-0.522-10.971,0.522-15.151,3.657c-21.943,16.196-48.065,24.555-75.233,24.555s-53.29-8.359-75.233-24.555                                    c-4.18-3.135-9.927-4.702-15.151-3.657c-41.796,5.747-79.412,29.257-102.922,64.784c-4.702,6.792-8.882,14.629-12.016,21.943                                    c-1.567,3.135-1.045,6.792,0.522,9.927c4.18,7.314,9.404,14.629,14.106,20.898c7.314,9.927,15.151,18.808,24.033,27.167                                    c7.314,7.314,15.673,14.106,24.033,20.898c41.273,30.825,90.906,47.02,142.106,47.02s100.833-16.196,142.106-47.02                                    c8.359-6.269,16.718-13.584,24.033-20.898c8.359-8.359,16.718-17.241,24.033-27.167c5.224-6.792,9.927-13.584,14.106-20.898                                    C436.8,341.682,437.322,338.024,435.755,334.89z"/>                            </g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g></g><g></g><g></g><g></g></svg>'
                    ]),
                    TopLevelResource::make([
                        'expanded'  => false,
                        'linkTo'    => \App\Nova\Size::class,
                        'icon'      => ' <svg fill="white" stroke="white" flood-color="white" lighting-color= "white" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 460.8 460.8" style="enable-background:new 0 0 460.8 460.8;" xml:space="preserve"><g>                            <g>                                <path d="M230.432,0c-65.829,0-119.641,53.812-119.641,119.641s53.812,119.641,119.641,119.641s119.641-53.812,119.641-119.641                                    S296.261,0,230.432,0z"/>                            </g>                        </g>                        <g>                            <g>                                <path d="M435.755,334.89c-3.135-7.837-7.314-15.151-12.016-21.943c-24.033-35.527-61.126-59.037-102.922-64.784                                    c-5.224-0.522-10.971,0.522-15.151,3.657c-21.943,16.196-48.065,24.555-75.233,24.555s-53.29-8.359-75.233-24.555                                    c-4.18-3.135-9.927-4.702-15.151-3.657c-41.796,5.747-79.412,29.257-102.922,64.784c-4.702,6.792-8.882,14.629-12.016,21.943                                    c-1.567,3.135-1.045,6.792,0.522,9.927c4.18,7.314,9.404,14.629,14.106,20.898c7.314,9.927,15.151,18.808,24.033,27.167                                    c7.314,7.314,15.673,14.106,24.033,20.898c41.273,30.825,90.906,47.02,142.106,47.02s100.833-16.196,142.106-47.02                                    c8.359-6.269,16.718-13.584,24.033-20.898c8.359-8.359,16.718-17.241,24.033-27.167c5.224-6.792,9.927-13.584,14.106-20.898                                    C436.8,341.682,437.322,338.024,435.755,334.89z"/>                            </g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g></g><g></g><g></g><g></g></svg>'
                    ]),
                    TopLevelResource::make([
                        'expanded'  => false,
                        'linkTo'    => \App\Nova\Capacity::class,
                        'icon'      => ' <svg fill="white" stroke="white" flood-color="white" lighting-color= "white" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 460.8 460.8" style="enable-background:new 0 0 460.8 460.8;" xml:space="preserve"><g>                            <g>                                <path d="M230.432,0c-65.829,0-119.641,53.812-119.641,119.641s53.812,119.641,119.641,119.641s119.641-53.812,119.641-119.641                                    S296.261,0,230.432,0z"/>                            </g>                        </g>                        <g>                            <g>                                <path d="M435.755,334.89c-3.135-7.837-7.314-15.151-12.016-21.943c-24.033-35.527-61.126-59.037-102.922-64.784                                    c-5.224-0.522-10.971,0.522-15.151,3.657c-21.943,16.196-48.065,24.555-75.233,24.555s-53.29-8.359-75.233-24.555                                    c-4.18-3.135-9.927-4.702-15.151-3.657c-41.796,5.747-79.412,29.257-102.922,64.784c-4.702,6.792-8.882,14.629-12.016,21.943                                    c-1.567,3.135-1.045,6.792,0.522,9.927c4.18,7.314,9.404,14.629,14.106,20.898c7.314,9.927,15.151,18.808,24.033,27.167                                    c7.314,7.314,15.673,14.106,24.033,20.898c41.273,30.825,90.906,47.02,142.106,47.02s100.833-16.196,142.106-47.02                                    c8.359-6.269,16.718-13.584,24.033-20.898c8.359-8.359,16.718-17.241,24.033-27.167c5.224-6.792,9.927-13.584,14.106-20.898                                    C436.8,341.682,437.322,338.024,435.755,334.89z"/>                            </g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g></g><g></g><g></g><g></g></svg>'
                    ]),
                    TopLevelResource::make([
                        'expanded'  => false,
                        'linkTo'    => \App\Nova\Extra::class,
                        'icon'      => ' <svg fill="white" stroke="white" flood-color="white" lighting-color= "white" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 460.8 460.8" style="enable-background:new 0 0 460.8 460.8;" xml:space="preserve"><g>                            <g>                                <path d="M230.432,0c-65.829,0-119.641,53.812-119.641,119.641s53.812,119.641,119.641,119.641s119.641-53.812,119.641-119.641                                    S296.261,0,230.432,0z"/>                            </g>                        </g>                        <g>                            <g>                                <path d="M435.755,334.89c-3.135-7.837-7.314-15.151-12.016-21.943c-24.033-35.527-61.126-59.037-102.922-64.784                                    c-5.224-0.522-10.971,0.522-15.151,3.657c-21.943,16.196-48.065,24.555-75.233,24.555s-53.29-8.359-75.233-24.555                                    c-4.18-3.135-9.927-4.702-15.151-3.657c-41.796,5.747-79.412,29.257-102.922,64.784c-4.702,6.792-8.882,14.629-12.016,21.943                                    c-1.567,3.135-1.045,6.792,0.522,9.927c4.18,7.314,9.404,14.629,14.106,20.898c7.314,9.927,15.151,18.808,24.033,27.167                                    c7.314,7.314,15.673,14.106,24.033,20.898c41.273,30.825,90.906,47.02,142.106,47.02s100.833-16.196,142.106-47.02                                    c8.359-6.269,16.718-13.584,24.033-20.898c8.359-8.359,16.718-17.241,24.033-27.167c5.224-6.792,9.927-13.584,14.106-20.898                                    C436.8,341.682,437.322,338.024,435.755,334.89z"/>                            </g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g>                        </g>                        <g></g><g></g><g></g><g></g></svg>'
                    ]),
                ]
            ]),
            \ChrisWare\NovaBreadcrumbs\NovaBreadcrumbs::make(),
            \Runline\ProfileTool\ProfileTool::make(),
            \Mirovit\NovaNotifications\NovaNotifications::make(),
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
