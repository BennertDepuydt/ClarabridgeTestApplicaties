<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/channel/v1/service.proto

namespace Google\Cloud\Channel\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for [CloudChannelService.ListCustomers][google.cloud.channel.v1.CloudChannelService.ListCustomers]
 *
 * Generated from protobuf message <code>google.cloud.channel.v1.ListCustomersRequest</code>
 */
class ListCustomersRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The resource name of the reseller account from which to list customers.
     * The parent takes the format: accounts/{account_id}.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $parent = '';
    /**
     * Optional. The maximum number of customers to return. The service may return fewer
     * than this value. If unspecified, at most 10 customers will be returned. The
     * maximum value is 50; values about 50 will be coerced to 50.
     *
     * Generated from protobuf field <code>int32 page_size = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $page_size = 0;
    /**
     * Optional. A token identifying a page of results, if other than the first one.
     * Typically obtained via
     * [ListCustomersResponse.next_page_token][google.cloud.channel.v1.ListCustomersResponse.next_page_token] of the previous
     * [CloudChannelService.ListCustomers][google.cloud.channel.v1.CloudChannelService.ListCustomers] call.
     *
     * Generated from protobuf field <code>string page_token = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $page_token = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. The resource name of the reseller account from which to list customers.
     *           The parent takes the format: accounts/{account_id}.
     *     @type int $page_size
     *           Optional. The maximum number of customers to return. The service may return fewer
     *           than this value. If unspecified, at most 10 customers will be returned. The
     *           maximum value is 50; values about 50 will be coerced to 50.
     *     @type string $page_token
     *           Optional. A token identifying a page of results, if other than the first one.
     *           Typically obtained via
     *           [ListCustomersResponse.next_page_token][google.cloud.channel.v1.ListCustomersResponse.next_page_token] of the previous
     *           [CloudChannelService.ListCustomers][google.cloud.channel.v1.CloudChannelService.ListCustomers] call.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Channel\V1\Service::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The resource name of the reseller account from which to list customers.
     * The parent takes the format: accounts/{account_id}.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. The resource name of the reseller account from which to list customers.
     * The parent takes the format: accounts/{account_id}.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED];</code>
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
     * Optional. The maximum number of customers to return. The service may return fewer
     * than this value. If unspecified, at most 10 customers will be returned. The
     * maximum value is 50; values about 50 will be coerced to 50.
     *
     * Generated from protobuf field <code>int32 page_size = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return int
     */
    public function getPageSize()
    {
        return $this->page_size;
    }

    /**
     * Optional. The maximum number of customers to return. The service may return fewer
     * than this value. If unspecified, at most 10 customers will be returned. The
     * maximum value is 50; values about 50 will be coerced to 50.
     *
     * Generated from protobuf field <code>int32 page_size = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param int $var
     * @return $this
     */
    public function setPageSize($var)
    {
        GPBUtil::checkInt32($var);
        $this->page_size = $var;

        return $this;
    }

    /**
     * Optional. A token identifying a page of results, if other than the first one.
     * Typically obtained via
     * [ListCustomersResponse.next_page_token][google.cloud.channel.v1.ListCustomersResponse.next_page_token] of the previous
     * [CloudChannelService.ListCustomers][google.cloud.channel.v1.CloudChannelService.ListCustomers] call.
     *
     * Generated from protobuf field <code>string page_token = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getPageToken()
    {
        return $this->page_token;
    }

    /**
     * Optional. A token identifying a page of results, if other than the first one.
     * Typically obtained via
     * [ListCustomersResponse.next_page_token][google.cloud.channel.v1.ListCustomersResponse.next_page_token] of the previous
     * [CloudChannelService.ListCustomers][google.cloud.channel.v1.CloudChannelService.ListCustomers] call.
     *
     * Generated from protobuf field <code>string page_token = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->page_token = $var;

        return $this;
    }

}

