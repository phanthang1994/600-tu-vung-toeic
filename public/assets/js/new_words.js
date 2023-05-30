let slideMinus = 0;
let valuePercent = 0;
let displayMinusIndex = 0;
let text = '{"vocab":[' +
    '{"src":"assets/img/event/event-1.jpg","newWords":"abide by 1 : /ə baid baid/","attributes":"P,V,N","meaningWords":"Tuân Thủ","exp":"The two parties abided by the judge decision","expMeaning":"- Hai bên đã tuân theo quyết định của tòa án.","audioSRC":"h1.mp3","daThuoc":"0","tuKho":"0"},' +
    '{"src":"assets/img/event/event-2.jpg","newWords":"abide by 2 : /ə baid baid/","attributes":"P,V,N","meaningWords":"Tuân Thủ","exp":"The two parties abided by the judge decision","expMeaning":"- Hai bên đã tuân theo quyết định của tòa án.","audioSRC":"h2.mp3","daThuoc":"0","tuKho":"0"},' +
    '{"src":"assets/img/event/event-3.jpg","newWords":"abide by 3 : /ə baid baid/","attributes":"P,V,N","meaningWords":"Tuân Thủ","exp":"The two parties abided by the judge decision","expMeaning":"- Hai bên đã tuân theo quyết định của tòa án.","audioSRC":"h3.mp3","daThuoc":"0","tuKho":"0"},' +
    '{"src":"assets/img/event/event-4.jpg","newWords":"abide by 4 : /ə baid baid/","attributes":"P,V,N","meaningWords":"Tuân Thủ","exp":"The two parties abided by the judge decision","expMeaning":"- Hai bên đã tuân theo quyết định của tòa án.","audioSRC":"h1.mp3","daThuoc":"0","tuKho":"0"},' +
    '{"src":"assets/img/event/event-5.jpg","newWords":"abide by 5 : /ə baid baid/","attributes":"P,V,N","meaningWords":"Tuân Thủ","exp":"The two parties abided by the judge decision","expMeaning":"- Hai bên đã tuân theo quyết định của tòa án.","audioSRC":"h1.mp3","daThuoc":"0","tuKho":"0"}]}';
const obj = JSON.parse(text);
const obj2 = {};
var xhr = new XMLHttpRequest();
url="/new_words/110"

xhr.open("GET", url, true); // Replace with your API endpoint
xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
        obj2.vocab = JSON.parse(xhr.responseText); // Assign the response to the "vocab" property of the "obj" object
        txtx = JSON.stringify(obj2); // Convert the "obj" object back to a JSON string
    }
};
xhr.send();
obj3 = obj2
console.log( JSON.stringify(obj2)); // Print the updated JSON string


document.querySelector('.xemTiep').style.display='none'
/*nút tiếp kiểu mới*/
newWordTh = 0
document.querySelector('.imagNewWords').src = obj2.vocab[newWordTh].src
document.querySelector('.newWords').innerHTML = obj2.vocab[newWordTh].newWords;
document.getElementById("myAudio").setAttribute('src', obj.vocab[newWordTh].audioSRC);
document.querySelectorAll('.tiep').forEach(item => {
    item.addEventListener('click', event => {
        document.getElementsByClassName('previousBtn')[0].disabled=false;
        if(slideMinus)
        {
            slideMinus--;
            displayMinusIndex++
            console.log(displayMinusIndex);
            document.querySelector('.imagNewWords').src = obj.vocab[displayMinusIndex].src;
            document.querySelector('.newWords').innerHTML = obj.vocab[displayMinusIndex].newWords;
            document.getElementById("myAudio").setAttribute('src', obj.vocab[displayMinusIndex].audioSRC);
            return;
        }
        newWordTh++;
        console.log(newWordTh)
        if (newWordTh < Object.keys(obj.vocab).length) {
            if (slideMinus===0)
            {
                document.querySelector('.imagNewWords').src = obj.vocab[newWordTh].src;
                document.querySelector('.newWords').innerHTML = obj.vocab[newWordTh].newWords;
                document.getElementById("myAudio").setAttribute('src', obj.vocab[newWordTh].audioSRC);
                increaseNumber();
            }
        }
        else {
            increaseNumber();
            lastestSlide();
        }

    })
})

