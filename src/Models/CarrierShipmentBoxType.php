<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shipment_box_type_id
 * @property string $party_id
 * @property string $packaging_type_code
 * @property string $oversize_code
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Party $party
 * @property ShipmentBoxType $shipmentBoxType
 */
class CarrierShipmentBoxType extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'carrier_shipment_box_type';

    /**
     * @var array
     */
    protected $fillable = ['packaging_type_code', 'oversize_code', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function party()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Party', 'party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipmentBoxType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\ShipmentBoxType', 'shipment_box_type_id', 'shipment_box_type_id');
    }
}
