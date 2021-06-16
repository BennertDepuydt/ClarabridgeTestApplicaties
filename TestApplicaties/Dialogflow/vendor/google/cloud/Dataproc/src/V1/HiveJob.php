<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dataproc/v1/jobs.proto

namespace Google\Cloud\Dataproc\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A Dataproc job for running [Apache Hive](https://hive.apache.org/)
 * queries on YARN.
 *
 * Generated from protobuf message <code>google.cloud.dataproc.v1.HiveJob</code>
 */
class HiveJob extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. Whether to continue executing queries if a query fails.
     * The default value is `false`. Setting to `true` can be useful when
     * executing independent parallel queries.
     *
     * Generated from protobuf field <code>bool continue_on_failure = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $continue_on_failure = false;
    /**
     * Optional. Mapping of query variable names to values (equivalent to the
     * Hive command: `SET name="value";`).
     *
     * Generated from protobuf field <code>map<string, string> script_variables = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $script_variables;
    /**
     * Optional. A mapping of property names and values, used to configure Hive.
     * Properties that conflict with values set by the Dataproc API may be
     * overwritten. Can include properties set in /etc/hadoop/conf/&#42;-site.xml,
     * /etc/hive/conf/hive-site.xml, and classes in user code.
     *
     * Generated from protobuf field <code>map<string, string> properties = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $properties;
    /**
     * Optional. HCFS URIs of jar files to add to the CLASSPATH of the
     * Hive server and Hadoop MapReduce (MR) tasks. Can contain Hive SerDes
     * and UDFs.
     *
     * Generated from protobuf field <code>repeated string jar_file_uris = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $jar_file_uris;
    protected $queries;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $query_file_uri
     *           The HCFS URI of the script that contains Hive queries.
     *     @type \Google\Cloud\Dataproc\V1\QueryList $query_list
     *           A list of queries.
     *     @type bool $continue_on_failure
     *           Optional. Whether to continue executing queries if a query fails.
     *           The default value is `false`. Setting to `true` can be useful when
     *           executing independent parallel queries.
     *     @type array|\Google\Protobuf\Internal\MapField $script_variables
     *           Optional. Mapping of query variable names to values (equivalent to the
     *           Hive command: `SET name="value";`).
     *     @type array|\Google\Protobuf\Internal\MapField $properties
     *           Optional. A mapping of property names and values, used to configure Hive.
     *           Properties that conflict with values set by the Dataproc API may be
     *           overwritten. Can include properties set in /etc/hadoop/conf/&#42;-site.xml,
     *           /etc/hive/conf/hive-site.xml, and classes in user code.
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $jar_file_uris
     *           Optional. HCFS URIs of jar files to add to the CLASSPATH of the
     *           Hive server and Hadoop MapReduce (MR) tasks. Can contain Hive SerDes
     *           and UDFs.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Dataproc\V1\Jobs::initOnce();
        parent::__construct($data);
    }

    /**
     * The HCFS URI of the script that contains Hive queries.
     *
     * Generated from protobuf field <code>string query_file_uri = 1;</code>
     * @return string
     */
    public function getQueryFileUri()
    {
        return $this->readOneof(1);
    }

    public function hasQueryFileUri()
    {
        return $this->hasOneof(1);
    }

    /**
     * The HCFS URI of the script that contains Hive queries.
     *
     * Generated from protobuf field <code>string query_file_uri = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setQueryFileUri($var)
    {
        GPBUtil::checkString($var, True);
        $this->writeOneof(1, $var);

        return $this;
    }

    /**
     * A list of queries.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.QueryList query_list = 2;</code>
     * @return \Google\Cloud\Dataproc\V1\QueryList
     */
    public function getQueryList()
    {
        return $this->readOneof(2);
    }

    public function hasQueryList()
    {
        return $this->hasOneof(2);
    }

    /**
     * A list of queries.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1.QueryList query_list = 2;</code>
     * @param \Google\Cloud\Dataproc\V1\QueryList $var
     * @return $this
     */
    public function setQueryList($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dataproc\V1\QueryList::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * Optional. Whether to continue executing queries if a query fails.
     * The default value is `false`. Setting to `true` can be useful when
     * executing independent parallel queries.
     *
     * Generated from protobuf field <code>bool continue_on_failure = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return bool
     */
    public function getContinueOnFailure()
    {
        return $this->continue_on_failure;
    }

    /**
     * Optional. Whether to continue executing queries if a query fails.
     * The default value is `false`. Setting to `true` can be useful when
     * executing independent parallel queries.
     *
     * Generated from protobuf field <code>bool continue_on_failure = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param bool $var
     * @return $this
     */
    public function setContinueOnFailure($var)
    {
        GPBUtil::checkBool($var);
        $this->continue_on_failure = $var;

        return $this;
    }

    /**
     * Optional. Mapping of query variable names to values (equivalent to the
     * Hive command: `SET name="value";`).
     *
     * Generated from protobuf field <code>map<string, string> script_variables = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getScriptVariables()
    {
        return $this->script_variables;
    }

    /**
     * Optional. Mapping of query variable names to values (equivalent to the
     * Hive command: `SET name="value";`).
     *
     * Generated from protobuf field <code>map<string, string> script_variables = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setScriptVariables($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->script_variables = $arr;

        return $this;
    }

    /**
     * Optional. A mapping of property names and values, used to configure Hive.
     * Properties that conflict with values set by the Dataproc API may be
     * overwritten. Can include properties set in /etc/hadoop/conf/&#42;-site.xml,
     * /etc/hive/conf/hive-site.xml, and classes in user code.
     *
     * Generated from protobuf field <code>map<string, string> properties = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Optional. A mapping of property names and values, used to configure Hive.
     * Properties that conflict with values set by the Dataproc API may be
     * overwritten. Can include properties set in /etc/hadoop/conf/&#42;-site.xml,
     * /etc/hive/conf/hive-site.xml, and classes in user code.
     *
     * Generated from protobuf field <code>map<string, string> properties = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setProperties($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->properties = $arr;

        return $this;
    }

    /**
     * Optional. HCFS URIs of jar files to add to the CLASSPATH of the
     * Hive server and Hadoop MapReduce (MR) tasks. Can contain Hive SerDes
     * and UDFs.
     *
     * Generated from protobuf field <code>repeated string jar_file_uris = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getJarFileUris()
    {
        return $this->jar_file_uris;
    }

    /**
     * Optional. HCFS URIs of jar files to add to the CLASSPATH of the
     * Hive server and Hadoop MapReduce (MR) tasks. Can contain Hive SerDes
     * and UDFs.
     *
     * Generated from protobuf field <code>repeated string jar_file_uris = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setJarFileUris($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->jar_file_uris = $arr;

        return $this;
    }

    /**
     * @return string
     */
    public function getQueries()
    {
        return $this->whichOneof("queries");
    }

}

