<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $item_issuance_id
 * @property string $party_id
 * @property string $role_type_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ItemIssuance $itemIssuance
 * @property Party $party
 */
class ItemIssuanceRole extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item_issuance_role';

    /**
     * @var array
     */
    protected $fillable = ['last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function itemIssuance()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\ItemIssuance', 'item_issuance_id', 'item_issuance_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function party()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Party', 'party_id', 'party_id');
    }
}
