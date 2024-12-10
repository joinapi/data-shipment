<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $delivery_id
 * @property string $origin_facility_id
 * @property string $dest_facility_id
 * @property string $fixed_asset_id
 * @property string $actual_start_date
 * @property string $actual_arrival_date
 * @property string $estimated_start_date
 * @property string $estimated_arrival_date
 * @property float $start_mileage
 * @property float $end_mileage
 * @property float $fuel_used
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Facility $facilityByDestFacilityId
 * @property FixedAsset $fixedAsset
 * @property Facility $facilityByOriginFacilityId
 * @property ShipmentRouteSegment[] $shipmentRouteSegments
 */
class Delivery extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'delivery';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'delivery_id';

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
    protected $fillable = ['origin_facility_id', 'dest_facility_id', 'fixed_asset_id', 'actual_start_date', 'actual_arrival_date', 'estimated_start_date', 'estimated_arrival_date', 'start_mileage', 'end_mileage', 'fuel_used', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facilityByDestFacilityId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Facility', 'dest_facility_id', 'facility_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fixedAsset()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\FixedAsset', 'fixed_asset_id', 'fixed_asset_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facilityByOriginFacilityId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Facility', 'origin_facility_id', 'facility_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipmentRouteSegments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ShipmentRouteSegment', 'delivery_id', 'delivery_id');
    }
}
