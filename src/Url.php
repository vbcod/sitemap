<?php
//https://www.sitemaps.org/protocol.html

namespace Vbcod\Sitemap;

class Url
{
    const CHANGE_FREQ_DAILY     = 'daily';
    const CHANGE_FREQ_WEEKLY    = 'weekly';
    const CHANGE_FREQ_MONTHLY   = 'monthly';

    public $loc;
    public $changefreq;
    public $priority;
    public $lastmod;

    public function setLoc($newValue)
    {
        $this->loc = $newValue;
    }

    public function setChangefreq($newValue)
    {
        $this->changefreq = $newValue;
    }

    public function setPriority($newValue)
    {
        $this->priority = $newValue;
    }

    public function getLoc()
    {
        return $this->loc;
    }

    public function getChangefreq()
    {
        return $this->changefreq;
    }

    public function getPriority()
    {
        return $this->priority;
    }
}