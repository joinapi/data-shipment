<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shipment_method_type_id
 * @property string $party_id
 * @property string $role_type_id
 * @property string $geo_id_to
 * @property string $geo_id_from
 * @property string $from_date
 * @property string $lead_time_uom_id
 * @property string $thru_date
 * @property float $lead_time
 * @property float $sequence_number
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Geo $geoByGeoIdFrom
 * @property Geo $geoByGeoIdTo
 * @property Uom $uomByLeadTimeUomId
 */
class ShipmentTimeEstimate extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipment_time_estimate';

    /**
     * @var array
     */
    protected $fillable = ['lead_time_uom_id', 'thru_date', 'lead_time', 'sequence_number', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function geoByGeoIdFrom()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Geo', 'geo_id_from', 'geo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function geoByGeoIdTo()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Geo', 'geo_id_to', 'geo_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByLeadTimeUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Uom', 'lead_time_uom_id', 'uom_id');
    }
}
