<?php

namespace Vbcod\Sitemap;

abstract class Sitemap implements iSitemap
{
    public function getUrls()
    {
        return array();
    }
}