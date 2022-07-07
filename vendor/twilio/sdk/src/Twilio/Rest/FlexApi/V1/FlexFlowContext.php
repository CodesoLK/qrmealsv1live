<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\FlexApi\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class FlexFlowContext extends InstanceContext {
    /**
     * Initialize the FlexFlowContext
     *
     * @param Version $version Version that contains the resource
     * @param string $sid The SID that identifies the resource to fetch
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['sid' => $sid, ];

        $this->uri = '/FlexFlows/' . \rawurlencode($sid) . '';
    }

    /**
     * Fetch the FlexFlowInstance
     *
     * @return FlexFlowInstance Fetched FlexFlowInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): FlexFlowInstance {
        $payload = $this->version->fetch('GET', $this->uri);

        return new FlexFlowInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Update the FlexFlowInstance
     *
     * @param array|Options $options Optional Arguments
     * @return FlexFlowInstance Updated FlexFlowInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): FlexFlowInstance {
        $options = new Values($options);

        $data = Values::of([
            'FriendlyName' => $options['friendlyName'],
            'ChatServiceSid' => $options['chatServiceSid'],
            'ChannelType' => $options['channelType'],
            'ContactIdentity' => $options['contactIdentity'],
            'Enabled' => Serialize::booleanToString($options['enabled']),
            'IntegrationType' => $options['integrationType'],
            'Integration.FlowSid' => $options['integrationFlowSid'],
            'Integration.Url' => $options['integrationUrl'],
            'Integration.WorkspaceSid' => $options['integrationWorkspaceSid'],
            'Integration.WorkflowSid' => $options['integrationWorkflowSid'],
            'Integration.Channel' => $options['integrationChannel'],
            'Integration.Timeout' => $options['integrationTimeout'],
            'Integration.Priority' => $options['integrationPriority'],
            'Integration.CreationOnMessage' => Serialize::booleanToString($options['integrationCreationOnMessage']),
            'LongLived' => Serialize::booleanToString($options['longLived']),
            'JanitorEnabled' => Serialize::booleanToString($options['janitorEnabled']),
            'Integration.RetryCount' => $options['integrationRetryCount'],
        ]);

        $payload = $this->version->update('POST', $this->uri, [], $data);

        return new FlexFlowInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Delete the FlexFlowInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool {
        return $this->version->delete('DELETE', $this->uri);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.FlexApi.V1.FlexFlowContext ' . \implode(' ', $context) . ']';
    }
}