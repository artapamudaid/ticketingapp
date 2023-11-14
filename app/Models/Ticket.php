<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Coderflex\LaravelTicket\Models\Ticket as CoderFlexTicket;

class Ticket extends CoderFlexTicket implements HasMedia
{
    use InteractsWithMedia;
}
