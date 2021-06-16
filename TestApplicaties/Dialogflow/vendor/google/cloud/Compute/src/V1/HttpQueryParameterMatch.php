<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * HttpRouteRuleMatch criteria for a request's query parameter.
 *
 * Generated from protobuf message <code>google.cloud.compute.v1.HttpQueryParameterMatch</code>
 */
class HttpQueryParameterMatch extends \Google\Protobuf\Internal\Message
{
    /**
     * The queryParameterMatch matches if the value of the parameter exactly matches the contents of exactMatch.
     * Only one of presentMatch, exactMatch or regexMatch must be set.
     *
     * Generated from protobuf field <code>string exact_match = 189205637;</code>
     */
    private $exact_match = '';
    /**
     * The name of the query parameter to match. The query parameter must exist in the request, in the absence of which the request match fails.
     *
     * Generated from protobuf field <code>string name = 3373707;</code>
     */
    private $name = '';
    /**
     * Specifies that the queryParameterMatch matches if the request contains the query parameter, irrespective of whether the parameter has a value or not.
     * Only one of presentMatch, exactMatch or regexMatch must be set.
     *
     * Generated from protobuf field <code>bool present_match = 67435841;</code>
     */
    private $present_match = false;
    /**
     * The queryParameterMatch matches if the value of the parameter matches the regular expression specified by regexMatch. For the regular expression grammar, please see en.cppreference.com/w/cpp/regex/ecmascript
     * Only one of presentMatch, exactMatch or regexMatch must be set.
     * Note that regexMatch only applies when the loadBalancingScheme is set to INTERNAL_SELF_MANAGED.
     *
     * Generated from protobuf field <code>string regex_match = 107387853;</code>
     */
    private $regex_match = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $exact_match
     *           The queryParameterMatch matches if the value of the parameter exactly matches the contents of exactMatch.
     *           Only one of presentMatch, exactMatch or regexMatch must be set.
     *     @type string $name
     *           The name of the query parameter to match. The query parameter must exist in the request, in the absence of which the request match fails.
     *     @type bool $present_match
     *           Specifies that the queryParameterMatch matches if the request contains the query parameter, irrespective of whether the parameter has a value or not.
     *           Only one of presentMatch, exactMatch or regexMatch must be set.
     *     @type string $regex_match
     *           The queryParameterMatch matches if the value of the parameter matches the regular expression specified by regexMatch. For the regular expression grammar, please see en.cppreference.com/w/cpp/regex/ecmascript
     *           Only one of presentMatch, exactMatch or regexMatch must be set.
     *           Note that regexMatch only applies when the loadBalancingScheme is set to INTERNAL_SELF_MANAGED.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Compute\V1\Compute::initOnce();
        parent::__construct($data);
    }

    /**
     * The queryParameterMatch matches if the value of the parameter exactly matches the contents of exactMatch.
     * Only one of presentMatch, exactMatch or regexMatch must be set.
     *
     * Generated from protobuf field <code>string exact_match = 189205637;</code>
     * @return string
     */
    public function getExactMatch()
    {
        return $this->exact_match;
    }

    /**
     * The queryParameterMatch matches if the value of the parameter exactly matches the contents of exactMatch.
     * Only one of presentMatch, exactMatch or regexMatch must be set.
     *
     * Generated from protobuf field <code>string exact_match = 189205637;</code>
     * @param string $var
     * @return $this
     */
    public function setExactMatch($var)
    {
        GPBUtil::checkString($var, True);
        $this->exact_match = $var;

        return $this;
    }

    /**
     * The name of the query parameter to match. The query parameter must exist in the request, in the absence of which the request match fails.
     *
     * Generated from protobuf field <code>string name = 3373707;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * The name of the query parameter to match. The query parameter must exist in the request, in the absence of which the request match fails.
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
     * Specifies that the queryParameterMatch matches if the request contains the query parameter, irrespective of whether the parameter has a value or not.
     * Only one of presentMatch, exactMatch or regexMatch must be set.
     *
     * Generated from protobuf field <code>bool present_match = 67435841;</code>
     * @return bool
     */
    public function getPresentMatch()
    {
        return $this->present_match;
    }

    /**
     * Specifies that the queryParameterMatch matches if the request contains the query parameter, irrespective of whether the parameter has a value or not.
     * Only one of presentMatch, exactMatch or regexMatch must be set.
     *
     * Generated from protobuf field <code>bool present_match = 67435841;</code>
     * @param bool $var
     * @return $this
     */
    public function setPresentMatch($var)
    {
        GPBUtil::checkBool($var);
        $this->present_match = $var;

        return $this;
    }

    /**
     * The queryParameterMatch matches if the value of the parameter matches the regular expression specified by regexMatch. For the regular expression grammar, please see en.cppreference.com/w/cpp/regex/ecmascript
     * Only one of presentMatch, exactMatch or regexMatch must be set.
     * Note that regexMatch only applies when the loadBalancingScheme is set to INTERNAL_SELF_MANAGED.
     *
     * Generated from protobuf field <code>string regex_match = 107387853;</code>
     * @return string
     */
    public function getRegexMatch()
    {
        return $this->regex_match;
    }

    /**
     * The queryParameterMatch matches if the value of the parameter matches the regular expression specified by regexMatch. For the regular expression grammar, please see en.cppreference.com/w/cpp/regex/ecmascript
     * Only one of presentMatch, exactMatch or regexMatch must be set.
     * Note that regexMatch only applies when the loadBalancingScheme is set to INTERNAL_SELF_MANAGED.
     *
     * Generated from protobuf field <code>string regex_match = 107387853;</code>
     * @param string $var
     * @return $this
     */
    public function setRegexMatch($var)
    {
        GPBUtil::checkString($var, True);
        $this->regex_match = $var;

        return $this;
    }

}

