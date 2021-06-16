<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/dataproc/v1beta2/clusters.proto

namespace Google\Cloud\Dataproc\V1beta2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The config settings for Compute Engine resources in
 * an instance group, such as a master or worker group.
 *
 * Generated from protobuf message <code>google.cloud.dataproc.v1beta2.InstanceGroupConfig</code>
 */
class InstanceGroupConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. The number of VM instances in the instance group.
     * For master instance groups, must be set to 1.
     *
     * Generated from protobuf field <code>int32 num_instances = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $num_instances = 0;
    /**
     * Output only. The list of instance names. Dataproc derives the names
     * from `cluster_name`, `num_instances`, and the instance group.
     *
     * Generated from protobuf field <code>repeated string instance_names = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $instance_names;
    /**
     * Optional. The Compute Engine image resource used for cluster instances.
     * The URI can represent an image or image family.
     * Image examples:
     * * `https://www.googleapis.com/compute/beta/projects/[project_id]/global/images/[image-id]`
     * * `projects/[project_id]/global/images/[image-id]`
     * * `image-id`
     * Image family examples. Dataproc will use the most recent
     * image from the family:
     * * `https://www.googleapis.com/compute/beta/projects/[project_id]/global/images/family/[custom-image-family-name]`
     * * `projects/[project_id]/global/images/family/[custom-image-family-name]`
     * If the URI is unspecified, it will be inferred from
     * `SoftwareConfig.image_version` or the system default.
     *
     * Generated from protobuf field <code>string image_uri = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $image_uri = '';
    /**
     * Optional. The Compute Engine machine type used for cluster instances.
     * A full URL, partial URI, or short name are valid. Examples:
     * * `https://www.googleapis.com/compute/v1/projects/[project_id]/zones/us-east1-a/machineTypes/n1-standard-2`
     * * `projects/[project_id]/zones/us-east1-a/machineTypes/n1-standard-2`
     * * `n1-standard-2`
     * **Auto Zone Exception**: If you are using the Dataproc
     * [Auto Zone
     * Placement](https://cloud.google.com/dataproc/docs/concepts/configuring-clusters/auto-zone#using_auto_zone_placement)
     * feature, you must use the short name of the machine type
     * resource, for example, `n1-standard-2`.
     *
     * Generated from protobuf field <code>string machine_type_uri = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $machine_type_uri = '';
    /**
     * Optional. Disk option config settings.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1beta2.DiskConfig disk_config = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $disk_config = null;
    /**
     * Output only. Specifies that this instance group contains preemptible
     * instances.
     *
     * Generated from protobuf field <code>bool is_preemptible = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $is_preemptible = false;
    /**
     * Optional. Specifies the preemptibility of the instance group.
     * The default value for master and worker groups is
     * `NON_PREEMPTIBLE`. This default cannot be changed.
     * The default value for secondary instances is
     * `PREEMPTIBLE`.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1beta2.InstanceGroupConfig.Preemptibility preemptibility = 10 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $preemptibility = 0;
    /**
     * Output only. The config for Compute Engine Instance Group
     * Manager that manages this group.
     * This is only used for preemptible instance groups.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1beta2.ManagedGroupConfig managed_group_config = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $managed_group_config = null;
    /**
     * Optional. The Compute Engine accelerator configuration for these
     * instances.
     *
     * Generated from protobuf field <code>repeated .google.cloud.dataproc.v1beta2.AcceleratorConfig accelerators = 8 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $accelerators;
    /**
     * Specifies the minimum cpu platform for the Instance Group.
     * See [Dataproc -> Minimum CPU
     * Platform](https://cloud.google.com/dataproc/docs/concepts/compute/dataproc-min-cpu).
     *
     * Generated from protobuf field <code>string min_cpu_platform = 9;</code>
     */
    private $min_cpu_platform = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $num_instances
     *           Optional. The number of VM instances in the instance group.
     *           For master instance groups, must be set to 1.
     *     @type string[]|\Google\Protobuf\Internal\RepeatedField $instance_names
     *           Output only. The list of instance names. Dataproc derives the names
     *           from `cluster_name`, `num_instances`, and the instance group.
     *     @type string $image_uri
     *           Optional. The Compute Engine image resource used for cluster instances.
     *           The URI can represent an image or image family.
     *           Image examples:
     *           * `https://www.googleapis.com/compute/beta/projects/[project_id]/global/images/[image-id]`
     *           * `projects/[project_id]/global/images/[image-id]`
     *           * `image-id`
     *           Image family examples. Dataproc will use the most recent
     *           image from the family:
     *           * `https://www.googleapis.com/compute/beta/projects/[project_id]/global/images/family/[custom-image-family-name]`
     *           * `projects/[project_id]/global/images/family/[custom-image-family-name]`
     *           If the URI is unspecified, it will be inferred from
     *           `SoftwareConfig.image_version` or the system default.
     *     @type string $machine_type_uri
     *           Optional. The Compute Engine machine type used for cluster instances.
     *           A full URL, partial URI, or short name are valid. Examples:
     *           * `https://www.googleapis.com/compute/v1/projects/[project_id]/zones/us-east1-a/machineTypes/n1-standard-2`
     *           * `projects/[project_id]/zones/us-east1-a/machineTypes/n1-standard-2`
     *           * `n1-standard-2`
     *           **Auto Zone Exception**: If you are using the Dataproc
     *           [Auto Zone
     *           Placement](https://cloud.google.com/dataproc/docs/concepts/configuring-clusters/auto-zone#using_auto_zone_placement)
     *           feature, you must use the short name of the machine type
     *           resource, for example, `n1-standard-2`.
     *     @type \Google\Cloud\Dataproc\V1beta2\DiskConfig $disk_config
     *           Optional. Disk option config settings.
     *     @type bool $is_preemptible
     *           Output only. Specifies that this instance group contains preemptible
     *           instances.
     *     @type int $preemptibility
     *           Optional. Specifies the preemptibility of the instance group.
     *           The default value for master and worker groups is
     *           `NON_PREEMPTIBLE`. This default cannot be changed.
     *           The default value for secondary instances is
     *           `PREEMPTIBLE`.
     *     @type \Google\Cloud\Dataproc\V1beta2\ManagedGroupConfig $managed_group_config
     *           Output only. The config for Compute Engine Instance Group
     *           Manager that manages this group.
     *           This is only used for preemptible instance groups.
     *     @type \Google\Cloud\Dataproc\V1beta2\AcceleratorConfig[]|\Google\Protobuf\Internal\RepeatedField $accelerators
     *           Optional. The Compute Engine accelerator configuration for these
     *           instances.
     *     @type string $min_cpu_platform
     *           Specifies the minimum cpu platform for the Instance Group.
     *           See [Dataproc -> Minimum CPU
     *           Platform](https://cloud.google.com/dataproc/docs/concepts/compute/dataproc-min-cpu).
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Dataproc\V1Beta2\Clusters::initOnce();
        parent::__construct($data);
    }

    /**
     * Optional. The number of VM instances in the instance group.
     * For master instance groups, must be set to 1.
     *
     * Generated from protobuf field <code>int32 num_instances = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return int
     */
    public function getNumInstances()
    {
        return $this->num_instances;
    }

    /**
     * Optional. The number of VM instances in the instance group.
     * For master instance groups, must be set to 1.
     *
     * Generated from protobuf field <code>int32 num_instances = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param int $var
     * @return $this
     */
    public function setNumInstances($var)
    {
        GPBUtil::checkInt32($var);
        $this->num_instances = $var;

        return $this;
    }

    /**
     * Output only. The list of instance names. Dataproc derives the names
     * from `cluster_name`, `num_instances`, and the instance group.
     *
     * Generated from protobuf field <code>repeated string instance_names = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getInstanceNames()
    {
        return $this->instance_names;
    }

    /**
     * Output only. The list of instance names. Dataproc derives the names
     * from `cluster_name`, `num_instances`, and the instance group.
     *
     * Generated from protobuf field <code>repeated string instance_names = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param string[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setInstanceNames($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->instance_names = $arr;

        return $this;
    }

    /**
     * Optional. The Compute Engine image resource used for cluster instances.
     * The URI can represent an image or image family.
     * Image examples:
     * * `https://www.googleapis.com/compute/beta/projects/[project_id]/global/images/[image-id]`
     * * `projects/[project_id]/global/images/[image-id]`
     * * `image-id`
     * Image family examples. Dataproc will use the most recent
     * image from the family:
     * * `https://www.googleapis.com/compute/beta/projects/[project_id]/global/images/family/[custom-image-family-name]`
     * * `projects/[project_id]/global/images/family/[custom-image-family-name]`
     * If the URI is unspecified, it will be inferred from
     * `SoftwareConfig.image_version` or the system default.
     *
     * Generated from protobuf field <code>string image_uri = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getImageUri()
    {
        return $this->image_uri;
    }

    /**
     * Optional. The Compute Engine image resource used for cluster instances.
     * The URI can represent an image or image family.
     * Image examples:
     * * `https://www.googleapis.com/compute/beta/projects/[project_id]/global/images/[image-id]`
     * * `projects/[project_id]/global/images/[image-id]`
     * * `image-id`
     * Image family examples. Dataproc will use the most recent
     * image from the family:
     * * `https://www.googleapis.com/compute/beta/projects/[project_id]/global/images/family/[custom-image-family-name]`
     * * `projects/[project_id]/global/images/family/[custom-image-family-name]`
     * If the URI is unspecified, it will be inferred from
     * `SoftwareConfig.image_version` or the system default.
     *
     * Generated from protobuf field <code>string image_uri = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setImageUri($var)
    {
        GPBUtil::checkString($var, True);
        $this->image_uri = $var;

        return $this;
    }

    /**
     * Optional. The Compute Engine machine type used for cluster instances.
     * A full URL, partial URI, or short name are valid. Examples:
     * * `https://www.googleapis.com/compute/v1/projects/[project_id]/zones/us-east1-a/machineTypes/n1-standard-2`
     * * `projects/[project_id]/zones/us-east1-a/machineTypes/n1-standard-2`
     * * `n1-standard-2`
     * **Auto Zone Exception**: If you are using the Dataproc
     * [Auto Zone
     * Placement](https://cloud.google.com/dataproc/docs/concepts/configuring-clusters/auto-zone#using_auto_zone_placement)
     * feature, you must use the short name of the machine type
     * resource, for example, `n1-standard-2`.
     *
     * Generated from protobuf field <code>string machine_type_uri = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getMachineTypeUri()
    {
        return $this->machine_type_uri;
    }

    /**
     * Optional. The Compute Engine machine type used for cluster instances.
     * A full URL, partial URI, or short name are valid. Examples:
     * * `https://www.googleapis.com/compute/v1/projects/[project_id]/zones/us-east1-a/machineTypes/n1-standard-2`
     * * `projects/[project_id]/zones/us-east1-a/machineTypes/n1-standard-2`
     * * `n1-standard-2`
     * **Auto Zone Exception**: If you are using the Dataproc
     * [Auto Zone
     * Placement](https://cloud.google.com/dataproc/docs/concepts/configuring-clusters/auto-zone#using_auto_zone_placement)
     * feature, you must use the short name of the machine type
     * resource, for example, `n1-standard-2`.
     *
     * Generated from protobuf field <code>string machine_type_uri = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setMachineTypeUri($var)
    {
        GPBUtil::checkString($var, True);
        $this->machine_type_uri = $var;

        return $this;
    }

    /**
     * Optional. Disk option config settings.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1beta2.DiskConfig disk_config = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Cloud\Dataproc\V1beta2\DiskConfig
     */
    public function getDiskConfig()
    {
        return isset($this->disk_config) ? $this->disk_config : null;
    }

    public function hasDiskConfig()
    {
        return isset($this->disk_config);
    }

    public function clearDiskConfig()
    {
        unset($this->disk_config);
    }

    /**
     * Optional. Disk option config settings.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1beta2.DiskConfig disk_config = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Cloud\Dataproc\V1beta2\DiskConfig $var
     * @return $this
     */
    public function setDiskConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dataproc\V1beta2\DiskConfig::class);
        $this->disk_config = $var;

        return $this;
    }

    /**
     * Output only. Specifies that this instance group contains preemptible
     * instances.
     *
     * Generated from protobuf field <code>bool is_preemptible = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return bool
     */
    public function getIsPreemptible()
    {
        return $this->is_preemptible;
    }

    /**
     * Output only. Specifies that this instance group contains preemptible
     * instances.
     *
     * Generated from protobuf field <code>bool is_preemptible = 6 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param bool $var
     * @return $this
     */
    public function setIsPreemptible($var)
    {
        GPBUtil::checkBool($var);
        $this->is_preemptible = $var;

        return $this;
    }

    /**
     * Optional. Specifies the preemptibility of the instance group.
     * The default value for master and worker groups is
     * `NON_PREEMPTIBLE`. This default cannot be changed.
     * The default value for secondary instances is
     * `PREEMPTIBLE`.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1beta2.InstanceGroupConfig.Preemptibility preemptibility = 10 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return int
     */
    public function getPreemptibility()
    {
        return $this->preemptibility;
    }

    /**
     * Optional. Specifies the preemptibility of the instance group.
     * The default value for master and worker groups is
     * `NON_PREEMPTIBLE`. This default cannot be changed.
     * The default value for secondary instances is
     * `PREEMPTIBLE`.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1beta2.InstanceGroupConfig.Preemptibility preemptibility = 10 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param int $var
     * @return $this
     */
    public function setPreemptibility($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Dataproc\V1beta2\InstanceGroupConfig\Preemptibility::class);
        $this->preemptibility = $var;

        return $this;
    }

    /**
     * Output only. The config for Compute Engine Instance Group
     * Manager that manages this group.
     * This is only used for preemptible instance groups.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1beta2.ManagedGroupConfig managed_group_config = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Cloud\Dataproc\V1beta2\ManagedGroupConfig
     */
    public function getManagedGroupConfig()
    {
        return isset($this->managed_group_config) ? $this->managed_group_config : null;
    }

    public function hasManagedGroupConfig()
    {
        return isset($this->managed_group_config);
    }

    public function clearManagedGroupConfig()
    {
        unset($this->managed_group_config);
    }

    /**
     * Output only. The config for Compute Engine Instance Group
     * Manager that manages this group.
     * This is only used for preemptible instance groups.
     *
     * Generated from protobuf field <code>.google.cloud.dataproc.v1beta2.ManagedGroupConfig managed_group_config = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Cloud\Dataproc\V1beta2\ManagedGroupConfig $var
     * @return $this
     */
    public function setManagedGroupConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dataproc\V1beta2\ManagedGroupConfig::class);
        $this->managed_group_config = $var;

        return $this;
    }

    /**
     * Optional. The Compute Engine accelerator configuration for these
     * instances.
     *
     * Generated from protobuf field <code>repeated .google.cloud.dataproc.v1beta2.AcceleratorConfig accelerators = 8 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getAccelerators()
    {
        return $this->accelerators;
    }

    /**
     * Optional. The Compute Engine accelerator configuration for these
     * instances.
     *
     * Generated from protobuf field <code>repeated .google.cloud.dataproc.v1beta2.AcceleratorConfig accelerators = 8 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Cloud\Dataproc\V1beta2\AcceleratorConfig[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setAccelerators($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Dataproc\V1beta2\AcceleratorConfig::class);
        $this->accelerators = $arr;

        return $this;
    }

    /**
     * Specifies the minimum cpu platform for the Instance Group.
     * See [Dataproc -> Minimum CPU
     * Platform](https://cloud.google.com/dataproc/docs/concepts/compute/dataproc-min-cpu).
     *
     * Generated from protobuf field <code>string min_cpu_platform = 9;</code>
     * @return string
     */
    public function getMinCpuPlatform()
    {
        return $this->min_cpu_platform;
    }

    /**
     * Specifies the minimum cpu platform for the Instance Group.
     * See [Dataproc -> Minimum CPU
     * Platform](https://cloud.google.com/dataproc/docs/concepts/compute/dataproc-min-cpu).
     *
     * Generated from protobuf field <code>string min_cpu_platform = 9;</code>
     * @param string $var
     * @return $this
     */
    public function setMinCpuPlatform($var)
    {
        GPBUtil::checkString($var, True);
        $this->min_cpu_platform = $var;

        return $this;
    }

}

