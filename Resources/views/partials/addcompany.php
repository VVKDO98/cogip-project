<article class="dashform__main">
    <h2>Add Company</h2>
    <hr>
    <form action="" method="post" class="dashform__form">
        <input type="text" name="company" class="dashform__input">
        <input type="text" name="country" class="dashform__input">
        <input type="text" name="tva" class="dashform__input">
        <select name="type" id="" class="dashform__select">
            <?php
            // $data = type_id in companies
            foreach ($data as $item){
                echo "<option value='$item'>$item</option>";
            }
            ?>
        </select>
        <input type="submit" value="Submit" class="dashform__submit">
    </form>
</article>