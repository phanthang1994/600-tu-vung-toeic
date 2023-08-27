
url="/new_words/4"
const url2 = window.location.href;
console.log(url2)
fetch(url)
    .then(response => response.json())
    .then(data => {
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
        document.querySelector('.xemTiep').style.display='none'
        /*nút tiếp kiểu mới*/
        let newWordTh = 0
        document.querySelector('.imagNewWords').src = data[newWordTh].image
        document.querySelector('.newWords').innerHTML = obj.vocab[newWordTh].newWords;
        document.getElementById("myAudio").setAttribute('src', obj.vocab[newWordTh].audioSRC);
        document.querySelectorAll('.tiep').forEach(item => {
            item.addEventListener('click', event => {
                document.getElementsByClassName('previousBtn')[0].disabled=false;
                if(slideMinus!==0)
                {
                    slideMinus--;
                    displayMinusIndex++
                    console.log(displayMinusIndex);
                    document.querySelector('.imagNewWords').src = data[displayMinusIndex].image;
                    document.querySelector('.newWords').innerHTML = obj.vocab[displayMinusIndex].newWords;
                    document.getElementById("myAudio").setAttribute('src', obj.vocab[displayMinusIndex].audioSRC);
                    return;
                }
                newWordTh++;
                console.log(newWordTh)
                if (parseInt(newWordTh) < parseInt(data.length)) {
                    if (slideMinus===0)
                    {
                        document.querySelector('.imagNewWords').src = data[newWordTh].image;
                        document.querySelector('.newWords').innerHTML = obj.vocab[newWordTh].newWords;
                        document.getElementById("myAudio").setAttribute('src', obj.vocab[newWordTh].audioSRC);
                        increaseNumber();
                    }
                }
                else if (parseInt(newWordTh) === parseInt(data.length))
                {
                    increaseNumber();
                }
                else {

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
                    document.querySelector('.imagNewWords').src = data[displayMinusIndex].image;
                    document.querySelector('.newWords').innerHTML = obj.vocab[displayMinusIndex].newWords;
                    document.getElementById("myAudio").setAttribute('src', obj.vocab[displayMinusIndex].audioSRC);
                    return;
                }
                newWordTh++;
                console.log(newWordTh)
                if (parseInt(newWordTh) < parseInt(data.length)) {
                    if (slideMinus===0)
                    {
                        document.querySelector('.imagNewWords').src = data[newWordTh].image;
                        document.querySelector('.newWords').innerHTML = obj.vocab[newWordTh].newWords;
                        document.getElementById("myAudio").setAttribute('src', obj.vocab[newWordTh].audioSRC);

                    }
                }
                else{
                    lastestSlide();
                }

            })
        })
        const previousBtnWEB = document.querySelectorAll('.previousBtnWeb');
        const previousBtnMobile = document.querySelectorAll('.previousBtnMobile');
        previousBtnWEB.forEach((btn) => {
            btn.addEventListener('click', plusSlides);
        });
        previousBtnMobile.forEach((btn) => {
            btn.addEventListener('click', plusSlidesMobile);
        });
    // chuyển slide
        function plusSlides() { // dùng cho web
            slideMinus++;
            console.log(slideMinus)
            displayMinusIndex = newWordTh-slideMinus
            document.querySelector('.imagNewWords').src =data[0].image;
            document.querySelector('.newWords').innerHTML = obj.vocab[displayMinusIndex].newWords;
            document.getElementById("myAudio").setAttribute('src', obj.vocab[displayMinusIndex].audioSRC);
            if(displayMinusIndex===0)
            {
                document.getElementsByClassName('previousBtnWeb')[0].disabled=true;
            }

        }
        function plusSlidesMobile() { // dùng cho mobile
            if (newWordTh===0)
            {
                document.getElementsByClassName('previousBtnMobile')[0].disabled=true;
            }
            slideMinus++;
            console.log(slideMinus)
            displayMinusIndex = newWordTh-slideMinus
            document.querySelector('.imagNewWords').src = data[0].image;
            document.querySelector('.newWords').innerHTML = obj.vocab[displayMinusIndex].newWords;
            document.getElementById("myAudio").setAttribute('src', obj.vocab[displayMinusIndex].audioSRC);

            document.getElementsByClassName('previousBtn')[1].disabled = displayMinusIndex === 0;

        }

//*viết cho button chế từ*
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



//audio
        var play_audio = document.getElementById('myAudio')
        function playAudio() {
            play_audio.pause();
            play_audio.load();
            play_audio.play();
        }
// tăng phần trăm và prosgress bar
        function increaseNumber() {
            percent = 100/(data.length); //tùy thuộc vào số từ của 1 phiên để chia độ rộng
            const boxPercent = document.getElementsByClassName("boxPercent");
            var elemBar = document.getElementById("bar");
            if (valuePercent === data.length) {
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
        // popup khi hết từ
        function lastestSlide() {
            document.getElementById('id01').style.display = 'block';
            newWordTh--;
        }

    })
    .catch(error => {
        console.error(error);
    });



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
// actionEnd[1].addEventListener('click', function () {
//     alert('Ôn tập')
// }, false);
actionEnd[1].addEventListener('click', function () {
    alert('Kiểm tra')
}, false);


