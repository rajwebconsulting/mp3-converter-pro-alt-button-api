<?php require_once 'bootstrap.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="assets/css/app.css">
</head>

<body <?php echo $colorClass; ?>>
   <div class="grid w-full place-items-center min-h-screen">
      <div class="flex items-center justify-center gap-4 p-4 text-center">
         <h1 class="drop-shadow-lg shadow-black text-2xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
               <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg> Downlaod
         </h1>
      </div>
   </div>
</body>
</html>