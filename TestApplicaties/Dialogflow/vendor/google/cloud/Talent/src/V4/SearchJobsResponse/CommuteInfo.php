<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/talent/v4/job_service.proto

namespace Google\Cloud\Talent\V4\SearchJobsResponse;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Commute details related to this job.
 *
 * Generated from protobuf message <code>google.cloud.talent.v4.SearchJobsResponse.CommuteInfo</code>
 */
class CommuteInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Location used as the destination in the commute calculation.
     *
     * Generated from protobuf field <code>.google.cloud.talent.v4.Location job_location = 1;</code>
     */
    private $job_location = null;
    /**
     * The number of seconds required to travel to the job location from the
     * query location. A duration of 0 seconds indicates that the job isn't
     * reachable within the requested duration, but was returned as part of an
     * expanded query.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration travel_duration = 2;</code>
     */
    private $travel_duration = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Talent\V4\Location $job_location
     *           Location used as the destination in the commute calculation.
     *     @type \Google\Protobuf\Duration $travel_duration
     *           The number of seconds required to travel to the job location from the
     *           query location. A duration of 0 seconds indicates that the job isn't
     *           reachable within the requested duration, but was returned as part of an
     *           expanded query.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Talent\V4\JobService::initOnce();
        parent::__construct($data);
    }

    /**
     * Location used as the destination in the commute calculation.
     *
     * Generated from protobuf field <code>.google.cloud.talent.v4.Location job_location = 1;</code>
     * @return \Google\Cloud\Talent\V4\Location
     */
    public function getJobLocation()
    {
        return isset($this->job_location) ? $this->job_location : null;
    }

    public function hasJobLocation()
    {
        return isset($this->job_location);
    }

    public function clearJobLocation()
    {
        unset($this->job_location);
    }

    /**
     * Location used as the destination in the commute calculation.
     *
     * Generated from protobuf field <code>.google.cloud.talent.v4.Location job_location = 1;</code>
     * @param \Google\Cloud\Talent\V4\Location $var
     * @return $this
     */
    public function setJobLocation($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Talent\V4\Location::class);
        $this->job_location = $var;

        return $this;
    }

    /**
     * The number of seconds required to travel to the job location from the
     * query location. A duration of 0 seconds indicates that the job isn't
     * reachable within the requested duration, but was returned as part of an
     * expanded query.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration travel_duration = 2;</code>
     * @return \Google\Protobuf\Duration
     */
    public function getTravelDuration()
    {
        return isset($this->travel_duration) ? $this->travel_duration : null;
    }

    public function hasTravelDuration()
    {
        return isset($this->travel_duration);
    }

    public function clearTravelDuration()
    {
        unset($this->travel_duration);
    }

    /**
     * The number of seconds required to travel to the job location from the
     * query location. A duration of 0 seconds indicates that the job isn't
     * reachable within the requested duration, but was returned as part of an
     * expanded query.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration travel_duration = 2;</code>
     * @param \Google\Protobuf\Duration $var
     * @return $this
     */
    public function setTravelDuration($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Duration::class);
        $this->travel_duration = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CommuteInfo::class, \Google\Cloud\Talent\V4\SearchJobsResponse_CommuteInfo::class);

