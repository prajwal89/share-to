<?php

namespace Prajwal89;


class ShareTo
{

    const FACEBOOK_URI = 'https://www.facebook.com/sharer/sharer.php';
    const WHATSAPP_URI = 'https://wa.me';
    const TWITTER_URI = 'https://twitter.com/intent/tweet';
    const TELEGRAM_URI = 'https://telegram.me/share/url';

    /**
     * Html to prefix before the share links
     *
     * @var string
     */
    protected $prefix = '<div id="laravel-share-this" style="display:flex; justify-content:center; gap:10px; flex-wrap:wrap; color:black;">';


    /**
     * Html to append after the share links
     *
     * @var string
     */
    protected $suffix = '</div>';


    /**
     * The share urls
     *
     * @var array
     */
    protected $shareUrls = [];


    /**
     * The generated html
     *
     * @var string
     */
    protected $html = '';


    /**
     * The generated html
     *
     * @var string
     */
    protected $buttonStyles = [
        'facebook' => 'border:2px solid #4267B2; border-radius:4px; padding: 4px 8px; color:#4267B2',
        'whatsapp' => 'border:2px solid #075E54; border-radius:4px; padding: 4px 8px; color:#075E54',
        'twitter' => 'border:2px solid #1DA1F2; border-radius:4px; padding: 4px 8px; color:#1DA1F2',
        'telegram' => 'border:2px solid #0088cc; border-radius:4px; padding: 4px 8px; color:#0088cc',
    ];


    /**
     * The share urls
     *
     * @var array
     */
    protected $options = [];


    /**
     * @param string|null $title
     * @param string|null $url 
     * @param array $options
     * @return $this
     */

    function __construct(public string $title, public string $url = '', $options = [])
    {
        // $this->url = empty($this->url) ? URL::full() : $this->url;
        // dd(preg_grep('/^f/', get_class_methods($this)));
        // array_map(function ($service) {
        //     // $this->$service();
        //     $this->{$service}();
        // }, preg_grep('/^service/', get_class_methods($this)));
    }

    /**
     * Generate links for all the providers.
     *
     * @return $this
     */

    public function all(): self
    {
        $this->facebook();
        $this->whatsapp();
        $this->twitter();
        $this->telegram();
        return $this;
    }

    public function facebook(): self
    {
        $this->shareUrls[__FUNCTION__] = self::FACEBOOK_URI . "?" . http_build_query(['u' => $this->url, 'quote' => urlencode($this->title)]);
        return $this;
    }

    public function whatsapp(): self
    {
        //add custom message
        $this->shareUrls[__FUNCTION__] = self::WHATSAPP_URI . "/?" . http_build_query(['text' =>  $this->title . "\n\n" . $this->url]);
        return $this;
    }

    public function twitter(): self
    {
        //add custom message
        $this->shareUrls[__FUNCTION__] = self::TWITTER_URI . "?" . http_build_query(['text' =>  $this->title . "\n", 'url' => $this->url]);
        return $this;
    }

    public function telegram(): self
    {
        //add custom message
        $this->shareUrls[__FUNCTION__] = self::TELEGRAM_URI . "?" . http_build_query(['text' =>  $this->title . "\n", 'url' => $this->url]);
        return $this;
    }

    public function getButtons($options = []): string
    {
        $this->html .= $this->prefix;

        foreach ($this->shareUrls as $service => $url) {
            $this->html .= "<a href='$url' target='_blank' style='" . $this->buttonStyles[$service] . "'>" . ucfirst($service) . "</a>";
        }

        $this->html .= $this->suffix;

        return $this->html;
    }
}
