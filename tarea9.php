<?php
$url = "https://pokeapi.co/api/v2/pokemon/";

function buscar($nombre, $url){
    $response = file_get_contents($url . $nombre);
    return json_decode($response, true);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pokédex</title>
    <style>
        section{
            margin-left: 100px;
        }
        #tipo_normal{
            
           background-image: url("imagenes/normal.png");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            width: 200px;
            height: 300px;
            align-items: center;      
            text-align: center;
           
             margin-right: 50px;
            
        }
        input[type="radio"]{
            margin-right: 50px;
        }
        #tipo_normal img{
            margin-top: 40px;
        }
        form{
            margin: 30px;
        }
        #contenedor{
            display: flex;
            margin-left: 400px;
        }
    </style>
</head>
<body>

<h1>Test Pokemon</h1>
<section>
<h2>1.¿En que generación aparece por primera vez este pokemon ? </h2>

<?php $regigigas = buscar("regigigas", $url); ?>
<div id="contenedor">
<div id="tipo_normal">
    <img src="<?php echo $regigigas["sprites"]['front_default']; ?>">
    <h2><?php echo ucfirst($regigigas["name"]) ; ?></h2>
</div>
</div>
<form method="post">
    <label>Primera generación</label><input type="radio" name="generacion" value="primera">
    <label>Segunda generación</label><input type="radio" name="generacion" value="segunda">
    <label>Tercera generación</label><input type="radio" name="generacion" value="tercera">
    <label>Cuarta generación</label><input type="radio" name="generacion" value="cuarta">

<h2>2. ¿Cual es el primer pokemon de la pokedex</h2>
<?php 
$bulbasur = buscar("bulbasaur", $url); 
$charmander = buscar("charmander", $url); 
$pikachu = buscar("pikachu", $url); 
?>
<div id="contenedor">
<div id="tipo_normal">
    <img src="<?php echo $charmander["sprites"]['front_default']; ?>">
    <h2><?php echo ucfirst($charmander["name"]) ; ?></h2>
</div>
<div id="tipo_normal">
    <img src="<?php echo $bulbasur["sprites"]['front_default']; ?>">
    <h2><?php echo ucfirst($bulbasur["name"]) ; ?></h2>
</div>
<div id="tipo_normal">
    <img src="<?php echo $pikachu["sprites"]['front_default']; ?>">
    <h2><?php echo ucfirst($pikachu["name"]) ; ?></h2>
</div>
</div>

    <label>Pikachu</label><input type="radio" name="1pokemon" value="pikachu">
    <label>Bulbasaur</label><input type="radio" name="1pokemon" value="bulbasaur">
    <label>Charmander</label><input type="radio" name="1pokemon" value="charmander">
    

</section>

    <input type="submit" name="enviar" value="Enviar">
</form><br>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $nota=0;
    if($_POST["generacion"]=="cuarta"){
        $nota++;
    }
     if($_POST["1pokemon"]=="bulbasaur"){
        $nota++;
    }
    echo "Nota: $nota/2";
}
?>
</body>
</html>
