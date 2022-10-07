
<script defer src="/js/dashboardEdit.js"></script>
<form method="post" action="/update/invoice">
    <input type="hidden" name="id" value="<?= $data['invoice'][0]->id  ?>">
    <div>
        <label for="ref">Ref</label>
        <input type="text" name="ref" id="ref" value="<?= $data['invoice'][0]->Ref ?>"  data-default="<?= $data['invoice'][0]->Ref ?>" disabled>
    </div>
    <div>
        <label for="duedates">Due dates</label>
        <input type="date" name="duedates" id="duedates" value="<?= date("Y-m-d", strtotime($data['invoice'][0]->{'Due dates'})) ?>" data-default="<?= date("Y-m-d", strtotime($data['invoice'][0]->{'Due dates'})) ?>" disabled>
    </div>
    <div>
        <label for="company">Company</label>
        <select name="company" id="company" disabled data-default="<?= $data['invoice'][0]->id_company ?>">
        <?php
            foreach ($data['companies']['datas'] as $item):
        ?>
            <option value="<?= $item->id ?>" <?=  $data['invoice'][0]->id_company==$item->id? 'selected="selected"':''; ?> ><?= $item->Name ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="price">Price</label>
        <input type="number" step="0.01" name="price" id="price" data-default="<?= $data['invoice'][0]->price ?>" value="<?= $data['invoice'][0]->price ?>" disabled>
    </div>

    <button type="submit" id="update" style="display: none">Update</button>
    <button type="button" id="cancel" style="display: none">Cancel</button>
    <button type="button" id="edit">Edit</button>
</form>
