<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/iot/v1/device_manager.proto

namespace Google\Cloud\Iot\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request for `UpdateDeviceRegistry`.
 *
 * Generated from protobuf message <code>google.cloud.iot.v1.UpdateDeviceRegistryRequest</code>
 */
class UpdateDeviceRegistryRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The new values for the device registry. The `id` field must be empty, and
     * the `name` field must indicate the path of the resource. For example,
     * `projects/example-project/locations/us-central1/registries/my-registry`.
     *
     * Generated from protobuf field <code>.google.cloud.iot.v1.DeviceRegistry device_registry = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $device_registry = null;
    /**
     * Required. Only updates the `device_registry` fields indicated by this mask.
     * The field mask must not be empty, and it must not contain fields that
     * are immutable or only set by the server.
     * Mutable top-level fields: `event_notification_config`, `http_config`,
     * `mqtt_config`, and `state_notification_config`.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $update_mask = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Iot\V1\DeviceRegistry $device_registry
     *           Required. The new values for the device registry. The `id` field must be empty, and
     *           the `name` field must indicate the path of the resource. For example,
     *           `projects/example-project/locations/us-central1/registries/my-registry`.
     *     @type \Google\Protobuf\FieldMask $update_mask
     *           Required. Only updates the `device_registry` fields indicated by this mask.
     *           The field mask must not be empty, and it must not contain fields that
     *           are immutable or only set by the server.
     *           Mutable top-level fields: `event_notification_config`, `http_config`,
     *           `mqtt_config`, and `state_notification_config`.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Iot\V1\DeviceManager::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The new values for the device registry. The `id` field must be empty, and
     * the `name` field must indicate the path of the resource. For example,
     * `projects/example-project/locations/us-central1/registries/my-registry`.
     *
     * Generated from protobuf field <code>.google.cloud.iot.v1.DeviceRegistry device_registry = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Iot\V1\DeviceRegistry
     */
    public function getDeviceRegistry()
    {
        return isset($this->device_registry) ? $this->device_registry : null;
    }

    public function hasDeviceRegistry()
    {
        return isset($this->device_registry);
    }

    public function clearDeviceRegistry()
    {
        unset($this->device_registry);
    }

    /**
     * Required. The new values for the device registry. The `id` field must be empty, and
     * the `name` field must indicate the path of the resource. For example,
     * `projects/example-project/locations/us-central1/registries/my-registry`.
     *
     * Generated from protobuf field <code>.google.cloud.iot.v1.DeviceRegistry device_registry = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Iot\V1\DeviceRegistry $var
     * @return $this
     */
    public function setDeviceRegistry($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Iot\V1\DeviceRegistry::class);
        $this->device_registry = $var;

        return $this;
    }

    /**
     * Required. Only updates the `device_registry` fields indicated by this mask.
     * The field mask must not be empty, and it must not contain fields that
     * are immutable or only set by the server.
     * Mutable top-level fields: `event_notification_config`, `http_config`,
     * `mqtt_config`, and `state_notification_config`.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Protobuf\FieldMask
     */
    public function getUpdateMask()
    {
        return isset($this->update_mask) ? $this->update_mask : null;
    }

    public function hasUpdateMask()
    {
        return isset($this->update_mask);
    }

    public function clearUpdateMask()
    {
        unset($this->update_mask);
    }

    /**
     * Required. Only updates the `device_registry` fields indicated by this mask.
     * The field mask must not be empty, and it must not contain fields that
     * are immutable or only set by the server.
     * Mutable top-level fields: `event_notification_config`, `http_config`,
     * `mqtt_config`, and `state_notification_config`.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Protobuf\FieldMask $var
     * @return $this
     */
    public function setUpdateMask($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\FieldMask::class);
        $this->update_mask = $var;

        return $this;
    }

}

