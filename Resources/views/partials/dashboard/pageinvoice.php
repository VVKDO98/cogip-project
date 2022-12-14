<script defer src="/js/dashboardEdit.js"></script>
<div class="dashform__main">
    <div id="tabs">
    <form method="post" action="/update/invoice" class="dashform__form">
        <input type="hidden" name="id" value="<?= $data['invoice'][0]->id  ?>">
        <label for="ref" class="dashform__label">Reference</label>
        <input type="text" name="ref" id="ref" class="dashform__input" value="<?= $data['invoice'][0]->Ref ?>"  data-default="<?= $data['invoice'][0]->Ref ?>" disabled>
        <label for="duedates" class="dashform__label">Due dates</label>
        <input type="date" name="duedates" id="duedates" class="dashform__input" value="<?= date("Y-m-d", strtotime($data['invoice'][0]->{'Due dates'})) ?>" data-default="<?= date("Y-m-d", strtotime($data['invoice'][0]->{'Due dates'})) ?>" disabled>
        <label for="company" class="dashform__label">Company</label>
        <select name="company" id="company" class="dashform__select" disabled data-default="<?= $data['invoice'][0]->id_company ?>">
            <?php
                foreach ($data['companies']['datas'] as $item):
            ?>
                    <option value="<?= $item->id ?>" <?=  $data['invoice'][0]->id_company==$item->id? 'selected="selected"':''; ?> ><?= $item->Name ?></option>
            <?php endforeach; ?>
        </select>
        <label for="price" class="dashform__label">Price</label>
        <input type="number" step="0.01" name="price" id="price" class="dashform__input" data-default="<?= $data['invoice'][0]->price ?>" value="<?= $data['invoice'][0]->price ?>" disabled>
        <button type="submit" id="update" class="dashform__submit" style="display: none">Update</button>
        <button type="button" id="cancel" class="dashform__submit" style="display: none">Cancel</button>
        <button type="button" id="edit" class="dashform__submit">Edit</button>
    </form>
    </div>
</div>