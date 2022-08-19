### RajWebConsulting

#### YouTube to MP3 Button API

##### This script is an extension for MP3 Converter Pro v3 from [RajWebConsulting](https://shop.rajwebconsulting.com/store/converter-scripts) and enables you to install Single Button API on multiple Domains and consuming the JSON API of the Main MP3 Converter Pro v3 (MCP) to have a SOLID infrastructure (by using File Caching and saving CPU ressources by avoid multiple MCP instances on same Server.).

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
