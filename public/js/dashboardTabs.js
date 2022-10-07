class Tabs{
    constructor() {
        this.tabs = document.querySelector('.tabs')
        this.form = document.querySelector('form')
        this.table = document.querySelector('.tableWrapper')
        this.listbtn = document.querySelector('.list')
        this.formbtn = document.querySelector('.form')
        this.listbtn.addEventListener('click', e =>{
            e.preventDefault()
            this.displayTable()
        })
        this.formbtn.addEventListener('click', e =>{
            e.preventDefault()
            this.displayForm()
        })
    }

    displayForm(){
        this.form.style.display='flex'
        this.table.style.display='none'
    }
    displayTable(){
        this.table.style.display='block'
        this.form.style.display='none'
    }

}

const tabs = new Tabs()