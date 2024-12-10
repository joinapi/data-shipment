<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shipment_gateway_config_id
 * @property string $shipment_gateway_conf_type_id
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ShipmentGatewayDhl $shipmentGatewayDhl
 * @property ShipmentGatewayFedex $shipmentGatewayFedex
 * @property ShipmentGatewayUps $shipmentGatewayUps
 * @property ProductStoreShipmentMeth[] $productStoreShipmentMeths
 * @property ShipmentGatewayConfigType $shipmentGatewayConfigType
 * @property ShipmentGatewayUsps $shipmentGatewayUsps
 */
class ShipmentGatewayConfig extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipment_gateway_config';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'shipment_gateway_config_id';

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
    protected $fillable = ['shipment_gateway_conf_type_id', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shipmentGatewayDhl()
    {
        return $this->hasOne('Joinbiz\Data\Models\Shipment\ShipmentGatewayDhl', 'shipment_gateway_config_id', 'shipment_gateway_config_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shipmentGatewayFedex()
    {
        return $this->hasOne('Joinbiz\Data\Models\Shipment\ShipmentGatewayFedex', 'shipment_gateway_config_id', 'shipment_gateway_config_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shipmentGatewayUps()
    {
        return $this->hasOne('Joinbiz\Data\Models\Shipment\ShipmentGatewayUps', 'shipment_gateway_config_id', 'shipment_gateway_config_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productStoreShipmentMeths()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ProductStoreShipmentMeth', 'shipment_gateway_config_id', 'shipment_gateway_config_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipmentGatewayConfigType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\ShipmentGatewayConfigType', 'shipment_gateway_conf_type_id', 'shipment_gateway_conf_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shipmentGatewayUsps()
    {
        return $this->hasOne('Joinbiz\Data\Models\Shipment\ShipmentGatewayUsps', 'shipment_gateway_config_id', 'shipment_gateway_config_id');
    }
}
