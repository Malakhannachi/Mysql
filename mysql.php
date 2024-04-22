
<?php
try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=recipe;charset=utf8', 'root', '');

} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

$sqlQuery = 'SELECT recipe.nom, recipe.temps_preparation, categorie.type_recette
FROM categorie
INNER JOIN recipe ON categorie.id_categorie= recipe.id_categorie';
$recipes = $mysqlClient->query($sqlQuery)->fetchAll();
var_dump($recipes);

?>
    
    <table>
    <style>
      td{border: 1px solid black;}  
    </style>
    
    <tr>
            
            <th>nom</th>
            <th>temps_preparation</th>
            <th>type_recettes</th>
            
        </tr>
    <?php 
    foreach ($recipes as $recipe) {
        ?>

    <tr>
        <td><?php echo $recipe['nom']; ?></td>
        <td><?php echo $recipe['temps_preparation']; ?></td>
        <td><?php echo $recipe['type_recette']; ?></td>
    </tr>
    
    <?php
}?>
</table>