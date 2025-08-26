<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasPublicUuid
{
    protected $hidden = ['id'];

    protected static function bootHasPublicUuid(): void
    {
        static::creating(function (Model $model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid7();
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
