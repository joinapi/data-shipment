<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $status_id
 * @property string $shipment_id
 * @property string $change_by_user_login_id
 * @property string $status_date
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Shipment $shipment
 * @property StatusItem $statusItem
 * @property UserLogin $userLoginByChangeByUserLoginId
 */
class ShipmentStatus extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipment_status';

    /**
     * @var array
     */
    protected $fillable = ['change_by_user_login_id', 'status_date', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipment()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Shipment', 'shipment_id', 'shipment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\StatusItem', 'status_id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userLoginByChangeByUserLoginId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\UserLogin', 'change_by_user_login_id', 'user_login_id');
    }
}
