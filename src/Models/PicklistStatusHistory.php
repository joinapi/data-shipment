<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $picklist_id
 * @property string $change_date
 * @property string $change_user_login_id
 * @property string $status_id
 * @property string $status_id_to
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property UserLogin $userLoginByChangeUserLoginId
 * @property StatusItem $statusItem
 * @property Picklist $picklist
 * @property StatusItem $statusItemByStatusIdTo
 */
class PicklistStatusHistory extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'picklist_status_history';

    /**
     * @var array
     */
    protected $fillable = ['change_user_login_id', 'status_id', 'status_id_to', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userLoginByChangeUserLoginId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\UserLogin', 'change_user_login_id', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItem()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\StatusItem', 'status_id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function picklist()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Picklist', 'picklist_id', 'picklist_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItemByStatusIdTo()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\StatusItem', 'status_id_to', 'status_id');
    }
}
