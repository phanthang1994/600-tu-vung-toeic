<x-HeadComponent css="home_header.css"></x-HeadComponent>
<x-HeadComponent css="new_words.css"></x-HeadComponent>
<body style="background-color:#FCFAF2;">
@include('front_end.layouts.header')

<!-- thoát về trang chủ -->
<div class="" style="background-color:#74D8C1">
    <div class="container" style="display:flex; padding:10px;justify-content: space-between;">
        <h3>
            @if(count($new_word)!=0)
            <span style="color: orangered">{{$new_word[0]->chu_de_name}}</span>
            .{{$new_word[0]->chu_de_description}}
            @else
                <a
                    href="{{route('home')}}" id = "go_back_home">
                    600tutoeic.com
                </a>
            @endif
        </h3>
        <a
            href="{{route('home')}}" id = "go_back_home">

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
                                         id="imagNewWords">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="row">
                            <div class="text_right boder3D">
                                <h2 class="jPETsr newWords" style="padding-top: 0;">
                                </h2>
                                <span style="margin-top: 10px; color: #0b0b0b;font-weight: bolder;">
                                    Giải thích:
                                </span>
                                <span id="str_giai_thich" style="color: darkblue">

                                </span>
                                <label class="dXQZrX" style="margin-top: 10px;">
                                    Từ loại:
                                    <span class="attributes" id="tu_loai">

                                    </span>
                                </label>
                                <h3 class="jDSKR meaningWords" style="margin-bottom: 10px;"></h3>
                            </div>
                        </div>
                        <div class="row"
                             style="text-align: left; border-bottom:#030303 solid 4px; margin-top: 5px;">
                            <p style=" color: black;">
                                    <span style="text-decoration: line-through;">
                                        Ví dụ:
                                    </span>
                                <span class="exp" id="str_vi_du">

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
                                            <button id="cheTuButton" type="button" class="cheTuVaCauTruc" data-toggle="modal" data-target="#exampleModalCenter">
                                                <div id="tron_ngon_ngu">Trộn ngôn ngữ</div>
                                            </button>
                                        </div>
                                        <div class="cheTu">
                                            <div>
                                                <h3 class="" style="border-bottom:black solid 3px">
                                                    Cấu trúc câu
                                                </h3>
                                                <div id="str_cau_truc_cau">

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
    <div class="row" >
        <div class="video-container">
            <iframe width="500" height="320" src="https://www.youtube.com/embed/W5_MaR6cSEg" title="600 Từ vựng luyện thi TOEIC (Phụ đề+ Hình Ảnh) Part 1/50: Hợp Đồng" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
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
                <div class="dot"><i class="fa fa-arrow-circle-right fa-3x" aria-hidden="true" style="color: #e21f1f;"></i></div>
                                    <p>Next</p>
            </button>
            <div class="outlineDot">
                <div class="actionEnd" style="cursor: pointer">
                    <div class="dot"><i class="fa fa-repeat fa-3x "  aria-hidden="true" style="color: #e21f1f;"></i></div>
                    <p>Học lại</p>
                </div>
{{--                <div class="actionEnd" style="cursor: pointer">--}}
{{--                    <div class="dot"><i class="fa fa-arrow-circle-right fa-3x" aria-hidden="true" style="color: #e21f1f;"></i></div>--}}
{{--                    <p>Ôn tập</p>--}}
{{--                </div>--}}
                <div class="actionEnd" style="cursor: pointer">
                    <div class="dot"><i class="fa fa-check-square-o fa-3x" aria-hidden="true" style="color: #e21f1f;"></i></div>
                    <p>Kiểm tra</p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('front_end.layouts.footer')
