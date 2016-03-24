<?php


namespace Quartet\WorkflowerExample\Participant;


use PHPMentors\Workflower\Workflow\Participant\ParticipantInterface;
use PHPMentors\Workflower\Workflow\Resource\ResourceInterface;

class Fun implements ParticipantInterface
{
    /**
     * @var ResourceInterface
     */
    private $resource;

    public function getId()
    {
        return 'just_a_fun';
    }

    public function hasRole($role)
    {
        return $role == 'fun';
    }

    public function setResource(ResourceInterface $resource)
    {
        $this->resource = $resource;
    }

    public function getResource()
    {
        return $this->resource;
    }

    public function getName()
    {
        return $this->getId();
    }

}
