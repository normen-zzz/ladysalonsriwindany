<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('Lady Salon Sri Windany')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->renderHook(PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE, fn (): string => Blade::render(<<<'BLADE'
                <div class="mb-4 rounded-xl border border-amber-200/80 bg-gradient-to-r from-amber-50 to-rose-50 px-4 py-3 text-center dark:border-amber-900/60 dark:from-amber-950/40 dark:to-rose-950/30">
                    <p class="text-sm font-semibold tracking-wide text-amber-700 dark:text-amber-300">
                        Selamat Datang di Admin Panel
                    </p>
                    <p class="mt-1 text-xs text-gray-600 dark:text-gray-300">
                        Kelola layanan, galeri, testimonial, dan informasi salon dengan mudah.
                    </p>
                </div>
            BLADE))
            ->renderHook(PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, fn (): string => Blade::render(<<<'BLADE'
                <p class="mt-3 text-center text-xs text-gray-500 dark:text-gray-400">
                    © {{ now()->year }} Lady Salon Sri Windany • Admin Access Only
                </p>
            BLADE))
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
