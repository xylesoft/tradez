<?php namespace TradeZ;

use Illuminate\Database\Eloquent\Model;

class MarketCommodity extends Model {

	/*
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'station_market';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['station_id', 'commodity', 'purchase_value', 'cost_value', 'demand', 'supply', 'created_at', 'updated_at'];

	public function systemStation() {

		return $this->belongsTo('TradeZ\SystemStation', 'id');
	}
}
