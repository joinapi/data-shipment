<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $document_id
 * @property string $shipment_id
 * @property string $shipment_item_seq_id
 * @property string $shipment_package_seq_id
 * @property string $description
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Document $document
 */
class ShippingDocument extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipping_document';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'document_id';

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
    protected $fillable = ['shipment_id', 'shipment_item_seq_id', 'shipment_package_seq_id', 'description', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function document()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Document', 'document_id', 'document_id');
    }
}
