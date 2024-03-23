<?php

namespace Rboschin\TenantLang;

use Illuminate\Support\ServiceProvider;

class TenantLangServiceProvider extends ServiceProvider
{
  public function register()
  {
    //
  }

  public function boot()
  {
    $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    $this->loadViewsFrom(__DIR__.'/../resources/views', 'tenantlang');
  }
}
