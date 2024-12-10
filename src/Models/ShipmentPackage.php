<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shipment_id
 * @property string $shipment_package_seq_id
 * @property string $shipment_box_type_id
 * @property string $dimension_uom_id
 * @property string $weight_uom_id
 * @property string $date_created
 * @property float $box_length
 * @property float $box_height
 * @property float $box_width
 * @property float $weight
 * @property float $insured_value
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ShipmentBoxType $shipmentBoxType
 * @property Uom $uomByDimensionUomId
 * @property Shipment $shipment
 * @property Uom $uomByWeightUomId
 */
class ShipmentPackage extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipment_package';

    /**
     * @var array
     */
    protected $fillable = ['shipment_box_type_id', 'dimension_uom_id', 'weight_uom_id', 'date_created', 'box_length', 'box_height', 'box_width', 'weight', 'insured_value', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipmentBoxType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\ShipmentBoxType', 'shipment_box_type_id', 'shipment_box_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByDimensionUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Uom', 'dimension_uom_id', 'uom_id');
    }

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
    public function uomByWeightUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Uom', 'weight_uom_id', 'uom_id');
    }
}
