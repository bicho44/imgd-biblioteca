function goResultados(urlbio){
    tipo= document.getElementById("combustibles").value;
    potencia= document.getElementById("potencias").value;
    caldera= document.getElementById("calderas").value;
    precio= document.getElementById("precio").value;
    horas= document.getElementById("horas").value;
    
    console.log(urlbio);

    if ( (precio != "") && (horas !="")){
        
    }else{

        alert("¡Por favor, complete toda la información!");
        return;
    }
    
    var e = document. getElementById("combustibles");
    var tipo_text = e.options[e.selectedIndex].text;
    
    var e = document. getElementById("potencias");
    var potencia_text = e.options[e.selectedIndex].text;
    
    var e = document. getElementById("calderas");
    var caldera_text = e.options[e.selectedIndex].text;
    
    
    url = "/"+urlbio+"/?tipo="+tipo+"&potencia="+potencia+"&caldera="
            +caldera+"&precio="+precio+"&horas="+horas
            +"&tipo_text="+tipo_text
            +"&potencia_text="+potencia_text
            +"&caldera_text="+caldera_text;
    
    
    document.location = url;
}

