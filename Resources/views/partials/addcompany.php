<h2>Add Company</h2>
<form action="" method="post">
    <div>
        <label for="company">Company Name</label>
        <input type="text" name="company">
    </div>
    <div>
        <label for="country">Country</label>
        <input type="text" name="country">
    </div>
    <div>
        <label for="tva">N°TVA</label>
        <input type="text" name="tva">
    </div>
    <div>
        <label for="type"></label>
        <select name="type" id="">
            <?php
            // $data = type_id in companies
                foreach ($data as $item){
                   echo "<option value='$item'>$item</option>";
                }
            ?>
        </select>
    </div>

    <button type="submit">Save</button>
</form>
