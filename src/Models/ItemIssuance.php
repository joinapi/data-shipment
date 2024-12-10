<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $item_issuance_id
 * @property string $order_id
 * @property string $order_item_seq_id
 * @property string $inventory_item_id
 * @property string $shipment_id
 * @property string $shipment_item_seq_id
 * @property string $fixed_asset_id
 * @property string $maint_hist_seq_id
 * @property string $issued_by_user_login_id
 * @property string $ship_group_seq_id
 * @property string $issued_date_time
 * @property float $quantity
 * @property float $cancel_quantity
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property UserLogin $userLoginByIssuedByUserLoginId
 * @property InventoryItem $inventoryItem
 * @property InventoryItemDetail[] $inventoryItemDetails
 * @property InventoryTransfer[] $inventoryTransfers
 * @property ItemIssuanceRole[] $itemIssuanceRoles
 * @property OrderItemBilling[] $orderItemBillings
 */
class ItemIssuance extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item_issuance';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'item_issuance_id';

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
    protected $fillable = ['order_id', 'order_item_seq_id', 'inventory_item_id', 'shipment_id', 'shipment_item_seq_id', 'fixed_asset_id', 'maint_hist_seq_id', 'issued_by_user_login_id', 'ship_group_seq_id', 'issued_date_time', 'quantity', 'cancel_quantity', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userLoginByIssuedByUserLoginId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\UserLogin', 'issued_by_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function inventoryItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\InventoryItem', 'inventory_item_id', 'inventory_item_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventoryItemDetails()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\InventoryItemDetail', 'item_issuance_id', 'item_issuance_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventoryTransfers()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\InventoryTransfer', 'item_issuance_id', 'item_issuance_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function itemIssuanceRoles()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ItemIssuanceRole', 'item_issuance_id', 'item_issuance_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItemBillings()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\OrderItemBilling', 'item_issuance_id', 'item_issuance_id');
    }
}
