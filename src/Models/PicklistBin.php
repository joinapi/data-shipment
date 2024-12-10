<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $picklist_bin_id
 * @property string $picklist_id
 * @property string $primary_order_id
 * @property string $primary_ship_group_seq_id
 * @property float $bin_location_number
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property PicklistItem[] $picklistItems
 * @property Shipment[] $shipments
 * @property Picklist $picklist
 */
class PicklistBin extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'picklist_bin';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'picklist_bin_id';

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
    protected $fillable = ['picklist_id', 'primary_order_id', 'primary_ship_group_seq_id', 'bin_location_number', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function picklistItems()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\PicklistItem', 'picklist_bin_id', 'picklist_bin_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\Shipment', 'picklist_bin_id', 'picklist_bin_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function picklist()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Picklist', 'picklist_id', 'picklist_id');
    }
}
