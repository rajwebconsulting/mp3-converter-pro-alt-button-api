<?php require_once 'bootstrap.php'; ?>

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
   <form action="<?php echo pathinfo($_SERVER['PHP_SELF'])['dirname']; ?>/convert.php" method="POST">
      <button class="w-full">
         <div class="grid w-full place-items-center min-h-screen">
            <div class="flex items-center justify-center gap-4 p-4 text-center">
               <?php if (isset($data['error'])) : ?>
                  <div>
                     <h1 class="text-2xl"><?php echo $data['errorMsg']; ?></h1>
                     <h2 class="text-md"><?php echo $data['message']; ?></h2>
                  </div>
               <?php else : ?>
                  <input type="hidden" id="hash" name="hash" value="<?php echo $data['tasks'][0]['hash']; ?>">
                  <input type="hidden" id="color" name="color" value="<?php echo $colorName; ?>">
                  <h1 class="drop-shadow-lg shadow-black text-xl">
                     <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                     </svg> Convert MP3
                  </h1>
               <?php endif; ?>
            </div>
         </div>
      </button>
   </form>
</body>
</html>