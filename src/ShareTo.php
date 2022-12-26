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


    protected $buttonStyles = [
        'facebook' => [
            'primaryColor' => '#4267B2',
        ],
        'whatsapp' => [
            'primaryColor' => '#075E54',
        ],
        'twitter' => [
            'primaryColor' => '#1DA1F2',
        ],
        'telegram' => [
            'primaryColor' => '#0088cc',
        ]
    ];


    /**
     * The share urls
     *
     * @var array
     */
    protected $defaultOptions = [
        'borderWidth' => 2,
        'radius' => 4,
        'paddingX' => 4,
        'paddingY' => 8,
    ];


    /**
     * @param string|null $title
     * @param string|null $url 
     * @param array $options
     * @return $this
     */

    function __construct(public string $title, public string $url = '', protected $options = [])
    {
        $this->options = array_replace($this->defaultOptions, $this->options);

        // var_dump($this->options);
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

        foreach ($this->shareUrls as $provider => $url) {
            $this->html .= "<a href='$url' target='_blank' style='" . $this->getButtonInlineStyle($provider) . "'>" . ucfirst($provider) . "</a>";
        }

        $this->html .= $this->suffix;

        return $this->html;
    }

    public function getButtonInlineStyle($provider)
    {
        $styles = [];

        $styles[] = 'color:' .  $this->buttonStyles[$provider]['primaryColor'];
        $styles[] = 'padding:' . $this->options['paddingX'] . 'px ' . $this->options['paddingY'] . 'px';
        $styles[] = 'border:' . $this->options['borderWidth'] . 'px solid ' . $this->buttonStyles[$provider]['primaryColor'];
        $styles[] = 'border-radius:' . $this->options['radius'] . 'px';
        // print("<pre>" . print_r($styles, true) . "</pre>");

        return implode(';', $styles);
    }
}
