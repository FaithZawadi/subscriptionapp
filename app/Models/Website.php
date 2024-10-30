<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Contracts\Service\Attribute\SubscribedService;

class Website extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(SubscribedService::class);
    }
}
