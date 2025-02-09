<?php

use App\Providers\Filament\{AdminPanelProvider, AppPanelProvider};
use App\Providers\{AppServiceProvider, TenancyServiceProvider};

return [

    AppServiceProvider::class,
    AdminPanelProvider::class,
    AppPanelProvider::class,
    TenancyServiceProvider::class,

];
