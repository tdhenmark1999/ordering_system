<?php

namespace App\Laravel\Models;

use Illuminate\Database\Eloquent\Model;
use App\Laravel\Traits\DateFormatterTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ordered extends Model
{
    use DateFormatterTrait,SoftDeletes;

	protected $table = "ordered";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','status','total_price','product_id'
    ];

    public $timestamps = true;

    public function userss() {
        return $this->BelongsTo("App\Laravel\Models\User", "user_id", "id");
    }

    public function setCategoryAttribute($value)
    {
        $this->attributes['product_id'] = json_encode($value);
    }

    public function getCategoryAttribute($value)
    {
        return $this->attributes['product_id'] = json_decode($value);
    }
}
