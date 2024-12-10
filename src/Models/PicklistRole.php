<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $picklist_id
 * @property string $party_id
 * @property string $role_type_id
 * @property string $from_date
 * @property string $created_by_user_login
 * @property string $last_modified_by_user_login
 * @property string $thru_date
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property UserLogin $userLoginByCreatedByUserLogin
 * @property UserLogin $userLoginByLastModifiedByUserLogin
 * @property Picklist $picklist
 */
class PicklistRole extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'picklist_role';

    /**
     * @var array
     */
    protected $fillable = ['created_by_user_login', 'last_modified_by_user_login', 'thru_date', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userLoginByCreatedByUserLogin()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\UserLogin', 'created_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userLoginByLastModifiedByUserLogin()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\UserLogin', 'last_modified_by_user_login', 'user_login_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function picklist()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Picklist', 'picklist_id', 'picklist_id');
    }
}
