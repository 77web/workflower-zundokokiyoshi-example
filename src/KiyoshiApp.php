<?php
/**
 * This file is part of the Quartet.WorkflowerExample
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Quartet\WorkflowerExample;

use Quartet\WorkflowerExample\Participant\KiyoshiHikawa;
use Quartet\WorkflowerExample\Participant\Fun;
use PHPMentors\Workflower\Definition\Bpmn2Reader;
use PHPMentors\Workflower\Workflow\Event\StartEvent;

class KiyoshiApp
{
    public function run()
    {
        $definitionPath =__DIR__.'/Resources/config/bpmn/kiyoshi.bpmn';
        $reader = new Bpmn2Reader();
        $workflow = $reader->read($definitionPath);

        $kiyoshi = new KiyoshiHikawa();
        $fun = new Fun();

        $records = [];
        $workflow->setProcessData(['record' => implode(',', $records), 'random' => rand()]);
        $workflow->start(new StartEvent('start', $workflow->getRole('kiyoshi_hikawa')));
        while ($workflow->isActive()) {
            $participant = $workflow->getCurrentFlowObject()->getRole()->getId() == 'kiyoshi_hikawa' ? $kiyoshi : $fun;

            if (false !== strpos($workflow->getCurrentFlowObject()->getId(), 'say_')) {
                $records[] = str_replace('say_', '', $workflow->getCurrentFlowObject()->getId());
            }
            $workflow->setProcessData(['record' => implode(',', $records), 'random' => rand()]);
            $workflow->allocateWorkItem($workflow->getCurrentFlowObject(), $participant);
            $workflow->startWorkItem($workflow->getCurrentFlowObject(), $participant);
            $workflow->completeWorkItem($workflow->getCurrentFlowObject(), $participant);
        }
        
        return $records;
    }
}
