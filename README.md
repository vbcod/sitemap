# sitemap

## install
conposer require vbcod/sitemap

## usage
```php

require_once 'vendor/autoload.php';

class MyDefaultSitemap extends Vbcode\AbstractSitemap{
    protected $domain   = 'my-domain.com';

    public function preCompileUrls()
    {
        $this->urlsPrefix = "/eng";
    }
}

class MyConcretSitemapOne extends MyDefaultSitemap{
    public function generateUrls()
    {
        $paths = array(
            '/',
            '/contacts/',
            '/about/',
        );

        foreach ($paths as $path) {
            $url = new Url();

            $url->setLoc($path);
            $url->setChangefreq($url::CHANGE_FREQ_MONTHLY);
            $url->setPriority(0.5);

            $this->addUrl($url);
        }
    }
}

$sitemap = new MySitemap();
$xml     = $sitemap->render($sitemap::RENDER_FORMAT_XML);

header("Content-type: text/xml");
echo $xml;
die();
```
