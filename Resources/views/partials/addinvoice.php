<article class="dashform__main">
    <h2>Add invoice</h2>
    <hr>
    <div id="tabs"> <!-- cette div casse votre style -->
        <form action="/invoice" method="post" id="addinvoice" class="dashform__form">
            <input type="text" name="ref" class="dashform__input"  id="reference" placeholder="Reference">
            <input type="number" step="0.01" name="price" class="dashform__input"  id="price" placeholder="Price">
            <select name="company" class="dashform__select">
                <?php
                foreach($data['companies']['datas'] as $item){?>
                    <option value="<?= $item->id ?>"><?= $item->Name ?></option>;
                <?php } ?>
            </select>
            <input type="submit" value="Submit" class="dashform__submit">
        </form>

        <div id="listinvoice">
            <?php echo insertTable( $data['invoices'],'addinvoice')?>
        </div>
    </div>
</article>