<?php
$domain = 'https://prorab-ivan.od.ua';
$pages = [
    '/',
    // Добавь сюда другие страницы, если появятся
];

$xml = new DOMDocument('1.0', 'UTF-8');
$xml->formatOutput = true;

$urlset = $xml->createElement('urlset');
$urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

foreach ($pages as $page) {
    $url = $xml->createElement('url');

    $loc = $xml->createElement('loc', $domain . $page);
    $lastmod = $xml->createElement('lastmod', date('Y-m-d'));
    $changefreq = $xml->createElement('changefreq', 'monthly');
    $priority = $xml->createElement('priority', $page === '/' ? '1.0' : '0.8');

    $url->appendChild($loc);
    $url->appendChild($lastmod);
    $url->appendChild($changefreq);
    $url->appendChild($priority);

    $urlset->appendChild($url);
}

$xml->appendChild($urlset);
$xml->save('sitemap.xml');

echo "Готово! sitemap.xml создан.";
?>
