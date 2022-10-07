<div class="dashform__main">
    <div id="tabs">
        <form method="post" action="/update/company" class="dashform__form">
        <input type="hidden" name="id" class="dashform__input" value="<?= $data['company']['companies'][0]->id  ?>">
        <label for="name" class="dashform__label">Name</label>
        <input type="text" name="name" class="dashform__input" id="name" value="<?= $data['company']['companies'][0]->Name ?>"  data-default="<?= $data['company']['companies'][0]->Name ?>" disabled>
        <label for="country" class="dashform__label">Country</label>
        <input type="text" name="country" class="dashform__input" id="country" value="<?= $data['company']['companies'][0]->Country ?>"  data-default="<?= $data['company']['companies'][0]->Name ?>" disabled>
        <label for="tva" class="dashform__label">TVA</label>
        <input type="text" name="tva" id="tva" class="dashform__input" value="<?= $data['company']['companies'][0]->TVA ?>"  data-default="<?= $data['company']['companies'][0]->Name ?>" disabled>
        <label for="types" class="dashform__label"></label>
        <select name="types" id="types" class="dashform__input" data-default="<?= $data['company']['companies'][0]->typeid ?>" disabled>
            <?php
            foreach ($data["types"] as $type):
            ?>
                <option value="<?= $type->id ?>" <?= $type->id==$data['company']['companies'][0]->typeid?'selected="selected"':''; ?>><?= $type->name ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <button type="submit" id="update" class="dashform__submit" style="display: none">Update</button>
        <button type="button" id="cancel" class="dashform__submit" style="display: none">Cancel</button>
        <button type="button" id="edit" class="dashform__submit">Edit</button>
        </form>
    </div>
</div>
<script>
    const update = document.querySelector('#update')
    const cancel = document.querySelector('#cancel')
    const edit = document.querySelector('#edit')
    const inputs = [...document.querySelectorAll('input')]
    const select = document.querySelector('select')
    const options = [...select.querySelectorAll('option')]
    function showUpdate(){
        update.style.display="block"
        cancel.style.display="block"
        edit.style.display="none"
        inputs.map(input => {
            input.disabled=false
        })
        select.disabled=false
    }

    function cancelUpdate(){
        update.style.display="none"
        cancel.style.display="none"
        edit.style.display="block"
        inputs.map(input => {
            input.disabled=true
        })
        select.disabled=true
    }

    function resetValues(){
        inputs.map(input => {
            input.value = input.dataset.default
        })
        options.map(option => {
            option.value === select.dataset.default? option.selected=true : option.selected=false
        })
    }

    edit.addEventListener('click', e => {
        e.preventDefault()
        showUpdate()
    })

    cancel.addEventListener('click', e=>{
        e.preventDefault()
        resetValues()
        cancelUpdate()
    })
</script>