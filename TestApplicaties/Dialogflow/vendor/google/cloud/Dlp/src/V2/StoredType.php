<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/privacy/dlp/v2/storage.proto

namespace Google\Cloud\Dlp\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A reference to a StoredInfoType to use with scanning.
 *
 * Generated from protobuf message <code>google.privacy.dlp.v2.StoredType</code>
 */
class StoredType extends \Google\Protobuf\Internal\Message
{
    /**
     * Resource name of the requested `StoredInfoType`, for example
     * `organizations/433245324/storedInfoTypes/432452342` or
     * `projects/project-id/storedInfoTypes/432452342`.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     */
    private $name = '';
    /**
     * Timestamp indicating when the version of the `StoredInfoType` used for
     * inspection was created. Output-only field, populated by the system.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 2;</code>
     */
    private $create_time = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Resource name of the requested `StoredInfoType`, for example
     *           `organizations/433245324/storedInfoTypes/432452342` or
     *           `projects/project-id/storedInfoTypes/432452342`.
     *     @type \Google\Protobuf\Timestamp $create_time
     *           Timestamp indicating when the version of the `StoredInfoType` used for
     *           inspection was created. Output-only field, populated by the system.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Privacy\Dlp\V2\Storage::initOnce();
        parent::__construct($data);
    }

    /**
     * Resource name of the requested `StoredInfoType`, for example
     * `organizations/433245324/storedInfoTypes/432452342` or
     * `projects/project-id/storedInfoTypes/432452342`.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Resource name of the requested `StoredInfoType`, for example
     * `organizations/433245324/storedInfoTypes/432452342` or
     * `projects/project-id/storedInfoTypes/432452342`.
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Timestamp indicating when the version of the `StoredInfoType` used for
     * inspection was created. Output-only field, populated by the system.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 2;</code>
     * @return \Google\Protobuf\Timestamp
     */
    public function getCreateTime()
    {
        return isset($this->create_time) ? $this->create_time : null;
    }

    public function hasCreateTime()
    {
        return isset($this->create_time);
    }

    public function clearCreateTime()
    {
        unset($this->create_time);
    }

    /**
     * Timestamp indicating when the version of the `StoredInfoType` used for
     * inspection was created. Output-only field, populated by the system.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 2;</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setCreateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->create_time = $var;

        return $this;
    }

}

