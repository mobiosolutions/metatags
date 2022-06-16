# Metatags
A Laravel package to fetch all metadata of a webpage.

## Installation
Perform the following operations in order to use this package

- **Add to your composer.json**
```
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/tobyberesford/metatags"
        }
    ],
    "require": {
        "mobiosolutions/metatags": "dev-master"
    }
}
```
- **Add Service Provider** 
   Open `config/app.php` and add `Mobiosolutions\Metatags\Providers\MetatagsProvider::class,` to the end of `providers` array:

    ```
    'providers' => array(
        ....
        Mobiosolutions\Metatags\Providers\MetatagsProvider::class,
    ),
    ```
   Next under the `aliases` array:

    ```
    'aliases' => array(
        ....
        'Metatags' => Mobiosolutions\Metatags\Facades\MetatagsFacade::class
    ),
    ```
## Requirements
- You need to install the [DOM](http://www.php.net/en/dom) extension.

## How to use

- After following the above steps, 

    ```
    // Add to your controller to get all metatags data
    use Metatags;

    $metadata = Metatags::get("https://example.com/");

    print_r($metadata);
    ```
    Get only OG ( Open Graph ) Metatages data

    ```
    $getOGTags = true;
    $metadata = Metatags::get("https://example.com/",$getOGTags);

                        OR

    $metadata = Metatags::get("https://example.com/",true);

    print_r($metadata);

    ```

    
