<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Repositories Array With Interface as a Key and Eloquent as a Value.
     *
     * @var array
     */
    private $repositories = [
        \App\Repositories\Eloquent\User\UserRepository::class => \App\Repositories\Eloquent\User\EloquentUserRepository::class,
        \App\Repositories\Eloquent\RethinkObesity\RethinkObesityRepository::class => \App\Repositories\Eloquent\RethinkObesity\EloquantRethinkObesityRepository::class,
        \App\Repositories\Eloquent\YoutubeVideo\YoutubeVideoRepository::class => \App\Repositories\Eloquent\YoutubeVideo\EloquantYoutubeVideoRepository::class,
        \App\Repositories\Eloquent\CategoryLibrary\CategoryLibraryRepository::class => \App\Repositories\Eloquent\CategoryLibrary\EloquantCategoryLibraryRepository::class,
        \App\Repositories\Eloquent\CategoryFaq\CategoryFaqRepository::class => \App\Repositories\Eloquent\CategoryFaq\EloquantCategoryFaqRepository::class,
        \App\Repositories\Eloquent\Faq\FaqRepository::class => \App\Repositories\Eloquent\Faq\EloquantFaqRepository::class,
        \App\Repositories\Eloquent\Library\LibraryRepository::class => \App\Repositories\Eloquent\Library\EloquantLibraryRepository::class,
        \App\Repositories\Eloquent\HCP\HCPRepository::class => \App\Repositories\Eloquent\HCP\EloquantHCPRepository::class,
        \App\Repositories\Eloquent\Pharmacy\PharmacyRepository::class => \App\Repositories\Eloquent\Pharmacy\EloquantPharmacyRepository::class,
        \App\Repositories\Eloquent\EventType\EventTypeRepository::class=> \App\Repositories\Eloquent\EventType\EloquantEventTypeRepository::class,
        \App\Repositories\Eloquent\TempleteEvent\TempleteEventRepository::class=> \App\Repositories\Eloquent\TempleteEvent\EloquantTempleteEventRepository::class,
        \App\Repositories\Eloquent\Event\EventRepository::class=> \App\Repositories\Eloquent\Event\EloquantEventRepository::class,
        \App\Repositories\Eloquent\EventAttend\EventAttendRepository::class=> \App\Repositories\Eloquent\EventAttend\eloquantEventAttendRepository::class,
        \App\Repositories\Eloquent\CategeoryVideo\CategoryVideoRepository::class=> \App\Repositories\Eloquent\CategeoryVideo\EloquantCategoryVideoRepository::class,
        \App\Repositories\Eloquent\Speciality\SpecialityRepository::class=> \App\Repositories\Eloquent\Speciality\EloquantSpecialityRepository::class,
        \App\Repositories\Eloquent\LibraryFav\LibraryFavRepository::class=> \App\Repositories\Eloquent\LibraryFav\EloquantLibraryFavRepository::class,
        \App\Repositories\Eloquent\Task\TaskRepository::class=> \App\Repositories\Eloquent\Task\EloquentTaskRepository::class,
        \App\Repositories\Eloquent\WebSetings\WebsiteSettingRepository::class=> \App\Repositories\Eloquent\WebSetings\EloquentWebsiteSettingRepository::class,

    ];

       /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Bind all repositories to application.
         */
        foreach ($this->repositories as $interface => $eloquent) {
            $this->app->singleton($interface, $eloquent);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array_keys($this->repositories);
    }
}
