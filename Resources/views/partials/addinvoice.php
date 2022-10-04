<article class="dashform__main">
    <h2>Add invoice</h2>
    <hr>
    <form action="/invoice" method="post" id="form" class="dashform__form">
        <input type="text" name="ref" class="dashform__input" id="reference" placeholder="Reference">
        <input type="number" name="price" class="dashform__input" id="price" placeholder="Price">
        <select name="company" class="dashform__select">
            <?php
                foreach($data[0]['datas'] as $item){?>
                     <option value="<?= $item->id ?>"><?= $item->Name ?></option>;
               <?php } ?>
        </select>
        <input type="submit" value="Submit" class="dashform__submit">
    </form>
</article>
