<?php

namespace Cleanse\Discord\Components;

use Cms\Classes\ComponentBase;
use Cleanse\Discord\Models\Server;

class Servers extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Server List',
            'description' => 'List of Discord servers for PvPaissa.'
        ];
    }

    public function onRun()
    {
        $this->page['servers'] = $this->getServers();
    }

    public function getServers()
    {
        return Server::all();
    }
}
