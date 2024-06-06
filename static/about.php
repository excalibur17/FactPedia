<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Cards</title>
    <link rel="stylesheet" href="../css/about.css">

</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>FactPedia</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../proses/view_article.php">Read</a></li>
                    <li><a href="../static/about.php">About</a></li>
                    <li><a href="../proses/login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="container article-grid">
            <div class="article-card">
                <div class="article-image">
                    <img src="../img/HESKI1.jpg" alt="picture">
                </div>
                <div class="article-content">
                    <h2 class="article-title">Heski Pranata</h2>
                    <p class="article-excerpt">
                        Age: 20 <br>
                        Status: Student <br>
                        <span class="hidden"> University: Sam Ratulangi University <br>
                        Major: informatics Engineering <br>
                        Hobby: nonton bokep <br>
                        Favorite Club: Liverpool FC </span>
                    </p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </div>
            <div class="article-card">
                <div class="article-image">
                    <img src="../img/irham.jpg" alt="Picture">
                </div>
                <div class="article-content">
                    <h2 class="article-title">Irham F. Hamid</h2>
                    <p class="article-excerpt">
                        Age: 20 <br>
                        Status: Student <br>
                        <span class="hidden"> University: Sam Ratulangi University <br>
                        Major: informatics Engineering <br>
                        Hobby: nonton bokep <br>
                        Favorite Club: Liverpool FC </span>
                    </p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </div>
            <div class="article-card">
                <div class="article-image">
                    <img src="../img/JOY1.jpg" alt="Yet Another Logo">
                </div>
                <div class="article-content">
                    <h2 class="article-title">Joy O.S. Tambuwun</h2>
                    <p class="article-excerpt">
                        Age: 20 <br>
                        Status: Student <br>
                        <span class="hidden"> University: Sam Ratulangi University <br>
                        Major: informatics Engineering <br>
                        Hobby: nonton bokep <br>
                        Favorite Club: Liverpool FC </span>
                    </p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </div>
            <div class="article-card">
                <div class="article-image">
                    <img src="../img/Arthur.jpg" alt="And Another Logo">
                </div>
                <div class="article-content">
                    <h2 class="article-title">Arthur M. Unsong</h2>
                    <p class="article-excerpt">
                        Age: 19 <br>
                        Status: Student <br>
                        <span class="hidden"> University: Sam Ratulangi University <br>
                        Major: informatics Engineering <br>
                        Hobby: Game and sport <br>
                        Favorite Club: Manchester City </span>
                    </p>
                    <a href="#" class="read-more">Read More</a>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Kelompok Kami. All rights reserved.</p>
    </footer>
    <script>
        document.querySelectorAll('.read-more').forEach(button => {
            button.addEventListener('click', event => {
                event.preventDefault();
                const hiddenContent = button.previousElementSibling.querySelector('.hidden');
                if (hiddenContent.style.display === 'none' || !hiddenContent.style.display) {
                    hiddenContent.style.display = 'inline';
                    button.textContent = 'Read Less';
                } else {
                    hiddenContent.style.display = 'none';
                    button.textContent = 'Read More';
                }
            });
        });
    </script>
</body>
</html>
