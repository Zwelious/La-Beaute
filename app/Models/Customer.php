<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * Class Customer
 *
 * @property string $ID_CUST
 * @property string|null $EMAIL
 * @property string|null $NAME
 * @property string|null $PHONE
 * @property string|null $ADDRESS
 * @property string|null $PASSWORD_HASH
 * @property string|null $STATUS_DEL
 * @property string|null $IS_WAREHOUSE
 *
 * @property Collection|Keranjang[] $keranjangs
 * @property Collection|Transaksi[] $transaksis
 * @property Collection|Wishlist[] $wishlists
 *
 * @package App\Models
 */
class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'customer';
	protected $primaryKey = 'ID_CUST';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'EMAIL',
		'NAME',
		'PHONE',
		'ADDRESS',
		'PASSWORD_HASH',
		'STATUS_DEL',
		'IS_WAREHOUSE'
	];

    protected $hidden = [
        'PASSWORD_HASH',
    ];

	public function keranjangs()
	{
		return $this->hasMany(Keranjang::class, 'ID_CUST');
	}

	public function transaksis()
	{
		return $this->hasMany(Transaksi::class, 'ID_CUST');
	}

	public function wishlists()
	{
		return $this->hasMany(Wishlist::class, 'ID_CUST');
	}
}
