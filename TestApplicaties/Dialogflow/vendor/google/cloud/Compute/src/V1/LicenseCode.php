<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a License Code resource.
 * A License Code is a unique identifier used to represent a license resource.  Caution This resource is intended for use only by third-party partners who are creating Cloud Marketplace images. (== resource_for {$api_version}.licenseCodes ==)
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.LicenseCode</code>
 */
class LicenseCode extends \Google\Protobuf\Internal\Message
{
    /**
     * [Output Only] Creation timestamp in RFC3339 text format.
     *
     * Generated from protobuf field <code>string creation_timestamp = 30525366;</code>
     */
    private $creation_timestamp = '';
    /**
     * [Output Only] Description of this License Code.
     *
     * Generated from protobuf field <code>string description = 154502140;</code>
     */
    private $description = '';
    /**
     * [Output Only] The unique identifier for the resource. This identifier is defined by the server.
     *
     * Generated from protobuf field <code>string id = 3355;</code>
     */
    private $id = '';
    /**
     * [Output Only] Type of resource. Always compute#licenseCode for licenses.
     *
     * Generated from protobuf field <code>string kind = 3292052;</code>
     */
    private $kind = '';
    /**
     * [Output Only] URL and description aliases of Licenses with the same License Code.
     *
     * Generated from protobuf field <code>repeated .google.cloud.compute.v1.LicenseCodeLicenseAlias license_alias = 43550930;</code>
     */
    private $license_alias;
    /**
     * [Output Only] Name of the resource. The name is 1-20 characters long and must be a valid 64 bit integer.
     *
     * Generated from protobuf field <code>string name = 3373707;</code>
     */
    private $name = '';
    /**
     * [Output Only] Server-defined URL for the resource.
     *
     * Generated from protobuf field <code>string self_link = 187779341;</code>
     */
    private $self_link = '';
    /**
     * [Output Only] Current state of this License Code.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.LicenseCode.State state = 109757585;</code>
     */
    private $state = 0;
    /**
     * [Output Only] If true, the license will remain attached when creating images or snapshots from disks. Otherwise, the license is not transferred.
     *
     * Generated from protobuf field <code>bool transferable = 4349893;</code>
     */
    private $transferable = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $creation_timestamp
     *           [Output Only] Creation timestamp in RFC3339 text format.
     *     @type string $description
     *           [Output Only] Description of this License Code.
     *     @type string $id
     *           [Output Only] The unique identifier for the resource. This identifier is defined by the server.
     *     @type string $kind
     *           [Output Only] Type of resource. Always compute#licenseCode for licenses.
     *     @type \Google\Cloud\Compute\V1\LicenseCodeLicenseAlias[]|\Google\Protobuf\Internal\RepeatedField $license_alias
     *           [Output Only] URL and description aliases of Licenses with the same License Code.
     *     @type string $name
     *           [Output Only] Name of the resource. The name is 1-20 characters long and must be a valid 64 bit integer.
     *     @type string $self_link
     *           [Output Only] Server-defined URL for the resource.
     *     @type int $state
     *           [Output Only] Current state of this License Code.
     *     @type bool $transferable
     *           [Output Only] If true, the license will remain attached when creating images or snapshots from disks. Otherwise, the license is not transferred.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * [Output Only] Creation timestamp in RFC3339 text format.
     *
     * Generated from protobuf field <code>string creation_timestamp = 30525366;</code>
     * @return string
     */
    public function getCreationTimestamp()
    {
        return $this->creation_timestamp;
    }

    /**
     * [Output Only] Creation timestamp in RFC3339 text format.
     *
     * Generated from protobuf field <code>string creation_timestamp = 30525366;</code>
     * @param string $var
     * @return $this
     */
    public function setCreationTimestamp($var)
    {
        GPBUtil::checkString($var, True);
        $this->creation_timestamp = $var;

        return $this;
    }

