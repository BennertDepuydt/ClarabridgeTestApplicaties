<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/gaming/v1/common.proto

namespace GPBMetadata\Google\Cloud\Gaming\V1;

class Common
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
#google/cloud/gaming/v1/common.protogoogle.cloud.gaming.v1google/protobuf/duration.protogoogle/protobuf/timestamp.protogoogle/api/annotations.proto"�
OperationMetadata4
create_time (2.google.protobuf.TimestampB�A1
end_time (2.google.protobuf.TimestampB�A
target (	B�A
verb (	B�A
status_message (	B�A#
requested_cancellation (B�A
api_version (	B�A
unreachable (	B�A]
operation_status	 (2>.google.cloud.gaming.v1.OperationMetadata.OperationStatusEntryB�A_
OperationStatusEntry
key (	6
value (2\'.google.cloud.gaming.v1.OperationStatus:8"�
OperationStatus
done (B�AE

error_code (21.google.cloud.gaming.v1.OperationStatus.ErrorCode
error_message (	"j
	ErrorCode
ERROR_CODE_UNSPECIFIED 
INTERNAL_ERROR
PERMISSION_DENIED
CLUSTER_CONNECTION"�
LabelSelectorA
labels (21.google.cloud.gaming.v1.LabelSelector.LabelsEntry-
LabelsEntry
key (	
value (	:8"
RealmSelector
realms (	"�
Schedule.

start_time (2.google.protobuf.Timestamp,
end_time (2.google.protobuf.Timestamp4
cron_job_duration (2.google.protobuf.Duration
	cron_spec (	";

SpecSource
game_server_config_name (	
name (	"�
TargetDetails 
game_server_cluster_name (	#
game_server_deployment_name (	O
fleet_details (28.google.cloud.gaming.v1.TargetDetails.TargetFleetDetails�
TargetFleetDetailsS
fleet (2D.google.cloud.gaming.v1.TargetDetails.TargetFleetDetails.TargetFleetb

autoscaler (2N.google.cloud.gaming.v1.TargetDetails.TargetFleetDetails.TargetFleetAutoscalerT
TargetFleet
name (	7
spec_source (2".google.cloud.gaming.v1.SpecSource^
TargetFleetAutoscaler
name (	7
spec_source (2".google.cloud.gaming.v1.SpecSource"E
TargetState6
details (2%.google.cloud.gaming.v1.TargetDetails"�
DeployedFleetDetailsR
deployed_fleet (2:.google.cloud.gaming.v1.DeployedFleetDetails.DeployedFleeta
deployed_autoscaler (2D.google.cloud.gaming.v1.DeployedFleetDetails.DeployedFleetAutoscaler�
DeployedFleet
fleet (	

fleet_spec (	7
spec_source (2".google.cloud.gaming.v1.SpecSource^
status (2N.google.cloud.gaming.v1.DeployedFleetDetails.DeployedFleet.DeployedFleetStatusv
DeployedFleetStatus
ready_replicas (
allocated_replicas (
reserved_replicas (
replicas (�
DeployedFleetAutoscaler

autoscaler (	7
spec_source (2".google.cloud.gaming.v1.SpecSource
fleet_autoscaler_spec (	B\\
com.google.cloud.gaming.v1PZ<google.golang.org/genproto/googleapis/cloud/gaming/v1;gamingbproto3'
        , true);

        static::$is_initialized = true;
    }
}

