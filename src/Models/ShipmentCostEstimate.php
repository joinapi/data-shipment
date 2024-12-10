<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shipment_cost_estimate_id
 * @property string $shipment_method_type_id
 * @property string $carrier_party_id
 * @property string $carrier_role_type_id
 * @property string $product_store_ship_meth_id
 * @property string $party_id
 * @property string $role_type_id
 * @property string $geo_id_to
 * @property string $geo_id_from
 * @property string $weight_break_id
 * @property string $weight_uom_id
 * @property string $quantity_break_id
 * @property string $quantity_uom_id
 * @property string $price_break_id
 * @property string $price_uom_id
 * @property string $product_store_id
 * @property float $weight_unit_price
 * @property float $quantity_unit_price
 * @property float $price_unit_price
 * @property float $order_flat_price
 * @property float $order_price_percent
 * @property float $order_item_flat_price
 * @property float $shipping_price_percent
 * @property string $product_feature_group_id
 * @property float $oversize_unit
 * @property float $oversize_price
 * @property float $feature_percent
 * @property float $feature_price
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Geo $geoByGeoIdFrom
 * @property Party $party
 * @property QuantityBreak $quantityBreakByPriceBreakId
 * @property Uom $uomByPriceUomId
 * @property QuantityBreak $quantityBreak
 * @property Uom $uomByQuantityUomId
 * @property RoleType $roleType
 * @property Geo $geoByGeoIdTo
 * @property QuantityBreak $quantityBreakByWeightBreakId
 * @property Uom $uomByWeightUomId
 * @property ProductStoreShipmentMeth $productStoreShipmentMeth
 */
class ShipmentCostEstimate extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipment_cost_estimate';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'shipment_cost_estimate_id';

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
    protected $fillable = ['shipment_method_type_id', 'carrier_party_id', 'carrier_role_type_id', 'product_store_ship_meth_id', 'party_id', 'role_type_id', 'geo_id_to', 'geo_id_from', 'weight_break_id', 'weight_uom_id', 'quantity_break_id', 'quantity_uom_id', 'price_break_id', 'price_uom_id', 'product_store_id', 'weight_unit_price', 'quantity_unit_price', 'price_unit_price', 'order_flat_price', 'order_price_percent', 'order_item_flat_price', 'shipping_price_percent', 'product_feature_group_id', 'oversize_unit', 'oversize_price', 'feature_percent', 'feature_price', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

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
    public function party()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Party', 'party_id', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quantityBreakByPriceBreakId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\QuantityBreak', 'price_break_id', 'quantity_break_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByPriceUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Uom', 'price_uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quantityBreak()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\QuantityBreak', 'quantity_break_id', 'quantity_break_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByQuantityUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Uom', 'quantity_uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roleType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\RoleType', 'role_type_id', 'role_type_id');
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
    public function quantityBreakByWeightBreakId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\QuantityBreak', 'weight_break_id', 'quantity_break_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByWeightUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Uom', 'weight_uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productStoreShipmentMeth()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\ProductStoreShipmentMeth', 'product_store_ship_meth_id', 'product_store_ship_meth_id');
    }
}