<script >

    const data = @json($new_word);
    const get_chu_de_id = window.location.href;
    const url = new URL(get_chu_de_id);
    const baseUrl = `${url.protocol}//${url.host}`+"/";
    const path = url.pathname;
    const parts = path.split('/');
    const ids = parts[parts.length - 1];

    console.log(ids); // This will log "109"
    // Check if there is a match
    let slideMinus = 0;
    let valuePercent = 0;
    let displayMinusIndex = 0;
    document.querySelector('.xemTiep').style.display='none'
    /*nút tiếp kiểu mới*/
    let newWordTh = 0
    const urle = new URL(document.querySelector('#imagNewWords').src);

    document.querySelector('#imagNewWords').src = baseUrl+ data[newWordTh].image
    const heading = document.querySelector('.newWords');
    heading.innerHTML = data[newWordTh].name
    const span = document.createElement("span");
    span.style.color = "red";
    span.textContent = data[newWordTh].phien_am;
    heading.appendChild(span);

    document.getElementById("myAudio").setAttribute('src', baseUrl+data[newWordTh].audio);

    const che_tu_element = document.getElementById('che_tu');
    che_tu_element.innerHTML = data[newWordTh].che_tu;

    const tu_loai_element = document.getElementById('tu_loai');
    tu_loai_element.innerHTML = data[newWordTh].tu_loai;

    const vi_du_element = document.getElementById('str_vi_du');
    vi_du_element.innerHTML=data[newWordTh].vi_du

    const giai_thich_element = document.getElementById('str_giai_thich');
    giai_thich_element.innerHTML=data[newWordTh].vi_du
    const cau_truc_cau_element = document.getElementById('str_cau_truc_cau');
    cau_truc_cau_element.innerHTML=data[newWordTh].cau_truc_cau



    document.querySelectorAll('.tiep').forEach(item => {
        item.addEventListener('click', event => {
            document.getElementsByClassName('previousBtn')[0].disabled=false;
            if(slideMinus!==0)
            {
                slideMinus--;
                displayMinusIndex++
                // console.log(displayMinusIndex);
                document.querySelector('#imagNewWords').src =  baseUrl+data[displayMinusIndex].image;
                document.querySelector('.newWords').innerHTML = data[displayMinusIndex].nackCount;
                document.getElementById("myAudio").setAttribute('src',  baseUrl+data[displayMinusIndex].audio);
                che_tu_element.innerHTML = data[displayMinusIndex].che_tu
                tu_loai_element.innerHTML = data[displayMinusIndex].tu_loai;
                vi_du_element.innerHTML=data[displayMinusIndex].vi_du
                giai_thich_element.innerHTML=data[displayMinusIndex].vi_du
                cau_truc_cau_element.innerHTML=data[displayMinusIndex].cau_truc_cau

                return;
            }
            newWordTh++;
            // console.log(newWordTh)
            if (parseInt(newWordTh) < parseInt(data.length)) {
                if (slideMinus===0)
                {
                    document.querySelector('#imagNewWords').src =  baseUrl+data[newWordTh].image;

                    heading.innerHTML = data[newWordTh].name
                    span.textContent = data[newWordTh].phien_am;
                    heading.appendChild(span);

                    document.getElementById("myAudio").setAttribute('src',  baseUrl+data[newWordTh].audio);

                    che_tu_element.innerHTML = data[newWordTh].che_tu

                    tu_loai_element.innerHTML = data[newWordTh].tu_loai;

                    vi_du_element.innerHTML=data[newWordTh].vi_du
                    giai_thich_element.innerHTML=data[newWordTh].vi_du
                    cau_truc_cau_element.innerHTML=data[newWordTh].cau_truc_cau


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
                // console.log(displayMinusIndex);
                document.querySelector('#imagNewWords').src =  baseUrl+data[displayMinusIndex].image;

                heading.innerHTML = data[displayMinusIndex].name
                span.textContent = data[displayMinusIndex].phien_am;
                heading.appendChild(span);

                document.getElementById("myAudio").setAttribute('src',  baseUrl+data[displayMinusIndex].audio);
                che_tu_element.innerHTML = data[displayMinusIndex].che_tu
                tu_loai_element.innerHTML = data[displayMinusIndex].tu_loai;
                vi_du_element.innerHTML=data[displayMinusIndex].vi_du
                giai_thich_element.innerHTML=data[displayMinusIndex].vi_du
                cau_truc_cau_element.innerHTML=data[displayMinusIndex].cau_truc_cau

                return;
            }
            newWordTh++;
            // console.log(newWordTh)
            if (parseInt(newWordTh) < parseInt(data.length)) {
                if (slideMinus===0)
                {
                    document.querySelector('#imagNewWords').src =  baseUrl+data[newWordTh].image;

                    heading.innerHTML = data[newWordTh].name
                    span.textContent = data[newWordTh].phien_am;
                    heading.appendChild(span);

                    document.getElementById("myAudio").setAttribute('src',  baseUrl+data[newWordTh].audio);
                    che_tu_element.innerHTML = data[newWordTh].che_tu
                    tu_loai_element.innerHTML = data[newWordTh].tu_loai;
                    vi_du_element.innerHTML=data[newWordTh].vi_du
                    giai_thich_element.innerHTML=data[newWordTh].vi_du
                    cau_truc_cau_element.innerHTML=data[newWordTh].cau_truc_cau

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
        // console.log(slideMinus)
        displayMinusIndex = newWordTh-slideMinus
        document.querySelector('#imagNewWords').src = baseUrl+data[displayMinusIndex].image;
        heading.innerHTML = data[displayMinusIndex].name
        span.textContent = data[displayMinusIndex].phien_am;
        heading.appendChild(span);
        document.getElementById("myAudio").setAttribute('src',  baseUrl+data[displayMinusIndex].audio);
        che_tu_element.innerHTML = data[displayMinusIndex].che_tu
        tu_loai_element.innerHTML = data[displayMinusIndex].tu_loai;
        vi_du_element.innerHTML=data[displayMinusIndex].vi_du
        giai_thich_element.innerHTML=data[displayMinusIndex].vi_du
        cau_truc_cau_element.innerHTML=data[displayMinusIndex].cau_truc_cau

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
        // console.log(slideMinus)
        displayMinusIndex = newWordTh-slideMinus
        document.querySelector('#imagNewWords').src =  baseUrl+data[displayMinusIndex].image;
        heading.innerHTML = data[displayMinusIndex].name
        span.textContent = data[displayMinusIndex].phien_am;
        heading.appendChild(span);
        document.getElementById("myAudio").setAttribute('src',  baseUrl+data[displayMinusIndex].audio);
        che_tu_element.innerHTML = data[displayMinusIndex].che_tu
        tu_loai_element.innerHTML = data[displayMinusIndex].tu_loai;
        vi_du_element.innerHTML=data[displayMinusIndex].vi_du
        giai_thich_element.innerHTML=data[displayMinusIndex].vi_du
        cau_truc_cau_element.innerHTML=data[displayMinusIndex].cau_truc_cau


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




    //audio
    var play_audio = document.getElementById('myAudio')
    function playAudio() {
        play_audio.pause();
        play_audio.load();
        play_audio.play();
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
    // actionEnd[1].addEventListener('click', function () {
    //     alert('Ôn tập')
    // }, false);

    actionEnd[1].addEventListener('click', function () {
        window.location.href = `/single_test_type/${ids}`;
    }, false);
    document.getElementById('go_back_home').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default behavior of the link

        // Display the confirmation message
        var confirmed = confirm("Bạn có muốn kết thúc HỌC TỪ MỚI hay không?");

        if (confirmed) {
            window.location.href = this.href; // Go to the specified URL (route)
        }
    });
    const continueButton = document.querySelector('.continueStudying');

    // Add a click event listener to the button
    continueButton.addEventListener('click', function () {
        window.location.href = `/new_words_next/${ids}`;
    });
    document.getElementById('cheTuButton').addEventListener('click', function() {
        window.location.href = "/che_tu_chu_de/" + ids;
    });

</script>

</body>

</html>
