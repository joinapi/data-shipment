<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $picklist_bin_id
 * @property string $order_id
 * @property string $order_item_seq_id
 * @property string $ship_group_seq_id
 * @property string $inventory_item_id
 * @property string $item_status_id
 * @property float $quantity
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PicklistBin $picklistBin
 * @property InventoryItem $inventoryItem
 * @property StatusItem $statusItemByItemStatusId
 */
class PicklistItem extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'picklist_item';

    /**
     * @var array
     */
    protected $fillable = ['item_status_id', 'quantity', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function picklistBin()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\PicklistBin', 'picklist_bin_id', 'picklist_bin_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventoryItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\InventoryItem', 'inventory_item_id', 'inventory_item_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItemByItemStatusId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\StatusItem', 'item_status_id', 'status_id');
    }
}
