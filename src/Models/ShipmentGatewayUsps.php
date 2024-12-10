<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shipment_gateway_config_id
 * @property string $connect_url
 * @property string $connect_url_labels
 * @property float $connect_timeout
 * @property string $access_user_id
 * @property string $access_password
 * @property float $max_estimate_weight
 * @property string $test
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ShipmentGatewayConfig $shipmentGatewayConfig
 */
class ShipmentGatewayUsps extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipment_gateway_usps';

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
    protected $fillable = ['connect_url', 'connect_url_labels', 'connect_timeout', 'access_user_id', 'access_password', 'max_estimate_weight', 'test', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipmentGatewayConfig()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\ShipmentGatewayConfig', 'shipment_gateway_config_id', 'shipment_gateway_config_id');
    }
}
