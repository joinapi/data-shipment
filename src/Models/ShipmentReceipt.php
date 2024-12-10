<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $receipt_id
 * @property string $inventory_item_id
 * @property string $product_id
 * @property string $shipment_id
 * @property string $shipment_package_seq_id
 * @property string $order_id
 * @property string $order_item_seq_id
 * @property string $return_id
 * @property string $return_item_seq_id
 * @property string $rejection_id
 * @property string $received_by_user_login_id
 * @property string $shipment_item_seq_id
 * @property string $datetime_received
 * @property string $item_description
 * @property float $quantity_accepted
 * @property float $quantity_rejected
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property InventoryItemDetail[] $inventoryItemDetails
 * @property ShipmentReceiptRole[] $shipmentReceiptRoles
 * @property ReturnItemBilling[] $returnItemBillingsByShipmentReceiptId
 * @property OrderItemBilling[] $orderItemBillingsByShipmentReceiptId
 * @property AcctgTrans[] $acctgTrans
 * @property InventoryItem $inventoryItem
 * @property Product $product
 * @property RejectionReason $rejectionReason
 * @property UserLogin $userLoginByReceivedByUserLoginId
 */
class ShipmentReceipt extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipment_receipt';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'receipt_id';

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
    protected $fillable = ['inventory_item_id', 'product_id', 'shipment_id', 'shipment_package_seq_id', 'order_id', 'order_item_seq_id', 'return_id', 'return_item_seq_id', 'rejection_id', 'received_by_user_login_id', 'shipment_item_seq_id', 'datetime_received', 'item_description', 'quantity_accepted', 'quantity_rejected', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventoryItemDetails()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\InventoryItemDetail', 'receipt_id', 'receipt_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipmentReceiptRoles()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ShipmentReceiptRole', 'receipt_id', 'receipt_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnItemBillingsByShipmentReceiptId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ReturnItemBilling', 'shipment_receipt_id', 'receipt_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItemBillingsByShipmentReceiptId()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\OrderItemBilling', 'shipment_receipt_id', 'receipt_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function acctgTrans()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\AcctgTrans', 'receipt_id', 'receipt_id');
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
    public function product()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Product', 'product_id', 'product_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rejectionReason()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\RejectionReason', 'rejection_id', 'rejection_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userLoginByReceivedByUserLoginId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\UserLogin', 'received_by_user_login_id', 'user_login_id');
    }
}
