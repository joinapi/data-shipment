<?php

namespace Joinbiz\Data\Models\Shipment;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $shipment_id
 * @property string $shipment_route_segment_id
 * @property string $delivery_id
 * @property string $origin_facility_id
 * @property string $dest_facility_id
 * @property string $origin_contact_mech_id
 * @property string $origin_telecom_number_id
 * @property string $dest_contact_mech_id
 * @property string $dest_telecom_number_id
 * @property string $carrier_party_id
 * @property string $shipment_method_type_id
 * @property string $carrier_service_status_id
 * @property string $billing_weight_uom_id
 * @property string $currency_uom_id
 * @property string $carrier_delivery_zone
 * @property string $carrier_restriction_codes
 * @property string $carrier_restriction_desc
 * @property float $billing_weight
 * @property float $actual_transport_cost
 * @property float $actual_service_cost
 * @property float $actual_other_cost
 * @property float $actual_cost
 * @property string $actual_start_date
 * @property string $actual_arrival_date
 * @property string $estimated_start_date
 * @property string $estimated_arrival_date
 * @property string $tracking_id_number
 * @property string $tracking_digest
 * @property string $updated_by_user_login_id
 * @property string $last_updated_date
 * @property string $home_delivery_type
 * @property string $home_delivery_date
 * @property string $third_party_account_number
 * @property string $third_party_postal_code
 * @property string $third_party_country_geo_code
 * @property string $ups_high_value_report
 * @property string $last_updated_stamp
 * @property string $last_updated_tx_stamp
 * @property string $created_stamp
 * @property string $created_tx_stamp
 * @property Uom $uomByBillingWeightUomId
 * @property StatusItem $statusItemByCarrierServiceStatusId
 * @property Party $partyByCarrierPartyId
 * @property Uom $uomByCurrencyUomId
 * @property Delivery $delivery
 * @property Facility $facilityByDestFacilityId
 * @property PostalAddress $postalAddressByDestContactMechId
 * @property TelecomNumber $telecomNumberByDestTelecomNumberId
 * @property Facility $facilityByOriginFacilityId
 * @property PostalAddress $postalAddressByOriginContactMechId
 * @property TelecomNumber $telecomNumberByOriginTelecomNumberId
 * @property ShipmentMethodType $shipmentMethodType
 * @property Shipment $shipment
 */
class ShipmentRouteSegment extends Model
{
    const CREATED_AT = 'created_stamp';
    const UPDATED_AT = 'last_updated_stamp';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shipment_route_segment';

    /**
     * @var array
     */
    protected $fillable = ['delivery_id', 'origin_facility_id', 'dest_facility_id', 'origin_contact_mech_id', 'origin_telecom_number_id', 'dest_contact_mech_id', 'dest_telecom_number_id', 'carrier_party_id', 'shipment_method_type_id', 'carrier_service_status_id', 'billing_weight_uom_id', 'currency_uom_id', 'carrier_delivery_zone', 'carrier_restriction_codes', 'carrier_restriction_desc', 'billing_weight', 'actual_transport_cost', 'actual_service_cost', 'actual_other_cost', 'actual_cost', 'actual_start_date', 'actual_arrival_date', 'estimated_start_date', 'estimated_arrival_date', 'tracking_id_number', 'tracking_digest', 'updated_by_user_login_id', 'last_updated_date', 'home_delivery_type', 'home_delivery_date', 'third_party_account_number', 'third_party_postal_code', 'third_party_country_geo_code', 'ups_high_value_report', 'last_updated_stamp', 'last_updated_tx_stamp', 'created_stamp', 'created_tx_stamp'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uomByBillingWeightUomId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Uom', 'billing_weight_uom_id', 'uom_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function statusItemByCarrierServiceStatusId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\StatusItem', 'carrier_service_status_id', 'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partyByCarrierPartyId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Party', 'carrier_party_id', 'party_id');
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
    public function delivery()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Delivery', 'delivery_id', 'delivery_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facilityByDestFacilityId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Facility', 'dest_facility_id', 'facility_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function postalAddressByDestContactMechId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\PostalAddress', 'dest_contact_mech_id', 'contact_mech_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function telecomNumberByDestTelecomNumberId()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\TelecomNumber', 'dest_telecom_number_id', 'contact_mech_id');
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
    public function shipmentMethodType()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\ShipmentMethodType', 'shipment_method_type_id', 'shipment_method_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipment()
    {
        return $this->belongsTo('Joinbiz\Data\Models\Shipment\Shipment', 'shipment_id', 'shipment_id');
    }
}
