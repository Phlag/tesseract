<?php include('app/load.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OCR Testing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto">
        <div class="max-w-sm rounded overflow-hidden shadow-lg mx-auto mt-4">
            <img class="w-full" src="/assets/img/tesseract.jpg" alt="Sunset in the mountains">
            <?php if (isset($error)) : ?>
            <div class="bg-red-lightest border border-red-light text-red-dark px-4 py-3 rounded relative mr-5 ml-5 mt-3" role="alert">
                <strong class="font-bold">Holy smokes!</strong>
                <span class="block sm:inline"><?=$error?></span>
            </div>
            <?php endif; ?>

            <div class="px-6 py-4">
            <?php if (!isset($ocr)) : ?>
                <div class="font-bold text-xl mb-2">Testons OCR Tesseract!</div>
                <p class="text-grey-darker text-base">
                    Upload ton image ici et voyonc ce que ça donne!
                </p>
                <form method="post" class="mt-4" enctype="multipart/form-data">
                    <input type="file" name="myfile" value="">
                    <button type="submit" name="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded-full">Go!</button>
                </form>
            <?php else : ?>
                <div class="font-bold text-xl mb-2">Voici le résutat</div>
                <p class="text-grey-darker text-base">
                    <?=$ocr?>
                </p>
                <?php $imageData = file_get_contents($_FILES['myfile']['tmp_name']);
                echo sprintf('<img class="mt-3" src="data:image/png;base64,%s" />', base64_encode($imageData)); ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>