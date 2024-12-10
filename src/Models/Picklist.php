<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $picklist_id
 * @property string $facility_id
 * @property string $shipment_method_type_id
 * @property string $status_id
 * @property string $description
 * @property string $picklist_date
 * @property string $created_by_user_login
 * @property string $last_modified_by_user_login
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PicklistRole[] $picklistRoles
 * @property PicklistStatusHistory[] $picklistStatusHistories
 * @property PicklistBin[] $picklistBins
 * @property Facility $facility
 * @property ShipmentMethodType $shipmentMethodType
 * @property StatusItem $statusItem
 */
class Picklist extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'picklist';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'picklist_id';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['facility_id', 'shipment_method_type_id', 'status_id', 'description', 'picklist_date', 'created_by_user_login', 'last_modified_by_user_login', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function picklistRoles()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\PicklistRole', 'picklist_id', 'picklist_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function picklistStatusHistories()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\PicklistStatusHistory', 'picklist_id', 'picklist_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function picklistBins()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\PicklistBin', 'picklist_id', 'picklist_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facility()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Facility', 'facility_id', 'facility_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipmentMethodType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\ShipmentMethodType', 'shipment_method_type_id', 'shipment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\StatusItem', 'status_id', 'status_id');
    }
}