    /**
     * [Output Only] Description of this License Code.
     *
     * Generated from protobuf field <code>string description = 154502140;</code>
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * [Output Only] Description of this License Code.
     *
     * Generated from protobuf field <code>string description = 154502140;</code>
     * @param string $var
     * @return $this
     */
    public function setDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->description = $var;

        return $this;
    }

    /**
     * [Output Only] The unique identifier for the resource. This identifier is defined by the server.
     *
     * Generated from protobuf field <code>string id = 3355;</code>
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * [Output Only] The unique identifier for the resource. This identifier is defined by the server.
     *
     * Generated from protobuf field <code>string id = 3355;</code>
     * @param string $var
     * @return $this
     */
    public function setId($var)
    {
        GPBUtil::checkString($var, True);
        $this->id = $var;

        return $this;
    }

    /**
     * [Output Only] Type of resource. Always compute#licenseCode for licenses.
     *
     * Generated from protobuf field <code>string kind = 3292052;</code>
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * [Output Only] Type of resource. Always compute#licenseCode for licenses.
     *
     * Generated from protobuf field <code>string kind = 3292052;</code>
     * @param string $var
     * @return $this
     */
    public function setKind($var)
    {
        GPBUtil::checkString($var, True);
        $this->kind = $var;

        return $this;
    }

    /**
     * [Output Only] URL and description aliases of Licenses with the same License Code.
     *
     * Generated from protobuf field <code>repeated .google.cloud.compute.v1.LicenseCodeLicenseAlias license_alias = 43550930;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getLicenseAlias()
    {
        return $this->license_alias;
    }

    /**
     * [Output Only] URL and description aliases of Licenses with the same License Code.
     *
     * Generated from protobuf field <code>repeated .google.cloud.compute.v1.LicenseCodeLicenseAlias license_alias = 43550930;</code>
     * @param \Google\Cloud\Compute\V1\LicenseCodeLicenseAlias[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setLicenseAlias($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Compute\V1\LicenseCodeLicenseAlias::class);
        $this->license_alias = $arr;

        return $this;
    }

    /**
     * [Output Only] Name of the resource. The name is 1-20 characters long and must be a valid 64 bit integer.
     *
     * Generated from protobuf field <code>string name = 3373707;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * [Output Only] Name of the resource. The name is 1-20 characters long and must be a valid 64 bit integer.
     *
     * Generated from protobuf field <code>string name = 3373707;</code>
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
     * [Output Only] Server-defined URL for the resource.
     *
     * Generated from protobuf field <code>string self_link = 187779341;</code>
     * @return string
     */
    public function getSelfLink()
    {
        return $this->self_link;
    }

    /**
     * [Output Only] Server-defined URL for the resource.
     *
     * Generated from protobuf field <code>string self_link = 187779341;</code>
     * @param string $var
     * @return $this
     */
    public function setSelfLink($var)
    {
        GPBUtil::checkString($var, True);
        $this->self_link = $var;

        return $this;
    }

    /**
     * [Output Only] Current state of this License Code.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.LicenseCode.State state = 109757585;</code>
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * [Output Only] Current state of this License Code.
     *
     * Generated from protobuf field <code>.google.cloud.compute.v1.LicenseCode.State state = 109757585;</code>
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Compute\V1\LicenseCode\State::class);
        $this->state = $var;

        return $this;
    }

    /**
     * [Output Only] If true, the license will remain attached when creating images or snapshots from disks. Otherwise, the license is not transferred.
     *
     * Generated from protobuf field <code>bool transferable = 4349893;</code>
     * @return bool
     */
    public function getTransferable()
    {
        return $this->transferable;
    }

    /**
     * [Output Only] If true, the license will remain attached when creating images or snapshots from disks. Otherwise, the license is not transferred.
     *
     * Generated from protobuf field <code>bool transferable = 4349893;</code>
     * @param bool $var
     * @return $this
     */
    public function setTransferable($var)
    {
        GPBUtil::checkBool($var);
        $this->transferable = $var;

        return $this;
    }

}

