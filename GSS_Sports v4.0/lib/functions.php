<?php
function get_pets() {
    $petsJson = file_get_contents('data/pets.json');
    $pets = json_decode($petsJson, true);

    return $pets;
}

function save_jerseys($jerseysToSave) {
    $json = json_encode($jerseysToSave, JSON_PRETTY_PRINT);
    file_put_contents('data/pets.json', $json);
}
?>