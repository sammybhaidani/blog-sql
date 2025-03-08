<?php

require_once 'src/Services/DatabaseConnectionService.php';
require_once 'src/Models/PostsModel.php';

$db = DatabaseConnectionService::connect();
$postsModel = new PostsModel($db);
$posts = $postsModel->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog - home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="selection:bg-teal-200">
    <section class="container lg:w-1/2 mx-auto flex flex-col gap-5">
        <?php
        $output = '';
        foreach ($posts as $post)
        {
            $date = new DateTime($post->getCreatedAt());
            $content = substr($post->getContent(),0, 100);

            $output.= '<article class="p-8 border border-solid rounded-md">';
            $output.= "<span class='px-3 py-2 bg bg-slate-200 inline-block mb-4 rounded-sm'>{$post->getCategory()}</span>";
            $output.= '<div class="flex justify-between items-center flex-col md:flex-row mb-4">';
            $output.= "<h2 class='text-4xl'>{$post->getTitle()}</h2>";
            $output.= "<span class='text-xl'>{$post->getLikes()} likes - {$post->getDislikes()} dislikes</span>";
            $output.= '</div>';
            $output.= "<p class='text-2xl mb-2'>{$date->format('Y/m/d')} - {$post->getAuthorName()}</p>";
            $output.= "<p>$content...</p>";
            $output.= '<div class="flex justify-center">';
            $output.= '<a class="px-3 py-2 mt-4 text-lg bg-indigo-400 hover:bg-indigo-700 hover:text-white transition inline-block rounded-sm" href="singlePost.php">View post</a>';
            $output.= '</div>';
            $output.= '</article>';
        }
        echo $output;
        ?>
    </section>
</body>
</html>