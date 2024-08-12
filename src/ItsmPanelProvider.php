<?php

namespace Xbigdaddyx\Itsm;

use Filament\Panel;
use Filament\PanelProvider;

class ItsmPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('itsm')
            ->path('itsm')
            ->resources([
                // ...
            ])
            ->pages([
                // ...
            ])
            ->widgets([
                // ...
            ])
            ->middleware([
                // ...
            ])
            ->authMiddleware([
                // ...
            ]);
    }
}
