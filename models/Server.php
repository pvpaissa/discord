<?php

namespace Cleanse\Discord\Models;

use Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $url
 */
class Server extends Model
{
    public $table = 'cleanse_discord_servers';
}
