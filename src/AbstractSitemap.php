<?php
//https://www.sitemaps.org/protocol.html

namespace Vbcod\Sitemap;

abstract class AbstractSitemap
{
    const RENDER_FORMAT_XML = 'xml';
    const RENDER_FORMAT_TXT = 'txt';

    /* @var iUrl[] */
    public $urls = array();

    /* @var string */
    protected $domain = 'example.com';

    /* @var string */
    protected $protocol = 'https';

    /* @var string */
    protected $urlsPrefix = '';

    public function render($format)
    {
        $this->make();

        if($format === self::RENDER_FORMAT_XML){
            return $this->renderAsXml();
        }

        if($format === self::RENDER_FORMAT_TXT){
            return $this->renderAsTxt();
        }

        return '';
    }

    /*
     * https://www.sitemaps.org/protocol.html#location
     */
    public function renderAsTxt()
    {
        $output    = array();

        foreach ($this->urls as $url){
            $output[] = "{$url->loc}";
        }

        $output    = implode( "\n" , $output );

        return $output;
    }

    /*
     * https://www.sitemaps.org/protocol.html#xmlTagDefinitions
     */
    public function renderAsXml()
    {
        $xml    = array();
        $xml[]  = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml[]  = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($this->urls as $url){
            $loc        = $url->loc         ? "<loc>{$url->loc}</loc>"                      : '' ;
            $changefreq = $url->changefreq  ? "<changefreq>{$url->changefreq}</changefreq>" : '' ;
            $priority   = $url->priority    ? "<priority>{$url->priority}</priority>"       : '' ;

            $xml[] = "
            <url>
                {$loc}
                {$changefreq}
                {$priority}
            </url>";
        }

        $xml[]  = '</urlset>';
        $xml    = implode( "\n" , $xml );

        return $xml;
    }

    public function make()
    {
        $this->generateUrls();
        $this->preCompileUrls();
        $this->compileUrls();
        return $this;
    }

    public function compileUrls()
    {
        foreach ($this->urls as $k => $url){
            $curLoc = $this->urls[$k]->getLoc();
            $newLoc = "{$this->protocol}://{$this->domain}{$this->urlsPrefix}{$curLoc}";
            $this->urls[$k]->setLoc($newLoc);
        }
    }

    public function preCompileUrls()
    {
        //extend it
        /*

        $this->urlsPrefix = "/eng";

        */
    }

    public function generateUrls()
    {
        //extend it. example:
        /*
        $url = new Url();

        $url->setLoc('/home/');
        $url->setChangefreq($url::CHANGE_FREQ_MONTHLY);
        $url->setPriority(0.5);

        $this->addUrl($url);
        */
    }

    public function addUrl(Url $url)
    {
        $this->urls[] = $url;
    }
}