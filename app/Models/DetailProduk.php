<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DetailProduk
 * 
 * @property string $ID_PROD
 * @property string $NAMA_PROD
 * @property string $SHADE
 * @property string|null $DESKRIPSI
 * @property int $HARGA
 * @property int $DISKON
 * @property string|null $KATEGORI
 * @property int $STOCK
 * @property string|null $STATUS_DEL
 * @property string|null $FOTO_PROD
 * @property string|null $IS_WAREHOUSE
 * 
 * @property DetailTransaksi $detail_transaksi
 * @property Collection|Keranjang[] $keranjangs
 * @property Collection|Wishlist[] $wishlists
 *
 * @package App\Models
 */
class DetailProduk extends Model
{
	protected $table = 'detail_produk';
	protected $primaryKey = 'ID_PROD';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'HARGA' => 'int',
		'DISKON' => 'int',
		'STOCK' => 'int'
	];

	protected $fillable = [
		'NAMA_PROD',
		'SHADE',
		'DESKRIPSI',
		'HARGA',
		'DISKON',
		'KATEGORI',
		'STOCK',
		'STATUS_DEL',
		'FOTO_PROD',
		'IS_WAREHOUSE'
	];

	public function detail_transaksi()
	{
		return $this->hasOne(DetailTransaksi::class, 'ID_PROD');
	}

	public function keranjangs()
	{
		return $this->hasMany(Keranjang::class, 'ID_PROD');
	}

	public function wishlists()
	{
		return $this->hasMany(Wishlist::class, 'ID_PROD');
	}
}
