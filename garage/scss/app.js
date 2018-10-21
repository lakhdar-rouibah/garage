
var path = "http://lakhdar.ovh/index.php";

var cc = localStorage.getItem('cookies');


if(document.cookie.indexOf('PHPSESSID') === 0 && cc != "true"){

    document.querySelector('#coockies').style.display='flex';
}else{

    document.querySelector('#coockies').style.display='none';
}


// to see with agenda view ___________________________________________________________________________ to verified tomorow
$('.remove').removeClass('day');

//======================================= Agenda functions ===========================================//

/**
 * function getDate
 * search date to select of modal in agenda send data to insertSelect function 
 * @param {string} date 
 */
function getDate(date){
    
    $('#date').val(date);
    url= path + "?rec=Appoint&date=" + date;

    $.get(url, function( data ) {
        data = JSON.parse(data);
        insertSelect(data)
    });

}

/**
 * function insertSelect
 * ceate select option in modal of agenda
 * @param {array} data 
 */
function insertSelect(data){

    $("#select").empty();
    $('#select').append('<option value="">Select hour</option>');
    for(var i = 0; i < data.length; i++) {

        for(var s = 0; s < data[i].length; s++) {
        
            $('#select').append('<option value="' + data[i][s].id_appointement + '">' + data[i][s].app +'</option>');

        }
    }
}

//================================= Mend functions ==================================================//


$("#searchMend").keyup(()=>{

    $('#dropSelect').empty();
    var i = 0;
    var $val = $("#searchMend").val();

    var url= path + "?req=Search&val=" + $val;

    $.get(url, function( data ) {
        data = JSON.parse(data);
        if(data){
            
            for(i = 0; i<data.length; i++){
                if(data[i].first_name){
                    $('#dropSelect').append('<sapn class="mend-span" onclick="filling(' + data[i].id_customer + ')" onmouseover="mOn(this)" onmouseleave="mOut(this)" >' + data[i].mail+ '</span></br>');
                    $(".mend-span").css('color', '#522401');
                }
            }
        }
    });
});

function mOn (elem) {

    $(elem).css('color', '#ff7811');
    $(elem).css('cursor','pointer');
}

function mOut (elem) {

    $(elem).css('color', '#522401');
}

function filling (elem){



    var url= path + "?req=CarsCustomer&val=" + elem;
    $("#searchMend").val(elem);
    $('#dropSelect').empty();
    window.location = url;
}

//================================= Mend functions ==================================================//


function searchPieces() {

    var category = $('#select_category').val();

    url= path + "?req=SearchCategory&cat=" + category;

    $.get(url, function( data ) {
        data = JSON.parse(data);

        insertPieces(data)
    });
}

function insertPieces(data){

    $("#div-pieces").empty();
    for(var i = 0; i < data.length; i++) {

            var pcs = data[i].id_pieces;
        
            $('#div-pieces').append('<div class="card col-4 text-secondary pb-3 m-3 "><div class="card-body pt-5 p-1 ">Bar code : ' + data[i].bar_code +'</br> Number pieces : ' + data[i].num +'</br>Name pieces : ' + data[i].name_pieces +'</br>For model : ' + data[i].for_model +'</br>Category : ' + data[i].description +'</br>Price : ' + data[i].price_ht +' €</br><div class="col-12 mt-3 d-flex pt-3 pb-3 border-top bg-light"><h3 class="p-0 mt-2 " > Amount : </h3><input class="form-control col-3 pt-4 pb-4 mr-3 ml-3 mt-1 rounded bg-light border border-dark text-dark" value="0" type="number" id="P'+ data[i].bar_code +'"><button class="col-3 btn m-0 mt-1 " onclick="send_data(this, '+pcs+', P'+ data[i].bar_code +')">Add</button></div></div></div>');

    }
}


function send_data(btn, id, qt){

    $(btn).css("background-color", "truelue");
    $(btn).css("color", "white");

    //alert("id_car: "+id_car+" btn: "+btn+" id: "+id+" qt:"+qt.value);

    url= path + "?req=Got&id_car="+id_car+"&id_pcs="+id+"&qt=" + qt.value;

    $.get(url, function( data ) {

    });
}


// ==================================== style ========================================


function hide(elem){

    localStorage.setItem('cookies', "true");
    
    element = document.querySelector(elem);
    element.style.display = "none";
}


