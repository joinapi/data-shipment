<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shipment_id
 * @property string $shipment_package_seq_id
 * @property string $shipment_route_segment_id
 * @property string $currency_uom_id
 * @property string $tracking_code
 * @property string $box_number
 * @property string $label_image
 * @property string $label_intl_sign_image
 * @property string $label_html
 * @property string $label_printed
 * @property string $international_invoice
 * @property float $package_transport_cost
 * @property float $package_service_cost
 * @property float $package_other_cost
 * @property float $cod_amount
 * @property float $insured_amount
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Uom $uomByCurrencyUomId
 */
class ShipmentPackageRouteSeg extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipment_package_route_seg';

    /**
     * @var array
     */
    protected $fillable = ['currency_uom_id', 'tracking_code', 'box_number', 'label_image', 'label_intl_sign_image', 'label_html', 'label_printed', 'international_invoice', 'package_transport_cost', 'package_service_cost', 'package_other_cost', 'cod_amount', 'insured_amount', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByCurrencyUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Uom', 'currency_uom_id', 'uom_id');
    }
}
