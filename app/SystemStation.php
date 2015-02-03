<?php 

namespace TradeZ;

use Illuminate\Database\Eloquent\Model;

class SystemStation extends Model {

	/*
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'system_stations';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['system', 'station', 'created_at', 'updated_at'];

	public function commodities() {

		return $this->hasMany('TradeZ\MarketCommodity', 'station_id', 'id');
	}
}
