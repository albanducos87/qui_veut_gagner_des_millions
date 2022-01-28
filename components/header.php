<header>
<h1><a href="index.php?page=0">BeAGeek</a></h1>
<nav>
<ul>
<?php if($_COOKIE["isAdmin"] == "true") :?>
    <li><a href="index.php?page=1">Emprunt/restitution</a> </li>
    <?php endif ?>
    <li><a href="index.php?page=2"> Historique</a></li>
    
    <?php if($_COOKIE["isAdmin"] == "true") :?>
        <li><a href="index.php?page=3"> Comptes</a></li>
        <?php endif ?>
        </ul>
        </nav>
        <div>
        <label for="isAdmin">Etes vous admin</label>
        <?php if($_COOKIE["isAdmin"] == "true") : ?>
            <input type="checkbox" id="isAdmin"  checked>
            <?php else: ?>
                <input type="checkbox" id="isAdmin" >
                <?php endif ?>
                </div>
                </header>
                
                
                <script>
                var checkbox = document.getElementById("isAdmin")
                checkbox.addEventListener("click", (v) => {
                    document.cookie = "isAdmin = " + checkbox.checked;
                    document.location.reload();
                })
                </script>