var formObject= {

    editRowButton:function (no) {
        document.getElementById("edit_button"+no).style.display="none";
        document.getElementById("save_button"+no).style.display="inline-flex";

        var name=document.getElementById("name_row"+no);
        var amount=document.getElementById("amount_row"+no);

        var name_data=name.innerHTML;
        var amount_data=amount.innerHTML;

        name.innerHTML="<input type='text' id='name_text"+no+"' value='"+name_data+"'>";
        amount.innerHTML="<input type='text' id='amount_text"+no+"' value='"+amount_data+"'>";
    },

    editApi:function(id, name, amount ) {
    fetch(`/products/edit/${id}/${name}/${amount}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json; charset=utf-8'
        },
    }).then(response => {
        if (response.ok) {
            response.json()
                .then(json => console.log(json))
        } else {
            console.log("error")
        }
    })
    },

    saveRowButton:function(no) {
    var name_val=document.getElementById("name_text"+no).value;
    var amount_val=document.getElementById("amount_text"+no).value;

    document.getElementById("name_row"+no).innerHTML=name_val;
    document.getElementById("amount_row"+no).innerHTML=amount_val;

    document.getElementById("edit_button"+no).style.display="inline-flex";
    document.getElementById("save_button"+no).style.display="none";

    this.editApi(no, name_val, amount_val)
    },

    deleteRowButton:function(no)
    {
    document.getElementById("row"+no+"").outerHTML="";
    this.deleteRowApi(no)
    },

    deleteRowApi:function(id)
    {
        fetch(`/products/delete/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json; charset=utf-8'
            },
        }).then(response => {
            if (response.ok) {
                response.json()
                    .then(json => console.log(json))
            } else {
                console.log("error")
            }
        })
    },

    addRowButton:function() {
    var new_name=document.getElementById("new_name").value;
    var new_amount=document.getElementById("new_amount").value;

    this.addRowApi(new_name, new_amount);
    location.reload();
    },

    addRowApi:function (name, amount) {
        fetch(`/products/add/${name}/${amount}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json; charset=utf-8'
            },
        }).then(response => {
            if (response.ok) {
                response.json()
                    .then(json => console.log(json))
            } else {
                console.log("error")
            }
        })

    }

}

