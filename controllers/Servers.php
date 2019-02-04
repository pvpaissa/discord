<?php

namespace Cleanse\Discord\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Cleanse\Discord\Models\Server;

class Servers extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['cleanse.discord.access_discord'];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext(
            'Cleanse.Discord',
            'discord',
            'servers');
    }

    public function index()
    {
        $this->vars['serversTotal'] = Server::count();

        $this->asExtension('ListController')->index();
    }

    public function create()
    {
        BackendMenu::setContextSideMenu('new_server');

        $this->bodyClass = 'compact-container';

        return $this->asExtension('FormController')->create();
    }

    public function update($recordId = null)
    {
        $this->bodyClass = 'compact-container';

        return $this->asExtension('FormController')->update($recordId);
    }
}
