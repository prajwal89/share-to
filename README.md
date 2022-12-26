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

## To do list

| Status | Todo                    |
| ------ | ----------------------- |
| ✔     | inline styles            |
|        | customize inline styles |
|        | tailwind support        |
|        | bootstrap support       |
|        | add tests               |
|        | mail-to button          |
|        | instagram button        |
|        | linkedin button         |

## License

ShareTo package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).