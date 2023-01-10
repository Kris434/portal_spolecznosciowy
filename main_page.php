<?php
session_start();

if(!isset($_SESSION['loggedin']))
{
    header('location: index.html');
    exit();
}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <Title> Cameleon - Najlepszy portal! </title>
    <meta name= "description" content="Serwis prezentuje portal spolecznosciowy. Sprawdz go odrazu, nie zwlekaj" />
    <meta name= "keywords" content="portal, portal spolecznosciowy, znajomi, posty" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" type="text/css" href="style.css">

    <link type="text/css" href="style.css">
</head>

<body>

<header>

    <div>

    </div>

    <div>
        <nav>
            <a href="./accounts/logout.php">Wyloguj się</a>
        </nav>
    </div>

</header>

<main>
    <div>
        <h3>Dodaj posta</h3>
        <form action="posts/createPost.php" method="post" class="postForm">
            <label>Treść posta:</label><input type="text" name="text">
            <button type="submit">Dodaj posta</button>
        </form>
    </div>
    <hr>
    <div id="posty">
        <script>
            fetch('http://localhost/portal/portal_spolecznosciowy/api/posts')
                .then(response => response.json())
                .then(data => {

                    const posts = document.getElementById("posty")

                    data.forEach(element => {
                        let onePost = document.createElement('div')
                        posts.append(onePost)
                        onePost.classList.add('onePost')

                        let user = document.createElement('p')
                        onePost.append(user)
                        user.classList.add('username')
                        user.innerHTML = element.name + " " + element.surname

                        let post = document.createElement('p')
                        onePost.append(post)
                        post.classList.add('post')
                        post.innerHTML = element.post

                        let postDate = document.createElement('p')
                        onePost.append(postDate)
                        postDate.classList.add('postDate')
                        postDate.innerHTML = element.postDate

                        let cameleons = document.createElement('p')
                        onePost.append(cameleons)
                        cameleons.classList.add('cameleons')
                        cameleons.innerHTML = element.cameleons

                        let cameleonsForm = document.createElement('form')
                        cameleonsForm.action = 'posts/cameleons.php'
                        cameleonsForm.method = 'POST'
                        onePost.append(cameleonsForm)

                        let cameleonBtn = document.createElement('button')
                        cameleonBtn.name = 'cameleon'
                        cameleonBtn.value = element.postId
                        cameleonBtn.textContent = 'Cameleon!'
                        cameleonsForm.append(cameleonBtn)
                    })
                })
        </script>
    </div>
</main>
</body>
</html>
