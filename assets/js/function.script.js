//onLoad
function OnLoad() {
    window.onload = function consoleLog() {
        
    }

}

//liveSearchfunction
function liveSearch() {
    const keyword = document.querySelector('#keyword');
    const searchResult = document.querySelector('#searchResult');

    keyword.addEventListener('keyup', function () {
        fetch('/kingice/search.php?keyword=' + keyword.value)
            .then((response) => response.text())
            .then((response) => (searchResult.innerHTML = response));

    });
}

//closeAlert
function closeAlert(){
    setTimeout(function(){
        $('#filterAlertModal').modal('hide')
    }, 1000);
}

//filterData
function showAll(){
    const showall = document.querySelector('#showall');
    const listMenu = document.querySelector('#listMenu');
    const filterAlertModalBody = document.querySelector("#filterAlertModalBody")

    showall.addEventListener('click', function(){
        $('#filterDataModal').modal('hide')
        $('#filterAlertModal').modal('show')
        filterAlertModalBody.innerHTML = '<div class="alert alert-dark fade show mx-auto my-auto p-2 col-sm-7 col-10" role="alert"  style="text-align:center; font-color: black; background-color: #FFAE00"; border: 1px #FFD373>'+
        '<h7>Tampilkan Semua</h7>'+'</div>';
        closeAlert();
        fetch('/kingice/filter.php?category=' + showall.value)
            .then((response) => response.text())
            .then((response) => (listMenu.innerHTML = response));
    })

}

function filterRecommendation(){
    const recommendation = document.querySelector('#recommendation');
    const listMenu = document.querySelector('#listMenu');
    const filterAlertModalBody = document.querySelector("#filterAlertModalBody")

    recommendation.addEventListener('click', function(){
        $('#filterDataModal').modal('hide')
        $('#filterAlertModal').modal('show')
        filterAlertModalBody.innerHTML = '<div class="alert alert-dark fade show mx-auto my-auto p-2 col-sm-7 col-10" role="alert" style="text-align:center; font-color: black; background-color: #FFAE00"; border: 1px #FFD373>'+
        '<h7>Urutkan Berdasarkan Rekomendasi</h7>'+'</div>';
        closeAlert();
        fetch('/kingice/filter.php?category=' + recommendation.value)
            .then((response) => response.text())
            .then((response) => (listMenu.innerHTML = response));
    })
}

function filterPopular(){
    const popular = document.querySelector('#popular');
    const listMenu = document.querySelector('#listMenu');
    const filterAlertModalBody = document.querySelector("#filterAlertModalBody")

    popular.addEventListener('click', function(){
        $('#filterDataModal').modal('hide')
        $('#filterAlertModal').modal('show')
        filterAlertModalBody.innerHTML = '<div class="alert alert-dark fade show mx-auto my-auto p-2 col-sm-7 col-10" role="alert" style="text-align:center; font-color: black; background-color: #FFAE00"; border: 1px #FFD373>'+
        '<h7>Urutkan Berdasarkan Terpopuler</h7>'+'</div>';
        closeAlert();
        fetch('/kingice/filter.php?category=' + popular.value)
            .then((response) => response.text())
            .then((response) => (listMenu.innerHTML = response));
    })
}

function filterLowestPrice(){
    const lowestprice = document.querySelector('#lowestprice')
    const listMenu = document.querySelector('#listMenu');
    const filterAlertModalBody = document.querySelector("#filterAlertModalBody")

    lowestprice.addEventListener('click', function(){
        $('#filterDataModal').modal('hide')
        $('#filterAlertModal').modal('show')
        filterAlertModalBody.innerHTML = '<div class="alert alert-dark fade show mx-auto my-auto p-2 col-sm-8 col-10" role="alert" style="text-align:center; font-color: black; background-color: #FFAE00"; border: 1px #FFD373>'+
        '<h7>Urutkan Berdasarkan Harga Terendah</h7>'+'</div>';
        closeAlert();
        fetch('/kingice/filter.php?category=' + lowestprice.value)
            .then((response) => response.text())
            .then((response) => (listMenu.innerHTML = response));
    })
}

function filterHighestPrice(){
    const highestprice = document.querySelector('#highestprice');
    const listMenu = document.querySelector('#listMenu');
    const filterAlertModalBody = document.querySelector("#filterAlertModalBody")

    highestprice.addEventListener('click', function(){
        $('#filterDataModal').modal('hide')
        $('#filterAlertModal').modal('show')
        filterAlertModalBody.innerHTML = '<div class="alert alert-dark fade show mx-auto my-auto p-2 col-sm-8 col-10" role="alert" style="text-align:center; font-color: black; background-color: #FFAE00"; border: 1px #FFD373>'+
        '<h7>Urutkan Berdasarkan Harga Tertinggi</h7>'+'</div>';
        closeAlert();
        fetch('/kingice/filter.php?category=' + highestprice.value)
            .then((response) => response.text())
            .then((response) => (listMenu.innerHTML = response));
    })
}

//autoFocusText
function autoFocusSearch(){
    var searchMenuModal = document.getElementById('searchMenuModal')
    var search = document.getElementById('keyword')

    searchMenuModal.addEventListener('shown.bs.modal', function () {
    search.focus()
    })

}
function autoFocusFeedback(){
    var feedBackform = document.getElementById('feedbackFormModal')

    feedBackform.addEventListener('shown.bs.modal', function () {
        document.getElementById('areaCritics').focus();
    })

}

//reset
function clearSearch(){
    var searchMenu = document.getElementById('searchMenuModal')

    searchMenu.addEventListener('hidden.bs.modal', function () {
        document.getElementById('search-box').reset();
        document.getElementById('searchResult').innerHTML = "";
})

}

function clearFeedbackForm(){
    var feedbackformModal = document.getElementById('feedbackFormModal')

    feedbackformModal.addEventListener('hidden.bs.modal', function () {
        document.getElementById('feedbackForm').reset();
    }) 
}

//call function

//autofocus
autoFocusSearch();
autoFocusFeedback();

//clear
clearFeedbackForm();
clearSearch();

//AJAX
liveSearch();
showAll();
filterRecommendation();
filterPopular();
filterLowestPrice();
filterHighestPrice();