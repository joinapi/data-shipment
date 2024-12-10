<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shipment_method_type_id
 * @property string $description
 * @property float $sequence_num
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property FacilityCarrierShipment[] $facilityCarrierShipments
 * @property ShipmentRouteSegment[] $shipmentRouteSegments
 * @property CarrierShipmentMethod[] $carrierShipmentMethods
 * @property ProductStoreVendorShipment[] $productStoreVendorShipments
 * @property ProductStoreShipmentMeth[] $productStoreShipmentMeths
 * @property Picklist[] $picklists
 * @property OrderItemShipGroup[] $orderItemShipGroups
 */
class ShipmentMethodType extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipment_method_type';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'shipment_method_type_id';

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
    protected $fillable = ['description', 'sequence_num', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function facilityCarrierShipments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\FacilityCarrierShipment', 'shipment_method_type_id', 'shipment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipmentRouteSegments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ShipmentRouteSegment', 'shipment_method_type_id', 'shipment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function carrierShipmentMethods()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\CarrierShipmentMethod', 'shipment_method_type_id', 'shipment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productStoreVendorShipments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ProductStoreVendorShipment', 'shipment_method_type_id', 'shipment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productStoreShipmentMeths()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ProductStoreShipmentMeth', 'shipment_method_type_id', 'shipment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function picklists()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\Picklist', 'shipment_method_type_id', 'shipment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItemShipGroups()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\OrderItemShipGroup', 'shipment_method_type_id', 'shipment_method_type_id');
    }
}
