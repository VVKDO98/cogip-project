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
    <article class="dashform__main">
        <h2>Add invoice</h2>
        <form action="" method="post">
            <div>
                <label for="ref">Reference</label>
                <input type="text" name="ref">
            </div>

            <div>
                <label for="price">Price</label>
                <input type="text" name="price">
            </div>
            <div>
                <label for="company">company</label>
                <select name="company" id="">
                    <?php
                    foreach ($data['datas'] as $item){
                        echo "<option value='$item[id]'>$item</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit">Save</button>
            <hr>
            <form action="" method="post" class="dashform__form">
                <input type="text" name="ref" class="dashform__input">
                <input type="text" name="price" class="dashform__input">
                <select name="company" id="" class="dashform__select">
                    <?php
                    foreach ($data as $item){
                        echo "<option value='$item'>$item</option>";
                    }
                    ?>
                </select>
                <input type="submit" value="Submit" class="dashform__submit">
            </form>

>>>>>>> 5e0dd609ae9d8872cfe282ab9811a55409abf382
</article>