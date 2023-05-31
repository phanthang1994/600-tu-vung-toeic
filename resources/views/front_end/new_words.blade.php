<x-HeadComponent css="home_header.css"></x-HeadComponent>
<x-HeadComponent css="new_words.css"></x-HeadComponent>
<body style="background-color:#FCFAF2;">
@include('front_end.layouts.header')

<!-- thoát về trang chủ -->
<div class="" style="background-color:#74D8C1">
    <div class="container" style="display:flex; padding:10px;justify-content: space-between;">
        <h3>
            <a href="#">Tiếng Anh (600 từ toeic)</a>
            . Hợp Đồng (agreement).
        </h3>
        <a
            href="#">

            <i class="fa fa-close fa-2x "
               style="align-self: center; margin-top: 5px; padding-bottom: 0; padding-top: 0; cursor: pointer;">
            </i>
        </a>
    </div>
</div>
<!-- phần body -->
<div class="container event-area pb-15" id="changeContainerToContainerFluid"
     style="padding-top: 2%; max-width: 1024px;">
    <div class="row">
        <!-- thanh progress ảnh và nội dung dùng chung-->
        <div class="col-lg-10 one">
            <!-- thanh progess dùng chung -->
            <div class="container-fluid">
                <div class="honey-bee">
                    <div class="row">
                        <div class="col-lg-12 col-8" style="padding-right: 0;">
                            <div id="progress">
                                <div class="bar" id="bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ảnh và nội dung dùng chung cái được đưa vào slide-->
            <div class="container-fluid pt-2 provideNewWords-active mySlides" id="provideNewWords_1">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="single-event mb-55 event-gray-bg">
                            <div class="event-img">
                                <div href="event-details.html">
                                    <img style="max-width: 348px;height: 289px;border-radius: 2rem;" src="" alt=""
                                         class="imagNewWords">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="row">
                            <div class="text_right boder3D">
                                <label class="dXQZrX">Tiếng anh</label>
                                <h2 class="jPETsr newWords"></h2>
                                <label class="dXQZrX" style="margin-top: 10px;">Từ loại: <span
                                        class="attributes"></span></label>
                                <h3 class="jDSKR meaningWords" style="margin-bottom: 10px;"></h3>
                            </div>
                        </div>
                        <div class="row"
                             style="text-align: left; border-bottom:#030303 solid 4px; margin-top: 5px;">
                            <p style=" color: black;">
                                    <span style="text-decoration: line-through;">
                                        Ví dụ:
                                    </span>
                                <span class="exp">

                                    </span> <br>
                                <span style="padding-left: 2rem;">
                                        <spans tyle="padding-left: 1rem;" class="expMeaning"></spans>
                                    </span>
                            </p>
                        </div>
                        <div class="row text_right flexCustom">
                            <audio id="myAudio">
                                <source src="" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                            <button class="displayButtonAccordion button_play_audio" id="1" onclick="playAudio()"
                                    type="button">Nghe<i class="fa fa-bullhorn fa-2x" aria-hidden="true"></i></button>
                            <div>
                                <button class="displayButtonAccordion buttonCheTu">Chế từ và cấu trúc</button>
                                <div id="closeButtonCheTu01" class="modal">
                                    <div class="modal-content animate">
                                        <div class="">
                                            <span class="closeButtonCheTu">&times;</span>
                                        </div>
                                        <div class="cheTu">
                                            <div>
                                                <h3 class="" style="border-bottom:black solid 3px">
                                                    Chế từ
                                                </h3>
                                                <div id="che_tu">

                                                </div>
                                            </div>
                                            <button type="button" class="cheTuVaCauTruc" data-toggle="modal"
                                                    data-target="#exampleModalCenter">
                                                <div id="tron_ngon_ngu">Trộn ngôn ngữ</div>
                                            </button>
                                        </div>
                                        <div class="cheTu">
                                            <div>
                                                <h3 class="" style="border-bottom:black solid 3px">
                                                    Cấu trúc câu
                                                </h3>
                                                <div id="cau_truc_cau">

                                                </div>
                                            </div>
                                            <button type="button" class="cheTuVaCauTruc" data-toggle="modal"
                                                    data-target="#exampleModalCenter">
                                                <div>Ngữ Pháp Hay</div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- nút điều hướng web, nút tiếp web, thanh phần trăm web-->
        <div id="mobileHiddenWeb" class="col-lg-2 two box-right" style="text-align: center">
            <!-- thanh phần trăm -->
            <div class="box mobileHiddenWebDisplay">
                <div class="mobileHiddenWebRemove boxPercent" value="0" style="width:90px;">
                    0
                </div>
            </div>
            <!-- nút tiếp web -->
            <button id="button" class="btn boder3D tiep"
                    style="width: 86px;margin-top: 5px;min-height: 112px; padding-top: 16px;padding-bottom: 16px;padding-right: 8px;padding-left: 8px;height: 114px;background-color: yellow;">
                <i class="fa fa-forward fa-4x" style="position: relative; bottom: 8px;"></i>
                <p class="" style="position: relative; bottom: 8px;">Tiếp</p>
            </button>
            <!-- nút xem tiếp web -->
            <button id="xemTiepWeb" class="btn boder3D xemTiep"
                    style="width: 86px;margin-top: 5px;min-height: 112px; padding-top: 16px;padding-bottom: 16px;padding-right: 8px;padding-left: 8px;height: 114px;background-color: yellow;">
                <i class="fa fa-forward fa-4x" style="position: relative; bottom: 8px;"></i>
                <p class="" style="position: relative; bottom: 8px;"></p>
            </button>
            <button  class="previousBtn previousBtnWeb btnSmallThan991px btn  btnBiggerThan991px"
                     style="margin-top: 5px; border-radius:100%;  background-color: yellow;"  disabled>
                <i class="fa fa-backward fa-2x"></i>
            </button>

        </div>
        <!-- thanh điều hướng mobile -->
        <div class="col-lg-1 col-4" id="progressMobile">
            <div class="row ">
                <div class="box progressMobileDisplay">
                    <div class="progressMobileHidden boxPercent" id="" value="0" style="width:auto;">
                        0%</div>
                </div>

            </div>
        </div>

        <button  class="previousBtn previousBtnMobile nextButtonMobile boder3D">
            <i class="fa fa-backward fa-3x"></i>
        </button>
        <!-- nút next mobile -->
        <button id="buttonTiepMobile" class="nextButtonMobile boder3D tiep">
            <i class="fa fa-forward fa-3x"></i>
            <p class="nextButton">Tiếp</p>
        </button>
        <!--        xem tiếp mobile-->
        <button id="xemTiepMobile" class="nextButtonMobile boder3D xemTiep xemTiepMobile xemTiepDeActive">
            <i class="fa fa-forward fa-3x" ></i>
            <p class="nextButton">Tiếp</p>
        </button>
    </div>
