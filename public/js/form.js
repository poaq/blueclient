function edit_row(no)
{
    document.getElementById("edit_button"+no).style.display="none";
    document.getElementById("save_button"+no).style.display="inline-flex";

    var name=document.getElementById("name_row"+no);
    var amount=document.getElementById("amount_row"+no);

    var name_data=name.innerHTML;
    var amount_data=amount.innerHTML;

    name.innerHTML="<input type='text' id='name_text"+no+"' value='"+name_data+"'>";
    amount.innerHTML="<input type='text' id='amount_text"+no+"' value='"+amount_data+"'>";

}

function save_row(no)
{
    var name_val=document.getElementById("name_text"+no).value;
    var amount_val=document.getElementById("amount_text"+no).value;

    document.getElementById("name_row"+no).innerHTML=name_val;
    document.getElementById("amount_row"+no).innerHTML=amount_val;

    document.getElementById("edit_button"+no).style.display="inline-flex";
    document.getElementById("save_button"+no).style.display="none";
    
}

function delete_row(no)
{
    document.getElementById("row"+no+"").outerHTML="";
}


function add_row()
{
    var new_name=document.getElementById("new_name").value;
    var new_country=document.getElementById("new_amount").value;

    var table=document.getElementById("data_table");
    var table_len=(table.rows.length)-1;
    var row = table.insertRow(table_len).outerHTML="<tr id='row"+table_len+"'><td id='name_row"+table_len+"'>"+new_name+"</td><td id='amount_row"+table_len+"'>"+new_amount+"</td><td><input type='button' id='edit_button"+table_len+"' value='Edit' class='edit' onclick='edit_row("+table_len+")'> <input type='button' id='save_button"+table_len+"' value='Save' class='save' onclick='save_row("+table_len+")'> <input type='button' value='Delete' class='delete' onclick='delete_row("+table_len+")'></td></tr>";

    document.getElementById("new_name").value="";
    document.getElementById("new_amount").value="";
}