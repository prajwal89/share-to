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

$share = new ShareTo('McqMate - MCQ Portal for Students', 'https://mcqmate.com/');
echo $share->all()->getButtons();
```

**Get all available buttons**
```php
echo $share->all()->getButtons();
```

**Get single button**
```php
echo $share->whatsapp()->getButtons();
```

**Get multiple buttons**
```php
echo $share->whatsapp()->twitter()->getButtons();
//or
echo $share->only(['whatsapp','twitter'])->getButtons();

```

**Get all links**
This will return array of share urls
you can use this to render buttons according to your need
```php
$share->all()->getRawLinks();
```

## To do list

| Status | Todo                    |
| ------ | ----------------------- |
| ✔      | inline styles           |
| ✔      | customize inline styles |
|        | tailwind support        |
|        | bootstrap support       |
|        | add tests               |
|        | mail-to button          |
|        | instagram button        |
|        | linkedin button         |

## License

ShareTo package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).