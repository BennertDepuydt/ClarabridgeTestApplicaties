<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.StatefulPolicyPreservedStateDiskDevice</code>
 */
class StatefulPolicyPreservedStateDiskDevice extends \Google\Protobuf\Internal\Message
{
    /**
     * These stateful disks will never be deleted during autohealing, update or VM instance recreate operations. This flag is used to configure if the disk should be deleted after it is no longer used by the group, e.g. when the given instance or the whole group is deleted. Note: disks attached in READ_ONLY mode cannot be auto-deleted.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.StatefulPolicyPreservedStateDiskDevice.AutoDelete auto_delete = 196325947;</code>
     */
    private $auto_delete = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $auto_delete
     *           These stateful disks will never be deleted during autohealing, update or VM instance recreate operations. This flag is used to configure if the disk should be deleted after it is no longer used by the group, e.g. when the given instance or the whole group is deleted. Note: disks attached in READ_ONLY mode cannot be auto-deleted.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * These stateful disks will never be deleted during autohealing, update or VM instance recreate operations. This flag is used to configure if the disk should be deleted after it is no longer used by the group, e.g. when the given instance or the whole group is deleted. Note: disks attached in READ_ONLY mode cannot be auto-deleted.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.StatefulPolicyPreservedStateDiskDevice.AutoDelete auto_delete = 196325947;</code>
     * @return int
     */
    public function getAutoDelete()
    {
        return $this->auto_delete;
    }

    /**
     * These stateful disks will never be deleted during autohealing, update or VM instance recreate operations. This flag is used to configure if the disk should be deleted after it is no longer used by the group, e.g. when the given instance or the whole group is deleted. Note: disks attached in READ_ONLY mode cannot be auto-deleted.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.StatefulPolicyPreservedStateDiskDevice.AutoDelete auto_delete = 196325947;</code>
     * @param int $var
     * @return $this
     */
    public function setAutoDelete($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Compute\V1\StatefulPolicyPreservedStateDiskDevice\AutoDelete::class);
        $this->auto_delete = $var;

        return $this;
    }

}
