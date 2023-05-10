<?php

declare(strict_types=1);

namespace Src\Money\Currency\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as EloquentModel;

final class CurrencyEloquentModel extends EloquentModel
{
    use HasFactory;

    protected $keyType = 'string';
    protected $primaryKey = 'id';
    protected $table = 'currencies';
    public $incrementing = false;
    public $timestamps = true;
}
