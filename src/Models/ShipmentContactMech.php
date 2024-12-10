<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shipment_id
 * @property string $shipment_contact_mech_type_id
 * @property string $contact_mech_id
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Shipment $shipment
 * @property ContactMech $contactMech
 * @property ShipmentContactMechType $shipmentContactMechType
 */
class ShipmentContactMech extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipment_contact_mech';

    /**
     * @var array
     */
    protected $fillable = ['contact_mech_id', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipment()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Shipment', 'shipment_id', 'shipment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contactMech()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\ContactMech', 'contact_mech_id', 'contact_mech_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipmentContactMechType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\ShipmentContactMechType', 'shipment_contact_mech_type_id', 'shipment_contact_mech_type_id');
    }
}
