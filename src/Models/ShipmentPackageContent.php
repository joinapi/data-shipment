<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shipment_id
 * @property string $shipment_package_seq_id
 * @property string $shipment_item_seq_id
 * @property string $sub_product_id
 * @property float $quantity
 * @property float $sub_product_quantity
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Product $productBySubProductId
 */
class ShipmentPackageContent extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipment_package_content';

    /**
     * @var array
     */
    protected $fillable = ['sub_product_id', 'quantity', 'sub_product_quantity', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productBySubProductId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Product', 'sub_product_id', 'product_id');
    }
}
