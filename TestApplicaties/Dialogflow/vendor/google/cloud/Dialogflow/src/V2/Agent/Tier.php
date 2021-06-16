<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dialogflow/v2/agent.proto

namespace Google\Cloud\Dialogflow\V2\Agent;

use UnexpectedValueException;

/**
 * Represents the agent tier.
 *
 * Protobuf type <code>google.cloud.dialogflow.v2.Agent.Tier</code>
 */
class Tier
{
    /**
     * Not specified. This value should never be used.
     *
     * Generated from protobuf enum <code>TIER_UNSPECIFIED = 0;</code>
     */
    const TIER_UNSPECIFIED = 0;
    /**
     * Standard tier.
     *
     * Generated from protobuf enum <code>TIER_STANDARD = 1;</code>
     */
    const TIER_STANDARD = 1;
    /**
     * Enterprise tier (Essentials).
     *
     * Generated from protobuf enum <code>TIER_ENTERPRISE = 2;</code>
     */
    const TIER_ENTERPRISE = 2;
    /**
     * Enterprise tier (Plus).
     *
     * Generated from protobuf enum <code>TIER_ENTERPRISE_PLUS = 3;</code>
     */
    const TIER_ENTERPRISE_PLUS = 3;

    private static $valueToName = [
        self::TIER_UNSPECIFIED => 'TIER_UNSPECIFIED',
        self::TIER_STANDARD => 'TIER_STANDARD',
        self::TIER_ENTERPRISE => 'TIER_ENTERPRISE',
        self::TIER_ENTERPRISE_PLUS => 'TIER_ENTERPRISE_PLUS',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Tier::class, \Google\Cloud\Dialogflow\V2\Agent_Tier::class);

