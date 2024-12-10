<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shipment_gateway_config_id
 * @property string $connect_url
 * @property float $connect_timeout
 * @property string $shipper_number
 * @property string $bill_shipper_account_number
 * @property string $access_license_number
 * @property string $access_user_id
 * @property string $access_password
 * @property string $save_cert_info
 * @property string $save_cert_path
 * @property string $shipper_pickup_type
 * @property string $customer_classification
 * @property float $max_estimate_weight
 * @property float $min_estimate_weight
 * @property string $cod_allow_cod
 * @property float $cod_surcharge_amount
 * @property string $cod_surcharge_currency_uom_id
 * @property string $cod_surcharge_apply_to_package
 * @property string $cod_funds_code
 * @property string $default_return_label_memo
 * @property string $default_return_label_subject
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ShipmentGatewayConfig $shipmentGatewayConfig
 */
class ShipmentGatewayUps extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipment_gateway_ups';

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
    protected $fillable = ['connect_url', 'connect_timeout', 'shipper_number', 'bill_shipper_account_number', 'access_license_number', 'access_user_id', 'access_password', 'save_cert_info', 'save_cert_path', 'shipper_pickup_type', 'customer_classification', 'max_estimate_weight', 'min_estimate_weight', 'cod_allow_cod', 'cod_surcharge_amount', 'cod_surcharge_currency_uom_id', 'cod_surcharge_apply_to_package', 'cod_funds_code', 'default_return_label_memo', 'default_return_label_subject', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipmentGatewayConfig()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\ShipmentGatewayConfig', 'shipment_gateway_config_id', 'shipment_gateway_config_id');
    }
}
