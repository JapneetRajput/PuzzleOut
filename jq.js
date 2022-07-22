$("document").ready(function() {
    var minDate = new Date();

    $("#date_picker1").datepicker({
        showAnim: 'drop',
        numberOfMonth: 1,
        minDate: minDate,
        dateFormat: 'dd/mm/yy',
        onclose: function(selectedDate) {


        }
    });


})

$("document").ready(function() {
    $("#date_picker2").datepicker({
        dateFormat: 'dd/mm/yy'
    });

})

const pluscontbtn = document.querySelector(".pluscontbtn"),
    minuscontbtn = document.querySelector(".minuscontbtn"),
    numonclick = document.querySelector(".numonclick"),
    noOfPages = document.querySelector("#noOfPages"),
numonclick2 = document.querySelector(".numonclick2");
let a = 1;
let aa = 250;
pluscontbtn.addEventListener("click", () => {
    a++; {
        a = (a < 10) ? +a : a;
        numonclick.innerText = a;
    }
    noOfPages.innerText=a;
    // console.log(a);
});
pluscontbtn.addEventListener("click", () => {
    aa = (aa + 250); {
        aa = (aa < 10000) ? +aa : aa;
        numonclick2.innerText = aa;

    }
    console.log(a);
});
minuscontbtn.addEventListener("click", () => {
    if (a > 1) {
        a--;
        a = (a > 10) ? +a : a;
        numonclick.innerText = a;
    }

});
minuscontbtn.addEventListener("click", () => {
    if (aa > 250) {
        aa = (aa - 250);
        aa = (aa > 10000) ? +aa : aa;
        numonclick2.innerText = aa;
    }
});