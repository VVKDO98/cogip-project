<div>
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
    </form>
</div>