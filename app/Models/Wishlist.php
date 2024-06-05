<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Wishlist
 * 
 * @property int $ID_WISHLIST
 * @property string|null $ID_CUST
 * @property string|null $ID_PROD
 * @property string $NAMA_PROD
 * @property int $HARGA
 * @property string|null $IS_WAREHOUSE
 * 
 * @property Customer|null $customer
 * @property DetailProduk|null $detail_produk
 *
 * @package App\Models
 */
class Wishlist extends Model
{
	protected $table = 'wishlist';
	protected $primaryKey = 'ID_WISHLIST';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_WISHLIST' => 'int',
		'HARGA' => 'int'
	];

	protected $fillable = [
		'ID_CUST',
		'ID_PROD',
		'NAMA_PROD',
		'HARGA',
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
