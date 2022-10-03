<article class="dashform__main">
    <h2>Add Company</h2>
    <hr>
    <form action="/companies" method="post" class="dashform__form">
        <input type="text" name="company" class="dashform__input" placeholder="Company">
        <input type="text" name="country" class="dashform__input" placeholder="Country">
        <input type="text" name="tva" class="dashform__input" placeholder="Tva">
        <select name="type" id="" class="dashform__select">
            <?php
            //data = type_id
            foreach($data[0]['datas'] as $item){?>
                <option value="<?= $item->id ?>"><?= $item->Name ?></option>;
            <?php } ?>
        </select>
        <input type="submit" value="Submit" class="dashform__submit">
    </form>
</article>