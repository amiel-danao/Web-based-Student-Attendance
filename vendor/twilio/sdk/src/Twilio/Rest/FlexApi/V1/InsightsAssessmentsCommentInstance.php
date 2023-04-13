<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Flex
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\FlexApi\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;


/**
 * @property string|null $accountSid
 * @property string|null $assessmentId
 * @property array|null $comment
 * @property string|null $offset
 * @property bool|null $report
 * @property string|null $weight
 * @property string|null $agentId
 * @property string|null $segmentId
 * @property string|null $userName
 * @property string|null $userEmail
 * @property string|null $timestamp
 * @property string|null $url
 */
class InsightsAssessmentsCommentInstance extends InstanceResource
{
    /**
     * Initialize the InsightsAssessmentsCommentInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     */
    public function __construct(Version $version, array $payload)
    {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'assessmentId' => Values::array_get($payload, 'assessment_id'),
            'comment' => Values::array_get($payload, 'comment'),
            'offset' => Values::array_get($payload, 'offset'),
            'report' => Values::array_get($payload, 'report'),
            'weight' => Values::array_get($payload, 'weight'),
            'agentId' => Values::array_get($payload, 'agent_id'),
            'segmentId' => Values::array_get($payload, 'segment_id'),
            'userName' => Values::array_get($payload, 'user_name'),
            'userEmail' => Values::array_get($payload, 'user_email'),
            'timestamp' => Values::array_get($payload, 'timestamp'),
            'url' => Values::array_get($payload, 'url'),
        ];

        $this->solution = [];
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name)
    {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        return '[Twilio.FlexApi.V1.InsightsAssessmentsCommentInstance]';
    }
}

