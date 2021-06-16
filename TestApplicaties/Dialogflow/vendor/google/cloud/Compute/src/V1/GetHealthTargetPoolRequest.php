<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A request message for TargetPools.GetHealth. See the method description for details.
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.GetHealthTargetPoolRequest</code>
 */
class GetHealthTargetPoolRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * The body resource for this request
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.InstanceReference instance_reference_resource = 24490604 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $instance_reference_resource = null;
    /**
     * Project ID for this request.
     *
     * Generated from protobuf field <code>string project = 227560217 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $project = '';
    /**
     * Name of the region scoping this request.
     *
     * Generated from protobuf field <code>string region = 138946292 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $region = '';
    /**
     * Name of the TargetPool resource to which the queried instance belongs.
     *
     * Generated from protobuf field <code>string target_pool = 62796298 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $target_pool = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Compute\V1\InstanceReference $instance_reference_resource
     *           The body resource for this request
     *     @type string $project
     *           Project ID for this request.
     *     @type string $region
     *           Name of the region scoping this request.
     *     @type string $target_pool
     *           Name of the TargetPool resource to which the queried instance belongs.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * The body resource for this request
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.InstanceReference instance_reference_resource = 24490604 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Compute\V1\InstanceReference
     */
    public function getInstanceReferenceResource()
    {
        return isset($this->instance_reference_resource) ? $this->instance_reference_resource : null;
    }

    public function hasInstanceReferenceResource()
    {
        return isset($this->instance_reference_resource);
    }

    public function clearInstanceReferenceResource()
    {
        unset($this->instance_reference_resource);
    }

    /**
     * The body resource for this request
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.InstanceReference instance_reference_resource = 24490604 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Compute\V1\InstanceReference $var
     * @return $this
     */
    public function setInstanceReferenceResource($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Compute\V1\InstanceReference::class);
        $this->instance_reference_resource = $var;

        return $this;
    }

    /**
     * Project ID for this request.
     *
     * Generated from protobuf field <code>string project = 227560217 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Project ID for this request.
     *
     * Generated from protobuf field <code>string project = 227560217 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setProject($var)
    {
        GPBUtil::checkString($var, True);
        $this->project = $var;

        return $this;
    }

    /**
     * Name of the region scoping this request.
     *
     * Generated from protobuf field <code>string region = 138946292 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Name of the region scoping this request.
     *
     * Generated from protobuf field <code>string region = 138946292 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setRegion($var)
    {
        GPBUtil::checkString($var, True);
        $this->region = $var;

        return $this;
    }

    /**
     * Name of the TargetPool resource to which the queried instance belongs.
     *
     * Generated from protobuf field <code>string target_pool = 62796298 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getTargetPool()
    {
        return $this->target_pool;
    }

    /**
     * Name of the TargetPool resource to which the queried instance belongs.
     *
     * Generated from protobuf field <code>string target_pool = 62796298 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setTargetPool($var)
    {
        GPBUtil::checkString($var, True);
        $this->target_pool = $var;

        return $this;
    }

}

