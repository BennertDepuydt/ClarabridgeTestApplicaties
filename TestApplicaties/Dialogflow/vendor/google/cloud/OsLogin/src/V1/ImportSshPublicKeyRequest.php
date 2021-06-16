<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/oslogin/v1/oslogin.proto

namespace Google\Cloud\OsLogin\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A request message for importing an SSH public key.
 *
 * Generated from protobuf message <code>google.cloud.oslogin.v1.ImportSshPublicKeyRequest</code>
 */
class ImportSshPublicKeyRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The unique ID for the user in format `users/{user}`.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $parent = '';
    /**
     * Optional. The SSH public key and expiration time.
     *
     * Generated from protobuf field <code>.google.cloud.oslogin.common.SshPublicKey ssh_public_key = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $ssh_public_key = null;
    /**
     * The project ID of the Google Cloud Platform project.
     *
     * Generated from protobuf field <code>string project_id = 3;</code>
     */
    private $project_id = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. The unique ID for the user in format `users/{user}`.
     *     @type \Google\Cloud\OsLogin\Common\SshPublicKey $ssh_public_key
     *           Optional. The SSH public key and expiration time.
     *     @type string $project_id
     *           The project ID of the Google Cloud Platform project.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Oslogin\V1\Oslogin::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The unique ID for the user in format `users/{user}`.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. The unique ID for the user in format `users/{user}`.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->parent = $var;

        return $this;
    }

    /**
     * Optional. The SSH public key and expiration time.
     *
     * Generated from protobuf field <code>.google.cloud.oslogin.common.SshPublicKey ssh_public_key = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Cloud\OsLogin\Common\SshPublicKey
     */
    public function getSshPublicKey()
    {
        return isset($this->ssh_public_key) ? $this->ssh_public_key : null;
    }

    public function hasSshPublicKey()
    {
        return isset($this->ssh_public_key);
    }

    public function clearSshPublicKey()
    {
        unset($this->ssh_public_key);
    }

    /**
     * Optional. The SSH public key and expiration time.
     *
     * Generated from protobuf field <code>.google.cloud.oslogin.common.SshPublicKey ssh_public_key = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Cloud\OsLogin\Common\SshPublicKey $var
     * @return $this
     */
    public function setSshPublicKey($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\OsLogin\Common\SshPublicKey::class);
        $this->ssh_public_key = $var;

        return $this;
    }

    /**
     * The project ID of the Google Cloud Platform project.
     *
     * Generated from protobuf field <code>string project_id = 3;</code>
     * @return string
     */
    public function getProjectId()
    {
        return $this->project_id;
    }

    /**
     * The project ID of the Google Cloud Platform project.
     *
     * Generated from protobuf field <code>string project_id = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setProjectId($var)
    {
        GPBUtil::checkString($var, True);
        $this->project_id = $var;

        return $this;
    }

}

