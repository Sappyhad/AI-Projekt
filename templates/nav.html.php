<?php

/** @var $router \App\Service\Router */
$login = " ";
if (!isset($_SESSION['email'])){
    $login="<li><a href=".$router->generatePath('login-index').">Login</a></li>";
    }
else{
    $login = "<li><a href=".$router->generatePath('logout-index').">Wyloguj</a></li>";
}
?>
<ul>
    <li><a href="<?= $router->generatePath('') ?>">Home</a></li>
        <?php echo $login; ?>
    <li><a href="<?= $router->generatePath('building-index') ?>">Budynek</a></li>
    <li><a href="<?= $router->generatePath('employees-index') ?>">Pracownicy</a></li>
    <li><a href="<?= $router->generatePath('employee-import') ?>">Import</a></li>
    <li>
        <form action="<?= $router->generatePath('employees-index') ?>" method="post">
            <input id="searchBar" type="text" name="searchBar" placeholder="szukaj">
        </form>
    </li>
</ul>

<script>

    const searchBar = document.getElementById("searchBar");
    // searchBar.addEventListener("keyup", e => {
    //     const searchString = e.target.value;
    //     const filteredCharacters = hpCharacters.filter(character => {
    //         return (
    //             character.name.includes(searchString) ||
    //             character.house.includes(searchString)
    //         );
    //     });
    //     displayCharacters(filteredCharacters);
    // });
    searchBar.addEventListener("keyup", e => {
        console.log(e);
        // const searchString = e.target.value.toLowerCase();
        // const filteredCharacters = hpCharacters.filter(character => {
        //     return (
        //         character.name.toLowerCase().includes(searchString) ||
        //         character.house.toLowerCase().includes(searchString)
        //     );
        // });
    });


</script>

<?php
