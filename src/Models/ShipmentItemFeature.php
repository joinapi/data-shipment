<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shipment_id
 * @property string $shipment_item_seq_id
 * @property string $product_feature_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ProductFeature $productFeature
 */
class ShipmentItemFeature extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipment_item_feature';

    /**
     * @var array
     */
    protected $fillable = ['last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productFeature()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\ProductFeature', 'product_feature_id', 'product_feature_id');
    }
}
