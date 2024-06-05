<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailTransaksi
 * 
 * @property string|null $ID_TRANS
 * @property string|null $ID_PROD
 * @property int $HARGA
 * @property int $QTY
 * @property string|null $STATUS_DEL
 * @property string|null $IS_WAREHOUSE
 * 
 * @property DetailProduk|null $detail_produk
 * @property Transaksi|null $transaksi
 *
 * @package App\Models
 */
class DetailTransaksi extends Model
{
	protected $table = 'detail_transaksi';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'HARGA' => 'int',
		'QTY' => 'int'
	];

	protected $fillable = [
		'ID_TRANS',
		'ID_PROD',
		'HARGA',
		'QTY',
		'STATUS_DEL',
		'IS_WAREHOUSE'
	];

	public function detail_produk()
	{
		return $this->belongsTo(DetailProduk::class, 'ID_PROD');
	}

	public function transaksi()
	{
		return $this->belongsTo(Transaksi::class, 'ID_TRANS');
	}
}
