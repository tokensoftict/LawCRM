<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerCase
 *
 * @property int $id
 * @property int $customer_id
 * @property string $case_details
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Customer $customer
 *
 * @package App\Models
 */
class CustomerCase extends Model
{
	protected $table = 'customer_cases';

	protected $casts = [
		'customer_id' => 'int'
	];

	protected $fillable = [
		'customer_id',
		'case_details'
	];


	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}
}
