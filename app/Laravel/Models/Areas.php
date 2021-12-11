<?php

namespace App\Laravel\Models;

use Illuminate\Database\Eloquent\Model;
use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Areas extends Model
{
    use DateFormatterTrait,SoftDeletes;

	protected $table = "areas";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'desc','floor' ,'row','col','area_code'
    ];

    public $timestamps = true;

    public function author() {
        return $this->BelongsTo("App\Laravel\Models\User", "user_id", "id");
    }


}
