<form method = "POST">
    <input type="text" 
            name="first_name" 
            placeholder ="Krestné meno"                         
            value ="<?= htmlspecialchars($first_name) ?>" 
            required
            > 
    <br>

    <input type="text" 
            name="second_name" 
            placeholder ="Priezvisko"
            value = "<?= htmlspecialchars($second_name) ?>"
            required
    ><br>

    <input type="number" 
            name="age" 
            placeholder ="Vek" 
            min= "10" 
            value = "<?= htmlspecialchars($age) ?>"
            required
    ><br>

    <textarea name="life"
                placeholder= "podrobnosti o žiakovi"
                required><?= htmlspecialchars($life) ?> </textarea><br>

    <input type="text" 
            name ="college" 
            placeholder ="Kolej" 
            value = "<?= htmlspecialchars($college) ?>"
            required
    ><br>

    <input type="submit" value="Uložiť">
</form>