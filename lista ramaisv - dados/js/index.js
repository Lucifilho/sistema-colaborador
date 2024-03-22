function busca() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("campoBusca");
    filter = input.value.toUpperCase();
    table = document.getElementById("tabelaDados");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0]; // coluna 1
        td1 = tr[i].getElementsByTagName("td")[1]; // coluna 2
        td3 = tr[i].getElementsByTagName("td")[3]; // coluna 3 
        td4 = tr[i].getElementsByTagName("td")[4]; // coluna 4


        if (td) {
        if ( (td.innerHTML.toUpperCase().indexOf(filter) > -1) || (td1.innerHTML.toUpperCase().indexOf(filter) > -1) || (td3.innerHTML.toUpperCase().indexOf(filter) > -1) || (td4.innerHTML.toUpperCase().indexOf(filter) > -1) )  {            
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
    } 