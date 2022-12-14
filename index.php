<?php require_once 'Config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube to MP3 Converter API</title>
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <div class="bg-gray-100 min-h-screen">
        <div class="pt-8">
            <div class="bg-white mx-auto md:max-w-[800px] rounded-md p-4">
                <h1 class="text-3xl text-center">Free YouTube to MP3 API</h1>
                <ul class="list-disc list-inside pl-4 pt-4 text-md">
                    <li>Fully responsive</li>
                    <li>Customizable with color and size options.</li>
                    <li>Grab the code below and replace <span class="bg-yellow-100">YOUTUBEID</span> with a youtube id. That's it!</li>
                </ul>

                <div class="relative overflow-hidden overflow-x-auto min-with-[18rem] p-5 rounded-xl bg-gray-800 text-white m-4">
                    <code>&lt;iframe rel="nofollow" style="width:300px; height:60px; border:0px; display:block;" scrolling="no" src="<?php echo Config::_DOMAIN; ?>/iframe?color=green&vid=YOUTUBEID"&gt;&lt;/iframe&gt;</code>
                </div>
                <div class="flex flex-col justify-center mx-auto">
                    <div class="mx-auto my-4">
                        <p>Example:</p>
                    </div>
                    <div class="mx-auto">
                        <iframe rel="nofollow" style="width:300px; height:60px; border:0px; display:block;" scrolling="no" src="<?php echo Config::_DOMAIN; ?>/iframe?color=green&vid=2vjPBrBU-TM"></iframe>
                    </div>
                </div>
                <div class="pt-10">
                    <p>You may change the look by editing <span class="bg-yellow-100">color</span> parameter and <span class="bg-yellow-100">width & height</span>
                        parameters in style as you like.</p>

                    <div class="flex flex-wrap justify-center">
                        <div class="w-full md:w-2/4">
                            <p class="font-bold pt-5">predefined color options:</p>
                            <ul class="pt-4 text-md pl-4">
                                <li><span class="bg-blue-500 px-2 py-0 mr-2"></span> blue</li>
                                <li><span class="bg-green-500 px-2 py-0 mr-2"></span> green</li>
                                <li><span class="bg-purple-500 px-2 py-0 mr-2"></span> purple</li>
                                <li><span class="bg-red-500 px-2 py-0 mr-2"></span> red</li>
                                <li><span class="bg-yellow-500 px-2 py-0 mr-2"></span> yellow</li>
                                <li><span class="bg-indigo-500 px-2 py-0 mr-2"></span> indigo</li>
                                <li><span class="bg-pink-500 px-2 py-0 mr-2"></span> pink</li>
                                <li><span class="bg-gray-500 px-2 py-0 mr-2"></span> gray</li>
                            </ul>
                        </div>
                        <div class="w-full md:w-2/4">
                            <p class="font-bold pt-5">also you can use ANY hex colors, examples:</p>
                            <ul class="pt-4 text-md pl-4">
                                <li><span class="bg-[#1383FF] px-2 py-0 mr-2"></span> 1383FF</li>
                                <li><span class="bg-[#2DB94D] px-2 py-0 mr-2"></span> 2DB94D</li>
                                <li><span class="bg-[#DF4454] px-2 py-0 mr-2"></span> DF4454</li>
                                <li><span class="bg-[#FFCB2F] px-2 py-0 mr-2"></span> FFCB2F</li>
                            </ul>
                            <p class="pt-4">Use hex color parameter <span class="font-bold">without</span> the '#' sign.</p>
                        </div>
                    </div>
                    <p class="pt-4">Note: Button is fully responsive, you may use dynamic width and height.
                        Also feel free to customize the look further by adding border, shadow, roundness to the iframe style.</p>
                    <p class="pt-4">This api is free and there is no limit with the usage.</p>

                    <p class="pt-4 text-center font-bold">More Examples:</p>
                    
                    <div class="grid md:grid-cols-2 gap-4 mt-4">
                        <div class="mx-auto">
                            <iframe rel="nofollow" style="width:300px; height:60px; border:0px; display: block; margin:auto;" scrolling="no" src="<?php echo Config::_DOMAIN; ?>/iframe?color=blue&vid=2vjPBrBU-TM"></iframe>
                        </div>
                        <div class="mx-auto">
                            <iframe rel="nofollow" style="width:300px; height:60px; border:0px; display: block; margin:auto;" scrolling="no" src="<?php echo Config::_DOMAIN; ?>/iframe?color=red&vid=2vjPBrBU-TM"></iframe>
                        </div>
                        <div class="mx-auto">
                            <iframe rel="nofollow" style="width:300px; height:65px; border:2px solid #000; display:block; border-radius:8px;" scrolling="no" src="<?php echo Config::_DOMAIN; ?>/iframe?color=333&vid=2vjPBrBU-TM"></iframe>
                        </div>
                        <div class="mx-auto">
                            <iframe rel="nofollow" style="width:300px; height:65px; border:2px solid green; display:block; border-radius:8px;" scrolling="no" src="<?php echo Config::_DOMAIN; ?>/iframe?color=green&vid=2vjPBrBU-TM"></iframe>
                        </div>
                    </div>

                </div>
            </div>
            <p class="pt-4 text-center"><?php echo date('Y'); ?> &copy; <?php echo $_SERVER['SERVER_NAME']; ?></p>
        </div>
    </div>
</body>

</html>