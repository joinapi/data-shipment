<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shipment_id
 * @property string $shipment_type_id
 * @property string $status_id
 * @property string $primary_order_id
 * @property string $primary_return_id
 * @property string $picklist_bin_id
 * @property string $estimated_ship_work_eff_id
 * @property string $estimated_arrival_work_eff_id
 * @property string $currency_uom_id
 * @property string $origin_facility_id
 * @property string $destination_facility_id
 * @property string $origin_contact_mech_id
 * @property string $origin_telecom_number_id
 * @property string $destination_contact_mech_id
 * @property string $destination_telecom_number_id
 * @property string $party_id_to
 * @property string $party_id_from
 * @property string $primary_ship_group_seq_id
 * @property string $estimated_ready_date
 * @property string $estimated_ship_date
 * @property string $estimated_arrival_date
 * @property string $latest_cancel_date
 * @property float $estimated_ship_cost
 * @property string $handling_instructions
 * @property float $additional_shipping_charge
 * @property string $addtl_shipping_charge_desc
 * @property string $created_date
 * @property string $created_by_user_login
 * @property string $last_modified_date
 * @property string $last_modified_by_user_login
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property ShipmentRouteSegment[] $shipmentRouteSegments
 * @property ShipmentItem[] $shipmentItems
 * @property ShipmentStatus[] $shipmentStatuses
 * @property ReturnItemShipment[] $returnItemShipments
 * @property ShipmentAttribute[] $shipmentAttributes
 * @property AcctgTrans[] $acctgTrans
 * @property OrderShipment[] $orderShipments
 * @property ShipmentPackage[] $shipmentPackages
 * @property ShipmentContactMech[] $shipmentContactMeches
 * @property Uom $uomByCurrencyUomId
 * @property Facility $facilityByDestinationFacilityId
 * @property PostalAddress $postalAddressByDestinationContactMechId
 * @property TelecomNumber $telecomNumberByDestinationTelecomNumberId
 * @property WorkEffort $workEffortByEstimatedArrivalWorkEffId
 * @property WorkEffort $workEffortByEstimatedShipWorkEffId
 * @property Facility $facilityByOriginFacilityId
 * @property PostalAddress $postalAddressByOriginContactMechId
 * @property TelecomNumber $telecomNumberByOriginTelecomNumberId
 * @property PicklistBin $picklistBin
 * @property OrderHeader $orderHeaderByPrimaryOrderId
 * @property ReturnHeader $returnHeaderByPrimaryReturnId
 * @property Party $partyByPartyIdFrom
 * @property Party $partyByPartyIdTo
 * @property StatusItem $statusItem
 * @property ShipmentType $shipmentType
 */
class Shipment extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipment';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'shipment_id';

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
    protected $fillable = ['shipment_type_id', 'status_id', 'primary_order_id', 'primary_return_id', 'picklist_bin_id', 'estimated_ship_work_eff_id', 'estimated_arrival_work_eff_id', 'currency_uom_id', 'origin_facility_id', 'destination_facility_id', 'origin_contact_mech_id', 'origin_telecom_number_id', 'destination_contact_mech_id', 'destination_telecom_number_id', 'party_id_to', 'party_id_from', 'primary_ship_group_seq_id', 'estimated_ready_date', 'estimated_ship_date', 'estimated_arrival_date', 'latest_cancel_date', 'estimated_ship_cost', 'handling_instructions', 'additional_shipping_charge', 'addtl_shipping_charge_desc', 'created_date', 'created_by_user_login', 'last_modified_date', 'last_modified_by_user_login', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipmentRouteSegments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ShipmentRouteSegment', 'shipment_id', 'shipment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipmentItems()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ShipmentItem', 'shipment_id', 'shipment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipmentStatuses()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ShipmentStatus', 'shipment_id', 'shipment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function returnItemShipments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ReturnItemShipment', 'shipment_id', 'shipment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipmentAttributes()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ShipmentAttribute', 'shipment_id', 'shipment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function acctgTrans()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\AcctgTrans', 'shipment_id', 'shipment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderShipments()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\OrderShipment', 'shipment_id', 'shipment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipmentPackages()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ShipmentPackage', 'shipment_id', 'shipment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipmentContactMeches()
    {
        return $this->hasMany('Joinbiz\Data\Models\Shipment\ShipmentContactMech', 'shipment_id', 'shipment_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByCurrencyUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Uom', 'currency_uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facilityByDestinationFacilityId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Facility', 'destination_facility_id', 'facility_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function postalAddressByDestinationContactMechId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\PostalAddress', 'destination_contact_mech_id', 'contact_mech_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function telecomNumberByDestinationTelecomNumberId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\TelecomNumber', 'destination_telecom_number_id', 'contact_mech_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workEffortByEstimatedArrivalWorkEffId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\WorkEffort', 'estimated_arrival_work_eff_id', 'work_effort_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function workEffortByEstimatedShipWorkEffId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\WorkEffort', 'estimated_ship_work_eff_id', 'work_effort_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facilityByOriginFacilityId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Facility', 'origin_facility_id', 'facility_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function postalAddressByOriginContactMechId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\PostalAddress', 'origin_contact_mech_id', 'contact_mech_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function telecomNumberByOriginTelecomNumberId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\TelecomNumber', 'origin_telecom_number_id', 'contact_mech_id');
    }

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
    public function orderHeaderByPrimaryOrderId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\OrderHeader', 'primary_order_id', 'order_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function returnHeaderByPrimaryReturnId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\ReturnHeader', 'primary_return_id', 'return_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyByPartyIdFrom()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Party', 'party_id_from', 'party_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyByPartyIdTo()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Party', 'party_id_to', 'party_id');
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
    public function shipmentType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\ShipmentType', 'shipment_type_id', 'shipment_type_id');
    }
}
