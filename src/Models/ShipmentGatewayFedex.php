<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shipment_gateway_config_id
 * @property string $connect_url
 * @property string $connect_soap_url
 * @property float $connect_timeout
 * @property string $access_account_nbr
 * @property string $access_meter_number
 * @property string $access_user_key
 * @property string $access_user_pwd
 * @property string $label_image_type
 * @property string $default_dropoff_type
 * @property string $default_packaging_type
 * @property string $template_shipment
 * @property string $template_subscription
 * @property string $rate_estimate_template
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ShipmentGatewayConfig $shipmentGatewayConfig
 */
class ShipmentGatewayFedex extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipment_gateway_fedex';

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
    protected $fillable = ['connect_url', 'connect_soap_url', 'connect_timeout', 'access_account_nbr', 'access_meter_number', 'access_user_key', 'access_user_pwd', 'label_image_type', 'default_dropoff_type', 'default_packaging_type', 'template_shipment', 'template_subscription', 'rate_estimate_template', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipmentGatewayConfig()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\ShipmentGatewayConfig', 'shipment_gateway_config_id', 'shipment_gateway_config_id');
    }
}
