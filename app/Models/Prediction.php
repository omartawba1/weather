<?php

namespace App\Models;

use App\Http\Requests\PredictionRequest;
use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['service_id', 'city_id', 'date', 'time', 'value'];

    /**
     * Check for older dates.
     *
     * @param $query
     * @return mixed
     */
    public function scopeOld($query)
    {
        return $query->where('date', '<', today()->toDateString());
    }

    /**
     * @param $query
     * @param PredictionRequest $request
     * @return mixed
     */
    public function scopeFilter($query, PredictionRequest $request)
    {
        return $query->where('city_id', $request->get('city_id'))
            ->where('date', $request->get('day'));
    }
}