// nút xem tiếp
document.querySelectorAll('.xemTiep').forEach(item => {
    item.addEventListener('click', event => {
        document.getElementsByClassName('previousBtn')[0].disabled=false;
        if(slideMinus)
        {
            slideMinus--;
            displayMinusIndex++
            console.log(displayMinusIndex);
            document.querySelector('.imagNewWords').src = obj.vocab[displayMinusIndex].src;
            document.querySelector('.newWords').innerHTML = obj.vocab[displayMinusIndex].newWords;
            document.getElementById("myAudio").setAttribute('src', obj.vocab[displayMinusIndex].audioSRC);
            return;
        }
        newWordTh++;
        console.log(newWordTh)
        if (newWordTh < Object.keys(obj.vocab).length) {
            if (slideMinus===0)
            {
                document.querySelector('.imagNewWords').src = obj.vocab[newWordTh].src;
                document.querySelector('.newWords').innerHTML = obj.vocab[newWordTh].newWords;
                document.getElementById("myAudio").setAttribute('src', obj.vocab[newWordTh].audioSRC);

            }
        }
        else{
            lastestSlide();
        }

    })
})

// chuyển slide
function plusSlides() { // dùng cho web
    slideMinus++;
    console.log(slideMinus)
    displayMinusIndex = newWordTh-slideMinus
    document.querySelector('.imagNewWords').src = obj.vocab[displayMinusIndex].src;
    document.querySelector('.newWords').innerHTML = obj.vocab[displayMinusIndex].newWords;
    document.getElementById("myAudio").setAttribute('src', obj.vocab[displayMinusIndex].audioSRC);
    if(displayMinusIndex===0)
    {
        document.getElementsByClassName('previousBtn')[0].disabled=true;
    }

}
function plusSlidesMobile() { // dùng cho mobile
    if (newWordTh===0)
    {
        document.getElementsByClassName('previousBtn')[1].disabled=true;
        return;
    }
    slideMinus++;
    console.log(slideMinus)
    displayMinusIndex = newWordTh-slideMinus
    document.querySelector('.imagNewWords').src = obj.vocab[displayMinusIndex].src;
    document.querySelector('.newWords').innerHTML = obj.vocab[displayMinusIndex].newWords;
    document.getElementById("myAudio").setAttribute('src', obj.vocab[displayMinusIndex].audioSRC);

    document.getElementsByClassName('previousBtn')[1].disabled = displayMinusIndex === 0;

}

/*viết cho button chế từ*/
var acc = document.getElementsByClassName("buttonCheTu");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}

// viết cho  button close chế từ
var acc = document.getElementsByClassName("closeButtonCheTu");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        var parent = this.parentElement.parentElement.parentElement;
        parent.style.display = 'none';
    });
}

// viết cho close button
function disabledCloseButton() {
    document.querySelector(".tiep").style.display ='none';
    document.querySelector("#buttonTiepMobile").style.display='none';
    document.querySelector('.xemTiep').style.display='inline-block'
    const list =document.querySelector('.xemTiepMobile').classList;
    list.remove('xemTiepDeActive')
    list.add('xemTiepActive')
    return "0"
}
function closeButton() {
    document.getElementById('id01').style.display = 'none';
    disabledCloseButton();
}

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target === modal) {
        modal.style.display = "none";
        disabledCloseButton();
    }
}
// viết cho Học tiếp từ mới, học lại, ôn tập, kiểm tra
actionEnd = document.getElementsByClassName('actionEnd')
actionEnd[0].addEventListener('click', function () {
    location.reload();
}, false)
actionEnd[1].addEventListener('click', function () {
    alert('Ôn tập')
}, false);
actionEnd[1].addEventListener('click', function () {
    alert('Kiểm tra')
}, false);

// popup khi hết từ
function lastestSlide() {
    document.getElementById('id01').style.display = 'block';
    newWordTh--;
}

//audio
var play_audio = document.getElementById('myAudio')
function playAudio() {
    play_audio.pause();
    play_audio.load();
    play_audio.play();
}
// tăng phần trăm và prosgress bar
function increaseNumber() {
    percent = 100/(Object.keys(obj.vocab).length); //tùy thuộc vào số từ của 1 phiên để chia độ rộng
    const boxPercent = document.getElementsByClassName("boxPercent");
    var elemBar = document.getElementById("bar");
    if (valuePercent === 10) {
        valuePercent = 0;
    }
    else {
        valuePercent++;
    }
    for (a = 0; a < boxPercent.length; a++) {
        boxPercent[a].innerHTML = ' '+ valuePercent + ' ';
        width = valuePercent * percent; // tùy thuộc vào số từ của 1 phiên để chia độ rộng
        elemBar.style.width = width + "%";
    }

}


