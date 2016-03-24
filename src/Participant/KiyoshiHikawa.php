<?php


namespace Quartet\WorkflowerExample\Participant;


use PHPMentors\Workflower\Workflow\Participant\ParticipantInterface;
use PHPMentors\Workflower\Workflow\Resource\ResourceInterface;

class KiyoshiHikawa implements ParticipantInterface
{
    /**
     * @var ResourceInterface
     */
    private $resource;
    
    public function getId()
    {
        return 'mr_kiyoshi_hikawa';
    }

    public function hasRole($role)
    {
        return $role == 'kiyoshi_hikawa';
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
