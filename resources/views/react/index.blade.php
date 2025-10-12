<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>React App</title>
</head>

<body>
    <div id="root"></div>
    <?php
    $html = file_get_contents(public_path('react/index.html'));
    // Fix static paths so Laravel serves them correctly
    $html = str_replace('static/', 'react/static/', $html);
    echo $html;
    ?>
</body>

</html>