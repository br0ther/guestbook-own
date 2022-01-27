<?php

namespace App\EntityListener;

use App\Entity\Conference;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Psr\Log\LoggerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class ConferenceEntityListener
{
    private $slugger;
    private LoggerInterface $logger;

    public function __construct(SluggerInterface $slugger, LoggerInterface $logger)
    {
        $this->slugger = $slugger;
        $this->logger = $logger;
    }

    public function prePersist(Conference $conference, LifecycleEventArgs $event)
    {
        $this->logger->warning('ConferenceEntityListener prePersist called!!!');
        $conference->computeSlug($this->slugger);
    }

    public function preUpdate(Conference $conference, LifecycleEventArgs $event)
    {
        $this->logger->warning('ConferenceEntityListener preUpdate called!!!');
        $conference->computeSlug($this->slugger);
    }
}
