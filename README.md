# sitemap

## install
composer require vbcod/sitemap

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

$sitemap = new MyConcretSitemapOne();
$xml     = $sitemap->render($sitemap::RENDER_FORMAT_XML);

header("Content-type: text/xml");
echo $xml;
die();
```

that will produce
```xml
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://my-domain.com/eng/</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>

    <url>
        <loc>https://my-domain.com/eng/contacts/</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>

    <url>
        <loc>https://my-domain.com/eng/about/</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
</urlset>
```
