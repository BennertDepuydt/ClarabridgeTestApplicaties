<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/gaming/v1/game_server_clusters.proto

namespace Google\Cloud\Gaming\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Response message for GameServerClustersService.PreviewUpdateGameServerCluster
 *
 * Generated from protobuf message <code>google.cloud.gaming.v1.PreviewUpdateGameServerClusterResponse</code>
 */
class PreviewUpdateGameServerClusterResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * The ETag of the game server cluster.
     *
     * Generated from protobuf field <code>string etag = 2;</code>
     */
    private $etag = '';
    /**
     * The target state.
     *
     * Generated from protobuf field <code>.google.cloud.gaming.v1.TargetState target_state = 3;</code>
     */
    private $target_state = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $etag
     *           The ETag of the game server cluster.
     *     @type \Google\Cloud\Gaming\V1\TargetState $target_state
     *           The target state.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Gaming\V1\GameServerClusters::initOnce();
        parent::__construct($data);
    }

    /**
     * The ETag of the game server cluster.
     *
     * Generated from protobuf field <code>string etag = 2;</code>
     * @return string
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * The ETag of the game server cluster.
     *
     * Generated from protobuf field <code>string etag = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setEtag($var)
    {
        GPBUtil::checkString($var, True);
        $this->etag = $var;

        return $this;
    }

    /**
     * The target state.
     *
     * Generated from protobuf field <code>.google.cloud.gaming.v1.TargetState target_state = 3;</code>
     * @return \Google\Cloud\Gaming\V1\TargetState
     */
    public function getTargetState()
    {
        return isset($this->target_state) ? $this->target_state : null;
    }

    public function hasTargetState()
    {
        return isset($this->target_state);
    }

    public function clearTargetState()
    {
        unset($this->target_state);
    }

    /**
     * The target state.
     *
     * Generated from protobuf field <code>.google.cloud.gaming.v1.TargetState target_state = 3;</code>
     * @param \Google\Cloud\Gaming\V1\TargetState $var
     * @return $this
     */
    public function setTargetState($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Gaming\V1\TargetState::class);
        $this->target_state = $var;

        return $this;
    }

}

