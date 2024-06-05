<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaksi
 * 
 * @property string $ID_TRANS
 * @property string|null $ID_CUST
 * @property Carbon $TANGGAL
 * @property int $TOTAL
 * @property string|null $STATUS_DEL
 * @property string|null $IS_WAREHOUSE
 * 
 * @property Customer|null $customer
 * @property DetailTransaksi $detail_transaksi
 *
 * @package App\Models
 */
class Transaksi extends Model
{
	protected $table = 'transaksi';
	protected $primaryKey = 'ID_TRANS';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'TANGGAL' => 'datetime',
		'TOTAL' => 'int'
	];

	protected $fillable = [
		'ID_CUST',
		'TANGGAL',
		'TOTAL',
		'STATUS_DEL',
		'IS_WAREHOUSE'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class, 'ID_CUST');
	}

	public function detail_transaksi()
	{
		return $this->hasOne(DetailTransaksi::class, 'ID_TRANS');
	}
}
