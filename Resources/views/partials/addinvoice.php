<article class="dashform__main">
    <h2>Add invoice</h2>
    <hr>
    <form action="" method="post" class="dashform__form">
        <input type="text" name="ref" class="dashform__input" placeholder="Reference">
        <input type="text" name="price" class="dashform__input" placeholder="Price">
        <select name="company" id="" class="dashform__select">
            <?php
            foreach ($data as $item){
                echo "<option value='$item'>$item</option>";
            }
            ?>
        </select>
        <input type="submit" value="Submit" class="dashform__submit">
    </form>
</article>