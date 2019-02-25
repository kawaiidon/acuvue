<?php

namespace APPLICATION_HOME\Providers;

use STALKER_CMS\Vendor\Providers\ServiceProvider as BaseServiceProvider;

class ModuleServiceProvider extends BaseServiceProvider {

    public function boot() {

        $this->setPath(__DIR__ . '/../');
        $this->registerConfig('application::config', 'Config/application.php');
        $this->registerSettings('application::settings', 'Config/settings.php');
        $this->registerActions('application::actions', 'Config/actions.php');
        $this->registerSystemMenu('application::menu', 'Config/menu.php');
        $this->registerBladeDirectives();
    }

    public function register() {

    }

    /********************************************************************************************************************/
    protected function registerBladeDirectives() {

    }
}
