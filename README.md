# About ShareTo

Generate and render social share buttons without any hassle


## Installation
```php
composer require prajwal89/share-to
```

## Usage

```php
include 'vendor/autoload.php';
use Prajwal89\ShareTo;

$share_to = new ShareTo('title', 'url');
echo $share_to->all()->getButtons();

```

## To do list

| Status | Todo |
| ------ | ------ |
| ✔ | inline styles| 
||customize inline styles|
||tailwind support|
||bootstrap support|
||add tests|
||mail-to button|
||instagram button|

## License

ShareTo package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).