<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shipment_box_type_id
 * @property string $dimension_uom_id
 * @property string $weight_uom_id
 * @property string $description
 * @property float $box_length
 * @property float $box_width
 * @property float $box_height
 * @property float $box_weight
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property CarrierShipmentBoxType[] $carrierShipmentBoxTypes
 * @property Product[] $productsByDefaultShipmentBoxTypeId
 * @property Uom $uomByDimensionUomId
 * @property Uom $uomByWeightUomId
 * @property ShipmentPackage[] $shipmentPackages
 */
class ShipmentBoxType extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipment_box_type';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'shipment_box_type_id';

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
    protected $fillable = ['dimension_uom_id', 'weight_uom_id', 'description', 'box_length', 'box_width', 'box_height', 'box_weight', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carrierShipmentBoxTypes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\CarrierShipmentBoxType', 'shipment_box_type_id', 'shipment_box_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productsByDefaultShipmentBoxTypeId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\Product', 'default_shipment_box_type_id', 'shipment_box_type_id');
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
    public function uomByWeightUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Uom', 'weight_uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipmentPackages()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ShipmentPackage', 'shipment_box_type_id', 'shipment_box_type_id');
    }
}
