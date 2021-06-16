<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The available logging options for the load balancer traffic served by this backend service.
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.BackendServiceLogConfig</code>
 */
class BackendServiceLogConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * This field denotes whether to enable logging for the load balancer traffic served by this backend service.
     *
     * Generated from protobuf field <code>bool enable = 43328899;</code>
     */
    private $enable = false;
    /**
     * This field can only be specified if logging is enabled for this backend service. The value of the field must be in [0, 1]. This configures the sampling rate of requests to the load balancer where 1.0 means all logged requests are reported and 0.0 means no logged requests are reported. The default value is 1.0.
     *
     * Generated from protobuf field <code>float sample_rate = 153193045;</code>
     */
    private $sample_rate = 0.0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type bool $enable
     *           This field denotes whether to enable logging for the load balancer traffic served by this backend service.
     *     @type float $sample_rate
     *           This field can only be specified if logging is enabled for this backend service. The value of the field must be in [0, 1]. This configures the sampling rate of requests to the load balancer where 1.0 means all logged requests are reported and 0.0 means no logged requests are reported. The default value is 1.0.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * This field denotes whether to enable logging for the load balancer traffic served by this backend service.
     *
     * Generated from protobuf field <code>bool enable = 43328899;</code>
     * @return bool
     */
    public function getEnable()
    {
        return $this->enable;
    }

    /**
     * This field denotes whether to enable logging for the load balancer traffic served by this backend service.
     *
     * Generated from protobuf field <code>bool enable = 43328899;</code>
     * @param bool $var
     * @return $this
     */
    public function setEnable($var)
    {
        GPBUtil::checkBool($var);
        $this->enable = $var;

        return $this;
    }

    /**
     * This field can only be specified if logging is enabled for this backend service. The value of the field must be in [0, 1]. This configures the sampling rate of requests to the load balancer where 1.0 means all logged requests are reported and 0.0 means no logged requests are reported. The default value is 1.0.
     *
     * Generated from protobuf field <code>float sample_rate = 153193045;</code>
     * @return float
     */
    public function getSampleRate()
    {
        return $this->sample_rate;
    }

    /**
     * This field can only be specified if logging is enabled for this backend service. The value of the field must be in [0, 1]. This configures the sampling rate of requests to the load balancer where 1.0 means all logged requests are reported and 0.0 means no logged requests are reported. The default value is 1.0.
     *
     * Generated from protobuf field <code>float sample_rate = 153193045;</code>
     * @param float $var
     * @return $this
     */
    public function setSampleRate($var)
    {
        GPBUtil::checkFloat($var);
        $this->sample_rate = $var;

        return $this;
    }

}

