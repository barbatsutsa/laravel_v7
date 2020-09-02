<?php


namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService
{
    protected $link;
    public function __construct(string $link)
    {
        $this->link = $link;
    }

    protected function load()
    {
        return XmlParser::load($this->link);
    }

    public function getData(): array
    {
        $load = $this->load();

        return $load->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate]']
        ]);
    }

    public function saveData(): void
    {
        $json = json_encode($this->getData());
        Storage::disk('local')->put($this->link . ".txt", $json);
    }

    public function saveNews($link)
    {
        $xml = XmlParser::load($link);

        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate]']
        ]);

        $fileName = sprintf('Logs%s.txt', time() . rand(0, 10000));
        Storage::disk('publicLogs')->put($fileName, $link);
    }




}
