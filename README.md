### This "Alternate" Single Button API leverages our [MP3 Converter Pro JSON API PHP SDK](https://github.com/rajwebconsulting/mp3-converter-pro-json-api-php-sdk) to enable MULTIPLE domains to consume the Same, Single [MP3 Converter Pro](https://demo.apiyoutu.be) installation and display corresponding, customizable, MP3 download buttons - Brought to you by [RAJ Web Consulting](https://rajwebconsulting.com)

This API enables MP3 conversions of multimedia content from **YouTube, TikTok, Facebook, Instagram, Twitter, SoundCloud, Vimeo, Dailymotion, VK,** and **AOL** -- 10 of the largest video/audio hosting sites in the world!

> **Note**: While only MP3 download format is currently supported (by default), the underlying JSON API PHP SDK still supports both MP3 _and_ MP4. Thus, MP4 support can be easily added via some minor code modification, and we'll try to update this project accordingly in the future. 

## Use Case

To leverage a single MP3 Converter Pro license to implement MP3 download buttons on multiple, different domains, isolating MP3 conversion and file caching to a single, primary domain (where the MP3 Converter Pro is installed) while freeing up valuable server resources on the remaining domains. 

## Requirements

- [YouTube Video Backend](https://shop.rajwebconsulting.com/store/converter-scripts)
 - All [YouTube Video Backend requirements](https://shop.rajwebconsulting.com/knowledgebase/30/How-To-install-YouTube-Video-Backend-on-aaPanel-recommended.html)
- [MP3 Converter Pro](https://shop.rajwebconsulting.com/store/converter-scripts)
 - All [MP3 Converter Pro requirements](https://shop.rajwebconsulting.com/knowledgebase/41/How-To-install-MP3-Converter-Pro-Update-v3.0.5-beta5-on-aaPanel-recommended.html)
- PHP 7.4+

### Installation

1.) Download zip or Clone Github repo 

2.) navigate to Domain root dir in terminal

3.) Install dependencies via composer

```bash
composer install --no-dev
```

or in aaPanel as php user
```bash
sudo -u www composer install --no-dev
```

4.) Edit Config.php with your Domains

```php
class Config
{
    // Domain of this Script
    const _DOMAIN = 'https://yourDomain.com';
    // Domain of MP3 Converter Pro v3
    const _CONVERTER_URL = 'https://yourDomain.com';
}
```
