<?php

namespace Cleanse\Discord;

use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public $require = ['Cleanse.Feedback'];

    public function pluginDetails()
    {
        return [
            'name' => 'PvPaissa Discord',
            'description' => 'Allows for listing discord servers related to your site.',
            'author' => 'Paul Eli Lovato',
            'icon' => 'icon-leaf'
        ];
    }

    public function registerComponents()
    {
        return [
            'Cleanse\Discord\Components\Servers' => 'cleanseDiscordServers'
        ];
    }

    public function registerPermissions()
    {
        return [
            'cleanse.discord.access_discord' => [
                'tab' => 'Discord',
                'label' => 'Manage Discord Servers'
            ]
        ];
    }

    public function registerNavigation()
    {
        return [
            'discord' => [
                'label' => 'Discord',
                'url' => Backend::url('cleanse/discord/servers'),
                'icon' => 'facetime-video',
                'iconSvg' => 'plugins/cleanse/discord/assets/images/Discord-Logo-White.svg',
                'permissions' => ['cleanse.discord.*'],
                'order' => 33,

                'sideMenu' => [
                    'new_server' => [
                        'label' => 'New Server',
                        'icon' => 'icon-plus',
                        'url' => Backend::url('cleanse/discord/servers/create'),
                        'permissions' => ['cleanse.discord.access_discord']
                    ],
                    'servers' => [
                        'label' => 'Server List',
                        'icon' => 'icon-copy',
                        'url' => Backend::url('cleanse/discord/servers'),
                        'permissions' => ['cleanse.discord.access_discord']
                    ]
                ]
            ]
        ];
    }
}