</div>
<!-- Newsletter Popup Start -->
<div id="id01" class="modal">
    <div class="modal-content animate">
        <div class="imgcontainer">
            <span onclick="closeButton()" class="close" title="Close Modal">&times;</span>
        </div>
        <div class="chosingButton">
            <button type="button" class="continueStudying" data-toggle="modal" data-target="#exampleModalCenter">
                <img src="seed (64).png" style="height:4rem;" alt="" srcset="">
                <div> Học tiếp từ mới</div>
            </button>
            <div class="outlineDot">
                <div class="actionEnd">
                    <div class="dot"><img src="fertilize (64).png" style="width: 72%;" alt="" srcset=""></div>
                    <p>Học lại</p>
                </div>
                <div class="actionEnd">
                    <div class="dot"><img src="watering-can (64).png" style="width: 72%;" alt="" srcset=""></div>
                    <p>Ôn tập</p>
                </div>
                <div class="actionEnd">
                    <div class="dot"><img src="test (64).png" style="width: 72%;" alt="" srcset=""></div>
                    <p>Kiểm tra</p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('front_end.layouts.footer')
<script >
    const get_chu_de_id = window.location.href;

    // Extract the ID from the URL using regular expression
    const regex = /\/(\d+)$/; // Assuming the ID is at the end of the URL
    const matches = get_chu_de_id.match(regex);

    // Check if there is a match

    const id = matches[1];
    url="/new_words/"+id

    fetch(url)
        .then(response => response.json())
        .then(data => {
            let slideMinus = 0;
            let valuePercent = 0;
            let displayMinusIndex = 0;
            document.querySelector('.xemTiep').style.display='none'
            /*nút tiếp kiểu mới*/
            let newWordTh = 0
            document.querySelector('.imagNewWords').src = data[newWordTh].image
            document.querySelector('.newWords').innerHTML = data[newWordTh].name;
            document.getElementById("myAudio").setAttribute('src', data[newWordTh].audio);
            const divElement = document.getElementById('che_tu');
            divElement.innerHTML = 'Your string goes here';
            document.querySelectorAll('.tiep').forEach(item => {
                item.addEventListener('click', event => {
                    document.getElementsByClassName('previousBtn')[0].disabled=false;
                    if(slideMinus!==0)
                    {
                        slideMinus--;
                        displayMinusIndex++
                        console.log(displayMinusIndex);
                        document.querySelector('.imagNewWords').src = data[displayMinusIndex].image;
                        document.querySelector('.newWords').innerHTML = data[displayMinusIndex].nackCount;
                        document.getElementById("myAudio").setAttribute('src', data[displayMinusIndex].audio);
                        return;
                    }
                    newWordTh++;
                    console.log(newWordTh)
                    if (parseInt(newWordTh) < parseInt(data.length)) {
                        if (slideMinus===0)
                        {
                            document.querySelector('.imagNewWords').src = data[newWordTh].image;
                            document.querySelector('.newWords').innerHTML = data[newWordTh].name;
                            document.getElementById("myAudio").setAttribute('src', data[newWordTh].audio);
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
                        document.querySelector('.imagNewWords').src = data[displayMinusIndex].image;
                        document.querySelector('.newWords').innerHTML = data[displayMinusIndex].name;
                        document.getElementById("myAudio").setAttribute('src', data[displayMinusIndex].audio);
                        return;
                    }
                    newWordTh++;
                    console.log(newWordTh)
                    if (parseInt(newWordTh) < parseInt(data.length)) {
                        if (slideMinus===0)
                        {
                            document.querySelector('.imagNewWords').src = data[newWordTh].image;
                            document.querySelector('.newWords').innerHTML = data[newWordTh].name;
                            document.getElementById("myAudio").setAttribute('src', data[newWordTh].audio);

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
                document.querySelector('.imagNewWords').src =data[displayMinusIndex].image;
                document.querySelector('.newWords').innerHTML = data[displayMinusIndex].name;
                document.getElementById("myAudio").setAttribute('src', data[displayMinusIndex].audio);
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
                document.querySelector('.imagNewWords').src = data[displayMinusIndex].image;
                document.querySelector('.newWords').innerHTML = data[displayMinusIndex].name;
                document.getElementById("myAudio").setAttribute('src', data[displayMinusIndex].audio);

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
    actionEnd[1].addEventListener('click', function () {
        alert('Ôn tập')
    }, false);
    actionEnd[1].addEventListener('click', function () {
        alert('Kiểm tra')
    }, false);
</script>

</body>

</html>
