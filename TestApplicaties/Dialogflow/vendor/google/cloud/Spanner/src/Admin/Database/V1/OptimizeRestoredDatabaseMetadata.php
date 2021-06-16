<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/spanner/admin/database/v1/spanner_database_admin.proto

namespace Google\Cloud\Spanner\Admin\Database\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Metadata type for the long-running operation used to track the progress
 * of optimizations performed on a newly restored database. This long-running
 * operation is automatically created by the system after the successful
 * completion of a database restore, and cannot be cancelled.
 *
 * Generated from protobuf message <code>google.spanner.admin.database.v1.OptimizeRestoredDatabaseMetadata</code>
 */
class OptimizeRestoredDatabaseMetadata extends \Google\Protobuf\Internal\Message
{
    /**
     * Name of the restored database being optimized.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.resource_reference) = {</code>
     */
    private $name = '';
    /**
     * The progress of the post-restore optimizations.
     *
     * Generated from protobuf field <code>.google.spanner.admin.database.v1.OperationProgress progress = 2;</code>
     */
    private $progress = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Name of the restored database being optimized.
     *     @type \Google\Cloud\Spanner\Admin\Database\V1\OperationProgress $progress
     *           The progress of the post-restore optimizations.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Spanner\Admin\Database\V1\SpannerDatabaseAdmin::initOnce();
        parent::__construct($data);
    }

    /**
     * Name of the restored database being optimized.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Name of the restored database being optimized.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.resource_reference) = {</code>
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
     * The progress of the post-restore optimizations.
     *
     * Generated from protobuf field <code>.google.spanner.admin.database.v1.OperationProgress progress = 2;</code>
     * @return \Google\Cloud\Spanner\Admin\Database\V1\OperationProgress
     */
    public function getProgress()
    {
        return isset($this->progress) ? $this->progress : null;
    }

    public function hasProgress()
    {
        return isset($this->progress);
    }

    public function clearProgress()
    {
        unset($this->progress);
    }

    /**
     * The progress of the post-restore optimizations.
     *
     * Generated from protobuf field <code>.google.spanner.admin.database.v1.OperationProgress progress = 2;</code>
     * @param \Google\Cloud\Spanner\Admin\Database\V1\OperationProgress $var
     * @return $this
     */
    public function setProgress($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Spanner\Admin\Database\V1\OperationProgress::class);
        $this->progress = $var;

        return $this;
    }

}
