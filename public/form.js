const changeValueForm = (items) => {
    items.forEach(it => {
        const tag = document.querySelector(`#${it.id}`)
        if(tag.tagName === 'INPUT') tag.value = it.text;
        else if (element.tagName === 'SELECT') selectChange(it.id. it.text);
    })
}

const selectChange = (name, value, action=false) => {
    let select = document.querySelector(`select[name="${name}"]`);
    let selectOptions = select.children;
    let options = [];
    let html = "";

    for(let i = 0; i < selectOptions.length; i++)
        options.push({value: selectOptions[i].value, html: selectOptions[i].innerHTML});

    select.innerHTML = '';

    for(let i = 0; i < options.length; i++){
        let status = options[i].value.toUpperCase() == value.trim().toUpperCase();
        let seleted = status ? "selected" : "";
        html += `<option value="${options[i].value}" ${seleted}>${options[i].html}</option>`;
    }

    action ? select.setAttribute('disabled','') : select.removeAttribute('disabled');
    select.innerHTML = html;
}
