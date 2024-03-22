function busca() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("campoBusca");

    filter = String(input.value.toUpperCase());
    table = document.getElementById("tabelaDados");
    tr = table.getElementsByTagName("tr");


    filterrepl = filter.replace( /[À|Á|Â|Ã]/g ,"A").replace( /[É|È|Ê|]/g ,"E").replace( /[Ç]/g ,"C").replace( /[Ì|Í||]/g ,"I").replace( /[Ó|Ò|Õ|Ô]/g ,"O").replace( /[Ú|Ù|Û|]/g ,"U");
    
    console.log(filterrepl);

    for (i = 0; i < tr.length; i++) {


        td = tr[i].getElementsByTagName("td")[0]; // coluna 1
        td1 = tr[i].getElementsByTagName("td")[1]; // coluna 2
        td3 = tr[i].getElementsByTagName("td")[3]; // coluna 3 
        td4 = tr[i].getElementsByTagName("td")[4]; // coluna 4




        //td1 = td1.replaceArray( /[À|Á|Â|Ã]/g ,"A").replace( /[É|È|Ê|]/g ,"E").replace( /[Ç]/g ,"C").replace( /[Ì|Í||]/g ,"I").replace( /[Ó|Ò|Õ|Ô]/g ,"O").replace( /[Ú|Ù|Û|]/g ,"U");


        if (td || td1 || td3 || td4 ) {

            if ( (td.innerHTML.toUpperCase().indexOf(filterrepl) > -1) 
            || (td1.innerHTML.toUpperCase().replace( /[À|Á|Â|Ã]/g ,"A").replace( /[É|È|Ê|]/g ,"E").replace( /[Ç]/g ,"C").replace( /[Ì|Í||]/g ,"I").replace( /[Ó|Ò|Õ|Ô]/g ,"O").replace( /[Ú|Ù|Û|]/g ,"U").indexOf(filterrepl) > -1) 
            || (td3.innerHTML.toUpperCase().replace( /[À|Á|Â|Ã]/g ,"A").replace( /[É|È|Ê|]/g ,"E").replace( /[Ç]/g ,"C").replace( /[Ì|Í||]/g ,"I").replace( /[Ó|Ò|Õ|Ô]/g ,"O").replace( /[Ú|Ù|Û|]/g ,"U").indexOf(filterrepl) > -1) 
            || (td4.innerHTML.toUpperCase().replace( /[À|Á|Â|Ã]/g ,"A").replace( /[É|È|Ê|]/g ,"E").replace( /[Ç]/g ,"C").replace( /[Ì|Í||]/g ,"I").replace( /[Ó|Ò|Õ|Ô]/g ,"O").replace( /[Ú|Ù|Û|]/g ,"U").indexOf(filterrepl) > -1) )  {            
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    } 