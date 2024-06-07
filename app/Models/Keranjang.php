<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Keranjang
 * 
 * @property int $ID_KERANJANG
 * @property string|null $ID_CUST
 * @property string|null $ID_PROD
 * @property string $NAMA_PROD
 * @property int $HARGA
 * @property string $SHADE
 * @property int $QTY
 * @property string|null $IS_WAREHOUSE
 * 
 * @property Customer|null $customer
 * @property DetailProduk|null $detail_produk
 *
 * @package App\Models
 */
class Keranjang extends Model
{
	protected $table = 'keranjang';
	protected $primaryKey = 'ID_KERANJANG';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_KERANJANG' => 'int',
		'HARGA' => 'int',
		'QTY' => 'int'
	];

	protected $fillable = [
		'ID_CUST',
		'ID_PROD',
		'NAMA_PROD',
		'HARGA',
		'SHADE',
		'QTY',
		'IS_WAREHOUSE'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class, 'ID_CUST');
	}

	public function detail_produk()
	{
		return $this->belongsTo(DetailProduk::class, 'ID_PROD');
	}
}
