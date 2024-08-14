<?php

namespace Xbigdaddyx\Itsm;

use App\Application;
use Illuminate\Support\ServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Illuminate\Support\Facades\Gate;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;
use Illuminate\View\Compilers\BladeCompiler;
use Livewire\Livewire;
use Xbigdaddyx\Itsm\Console\Commands\ChangeIssueStatus;
use Xbigdaddyx\Itsm\Console\Commands\CheckIssueStatus;
use Xbigdaddyx\Itsm\Events\ItsmCorrectionCreatedEvent;
use Xbigdaddyx\Itsm\Events\ItsmIssueCreatedEvent;
use Xbigdaddyx\Itsm\Events\CorrectionApprovedEvent;
use Xbigdaddyx\Itsm\Events\CorrectionCreatedEvent;
use Xbigdaddyx\Itsm\Events\CorrectionRejectedEvent;
use Xbigdaddyx\Itsm\Events\IssueCreatedEvent;
use Xbigdaddyx\Itsm\Events\IssuePendingEvent;
use Xbigdaddyx\Itsm\Events\IssueResolvedEvent;
use Xbigdaddyx\Itsm\Listeners\SendItsmCorrectionCreatedNotification;
use Xbigdaddyx\Itsm\Listeners\SendItsmIssueCreatedNotification;
use Xbigdaddyx\Itsm\Listeners\SendCorrectionApprovedNotification;
use Xbigdaddyx\Itsm\Listeners\SendCorrectionCreatedNotification;
use Xbigdaddyx\Itsm\Listeners\SendCorrectionRejectedNotification;
use Xbigdaddyx\Itsm\Listeners\SendIssueCreatedNotification;
use Xbigdaddyx\Itsm\Listeners\SendIssuePendingNotification;
use Xbigdaddyx\Itsm\Listeners\SendIssueResolvedNotification;
use Xbigdaddyx\Itsm\Models\Area;
use Xbigdaddyx\Itsm\Models\Issue;
use Xbigdaddyx\Itsm\Models\Resolution;
use Xbigdaddyx\Itsm\Policies\AreaPolicy;
use Xbigdaddyx\Itsm\Policies\IssuePolicy;
use Xbigdaddyx\Itsm\Policies\ResolutionPolicy;

class ItsmServiceProvider extends PackageServiceProvider
{
    public static string $name = 'itsm';

    public static string $viewNamespace = 'itsm';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)

            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('xbigdaddyx/Itsm');
            })
            ->hasViews(static::$viewNamespace);

        $configFileName = $package->shortName();
        if (file_exists($package->basePath("/../routes/web.php"))) {
            $package->hasRoutes("web");
        }
        if (file_exists($package->basePath("/../routes/api.php"))) {
            $package->hasRoutes("api");
        }

        if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
            $package->hasConfigFile();
        }

        if (file_exists($package->basePath('/../database/migrations'))) {
            $package->hasMigrations($this->getMigrations());
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }
    protected function getCommands(): array
    {
        return [
            // ChangeIssueStatus::class,
            // CheckIssueStatus::class,
        ];
    }
    protected function getMigrations(): array
    {
        return [
            //
        ];
    }
    public function packageRegistered(): void
    {
        //$this->app->bind('VerificationRepository', \Xbigdaddyx\Itsm\Repositories\VerificationRepository::class);
        //$this->app->bind('SearchRepository', \Xbigdaddyx\Itsm\Repositories\SearchRepository::class);
        // $this->app->register(ItsmEventServiceProvider::class);
        //$this->app->reqister(EventServiceProvider::class);
        //$this->register(EventServiceProvider::class);
        // $this->app->register(EventServiceProvider::class);
    }

    public function packageBooted(): void
    {

        //Event::listen(CartonBoxStatusUpdated::class, CartonBoxStatusListener::class);
        // Event::listen(IssueCreatedEvent::class, SendIssueCreatedNotification::class);
        // Event::listen(IssuePendingEvent::class, SendIssuePendingNotification::class);
        // Event::listen(IssueResolvedEvent::class, SendIssueResolvedNotification::class);
        // Event::listen(ItsmIssueCreatedEvent::class, SendItsmIssueCreatedNotification::class);
        // Event::listen(ItsmCorrectionCreatedEvent::class, SendItsmCorrectionCreatedNotification::class);
        // Event::listen(CorrectionRejectedEvent::class, SendCorrectionRejectedNotification::class);
        // Event::listen(CorrectionApprovedEvent::class, SendCorrectionApprovedNotification::class);
        // Event::listen(CorrectionCreatedEvent::class, SendCorrectionCreatedNotification::class);
        // $this->callAfterResolving(BladeCompiler::class, function () {

        //     if (class_exists(Livewire::class)) {
        //         // Livewire::component('search-carton', SearchCarton::class);
        //         // Livewire::component('verification-carton', VerificationCarton::class);
        //         // Livewire::component('itsm-polybag-attributes', ItsmPolybagAttributes::class);
        //         // Livewire::component('itsm-polybag-stats', ItsmPolybagStats::class);
        //         // Livewire::component('itsm-polybag-table', ItsmPolybagTable::class);
        //         // Livewire::component('status', Status::class);
        //         // Livewire::component('paginator', RevisionsPaginator::class);
        //         // Livewire::component('version', Version::class);
        //     }
        // });
        // Gate::policy(Issue::class, IssuePolicy::class);
        // Gate::policy(Area::class, AreaPolicy::class);
        // Gate::policy(Resolution::class, ResolutionPolicy::class);
        // Asset Registration
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName(),

        );

        FilamentAsset::registerScriptData(
            $this->getScriptData(),
            $this->getAssetPackageName()
        );

        // Icon Registration
        FilamentIcon::register($this->getIcons());

        // Handle Stubs
        // if (app()->runningInConsole()) {
        //     foreach (app(Filesystem::class)->files(__DIR__ . '/../stubs/') as $file) {
        //         $this->publishes([
        //             $file->getRealPath() => base_path("stubs/Itsm/{$file->getFilename()}"),
        //         ], 'Itsm-stubs');
        //     }
        // }

        // Testing
        // Testable::mixin(new TestsApproval());
    }

    protected function getAssetPackageName(): ?string
    {
        return 'xbigdaddyx/Itsm';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // Css::make('Itsm-paginator-styles', __DIR__ . '/../resources/dist/paginator.css'),
            // // AlpineComponent::make('filament-approvals', __DIR__ . '/../resources/dist/components/filament-approvals.js'),
            // Css::make('Itsm-styles', __DIR__ . '/../resources/dist/Itsm.css'),
            // Js::make('Itsm-scripts', __DIR__ . '/../resources/dist/Itsm.js'),
        ];
    }

    protected function getIcons(): array
    {
        return [];
    }


    protected function getRoutes(): array
    {
        return [];
    }


    protected function getScriptData(): array
    {
        return [];
    }
}
