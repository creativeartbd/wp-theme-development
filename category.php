<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Category Page.</h1>
    <?php 
    var_dump(is_category('fitness'));
    if( have_posts() ) {
        while( have_posts() ) {
            the_post();
            echo '<p>'. get_the_title() . '</p>';
            the_category(', ');
        }
    }
    ?>
</body>
</html>