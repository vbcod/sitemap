<?php

namespace Vbcod\Sitemap;

interface iUrl
{
    public function setLoc();
    public function setChangefreq();
    public function setPriority();

    public function getLoc();
    public function getChangefreq();
    public function getPriority();
}