<?php

namespace ButtonApi;

require dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/Config.php';

use Config;
use Josantonius\Request\Request;
use RajWebConsulting\JsonSdk\App as Converter;

if (Request::isPost())
{
    $hash = Request::post('hash');
    $color = Request::post('color');
    // print_r($hash);

    require __DIR__ . '/colorHandler.php';

    $converter = new Converter(['API_URL' => Config::_CONVERTER_URL]);
    $data = $converter->StartTask($hash);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free YouTube to MP3 API</title>
    <link rel="stylesheet" href="../assets/css/app.css">
</head>

<body <?php echo $colorClass; ?>>
    <div class="grid w-full place-items-center min-h-screen">
        <div class="flex items-center justify-center gap-4 p-4 text-center">
            <?php if (isset($data['error'])) : ?>
                <div>
                    <h1 class="text-2xl"><?php echo $data['errorMsg']; ?></h1>
                    <h2 class="text-md"><?php echo $data['message']; ?></h2>
                </div>
            <?php else : ?>
                <h1 class="drop-shadow-lg shadow-black text-xl">
                    <div id="progress" class="drop-shadow-lg shadow-black text-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 loadingSpinner" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg> Preparing...
                    </div>
                </h1>
            <?php endif; ?>
        </div>
    </div>

    <script>
        <?php if (isset($data['taskId'])) : ?>

            var update = setInterval(function() {
                getTaskStatus();
            }, 1000);
            
            // Example POST method implementation:
            async function postData(url = '', data = {}) {
                const response = await fetch(url, {
                    method: 'POST', 
                    mode: 'cors', 
                    cache: 'no-cache',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    redirect: 'follow',
                    referrerPolicy: 'no-referrer',
                    body: JSON.stringify(data)
                });

                return response.json();
            }

            function getTaskStatus() {
                let status = 'none';
                postData('<?php echo pathinfo($_SERVER['PHP_SELF'])['dirname'];?>/progress.php', {
                    "taskId": "<?php echo $data['taskId']; ?>"
                })
                .then(data => {
                    console.log(data);
                    if(data.error) {
                        clearInterval(update);
                    }
                    status = data.status;
                    if(status === 'finished') {
                        clearInterval(update);
                    }
                    const elem = document.querySelector('#progress');
                    const dl = document.querySelector('#download');
                    if(data.error)
                    {
                        elem.innerHTML = `${data.message}`;
                    }
                    else
                    {
                        if(data.download_progress < 100)
                        {
                            elem.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 loadingSpinner" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg> Downloading...`;
                        }
                        if(data.convert_progress < 10)
                        {
                            elem.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 loadingSpinner" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>Please wait...`;
                        }
                        else if(data.convert_progress < 30)
                        {
                            elem.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 loadingSpinner" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>Generating MP3`;
                        }
                        else if(data.convert_progress < 50)
                        {
                            elem.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 loadingSpinner" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>Finalizing...`;
                        }
                        else if(data.convert_progress < 80)
                        {
                            elem.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 loadingSpinner" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>Just a moment :)`;
                        }
                        
                        if (status == 'finished') {
                            elem.innerHTML = `
                                <a href="${data.download}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg> Downlaod MP3</a>`;
                        } 
                        if (status == 'failed') {
                            elem.innerHTML = `Oops, conversion failed.`;
                        } 
                    }
                });      
            }
        <?php endif; ?>
    </script>
</body>

</html>