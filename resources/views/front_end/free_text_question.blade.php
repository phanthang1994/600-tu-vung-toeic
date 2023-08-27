<x-HeadComponent css="all_course.css"></x-HeadComponent>
<x-HeadComponent css="home_header.css"></x-HeadComponent>
<x-HeadComponent css="dien_tu_.css"></x-HeadComponent>
<x-HeadComponent css="new_words.css"></x-HeadComponent>
<x-HeadComponent css="styleQuestion.css"></x-HeadComponent>

<body style="background-color:#FCFAF2;">
@include('front_end.layouts.header')

<!-- thoát về trang chủ -->
<div class="" style="background-color:#74D8C1">
    <div class="container" style="display:flex; padding:10px;justify-content: space-between;">
        <h3>
            <a
                href="{{route('home')}}">
                600tutoeic.com
            </a>

        </h3>
        <a
            href="{{route('home')}}" id = "go_back_home">

            <i class="fa fa-close fa-2x "
               style="align-self: center; margin-top: 5px; padding-bottom: 0; padding-top: 0; cursor: pointer;">
            </i>
        </a>
    </div>
</div>
<div class="all">
    <div class="ad-l ad-l-in-all">
        @include('front_end.layouts.ad_l')
    </div>
    <div class="mainContent classOut">
        <div class="modal-container" id="score-modal">
            <div class="modal-button-container">
                <button  style="background-color: rgb(122, 112, 112);" onclick="closeOptionModal()"><i class="fa fa-times"></i></button>
            </div>
            <div class="modal-content-container">

                <h1 style="margin-left:10px; margin-right:10px;">Congratulations,Quiz Completed.</h1>

                <div class="grade-details">
                    <p>Attempts : <span id="soCauDaHoc"></span></p>
                    <p>Wrong Answers : <span id="wrong-answers"></span></p>
                    <p>Right Answers : <span id="right-answers"></span></p>
                    <p>Grade : <span id="grade-percentage"></span>%</p>
                    <p><span id="remarks"></span></p>
                </div>
                <div class="buttonPopUp" style="display:flex; flex-direction:row; justify-content:space-around;background-color:#F1F1F1; width: 100%;border-top: 5px solid red;  border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;">
                    <div class="actionEnd" >
                        <div class="dot"><i class="fa fa-repeat fa-3x "  aria-hidden="true" style="color: #e21f1f;"></i></div>
                        <p>Test Lại</p>
                    </div>
                    <div class="actionEnd">
                        <div class="dot"><i class="fa fa-arrow-circle-right fa-3x" aria-hidden="true" style="color: #e21f1f;"></i></div>
                        <p>Tiếp Tục</p>
                    </div>
                </div>


            </div>
        </div>
        <div class="signup">
            <div class="signup-classic">
                <div id="scoreQuestion">
                    <p>
                        Score: <span id="scoreGet"></span>
                    </p>
                    <p>
                        Question: <span id="cauThu"></span>\<span id="totalQuestion"></span>
                    </p>
                </div>
                <h2 style="">>><span id="cauHoi"></span><<</h2>
                <div class="blog-img" style="display:flex; justify-content: flex-start; flex-wrap: wrap;">
                    <div><img id="str_image" src="" alt="" style="max-width:100%;"></div>
                    <div class="" style="max-width:500px; margin-left: 10px;">
                        <form class="form">
                            <fieldset class="username">
                                <input type="text" placeholder="" value="" id="dapAn"/>
                                <input type="text" placeholder="" style="display:none" value="" id="dapAnSai"/>
                            </fieldset>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-11 col-sm-12">
                                        <div class="row" style="text-align:center;">
                                            <div class="col-sm-12 goiY">

                                            </div>
                                            <div class="col-sm-12 goiY" id="whiteSpace" >
                                                <button class="btn space_button" onclick="whiteSpace()" type="button">_____</button>
                                                <button class="btn space_button" onclick="backSpace()" type="button"><i class="fa-solid fa-delete-left">Xóa</i></button>
                                            </div>
                                            <div class="col-sm-12 goiY" id="backSpace" >

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-sm-12" id="outMyBTN">
                                        <button type="button" class="btn btnNExt" id="myBtn" onclick="next_Button()"><i
                                                class="fa fa-angle-double-right fa-2x" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ad-r ad-r-in-all">
        @include('front_end.layouts.ad_r')
    </div>
</div>


@include('front_end.layouts.footer')

{{--<script src="assets/alertifyjs/alertify.min.js"></script>--}}
<script src="{{url("admin/js")}}/alertifyjs/alertify.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="{{url("admin/js")}}/alertifyjs/css/alertify.min.css"/>
<link rel="stylesheet" href="{{url("admin/js")}}/alertifyjs/css/themes/default.min.css"/>
<script>
    const get_chu_de_id = window.location.href;
    const url = new URL(get_chu_de_id);
    const baseUrl = `${url.protocol}//${url.host}`;
    const questions = @json($questions);
    // console.log(questions)
    let shuffledQuestions = questions //empty array to hold shuffled selected questions
    indexNumber = 0
    score = 0
    shuffledQuestionsBackUp = questions
    cauHoi = document.getElementById('cauHoi')

    // viết cho phần gợi ý câu hỏi
    dispalySuggession(0)
    function dispalySuggession(orderQuestion) {
        //xóa hêt phần tử hiện tại
        document.querySelector('.goiY').innerHTML=''
        document.getElementById('dapAn').value=''
        cauHoi.innerHTML = shuffledQuestions[orderQuestion].question + ' <span style="color:darkblue ;">' + shuffledQuestions[orderQuestion].phien_am + '</span>';
        document.querySelector('#str_image').src = baseUrl+ shuffledQuestions[orderQuestion].image
        document.getElementById('scoreGet').innerHTML = score
        document.getElementById('cauThu').innerHTML = indexNumber+1
        document.getElementById('totalQuestion').innerHTML = shuffledQuestions.length
        // gen ra phần tử mới
        for (let suggestion of questions[orderQuestion].suggestion) {
            inpuNhap = document.getElementById('dapAn')
            inpuNhap.style.backgroundColor = '#FFFFFF'
            inpuNhap.style.color = 'black'
            inpuNhap.value=''
            document.querySelector('#dapAnSai').style.display = 'none'
            var button_ = document.createElement('button');
            button_.classList.add('btn', 'goiYTu')
            button_.setAttribute('type', 'button')
            if(suggestion===' ')
            {
                button_.classList.add('space_button')
            }
            button_.innerHTML = suggestion
            // get data for input
            button_.onclick = function() {
                currrentValue = inpuNhap.value
                inpuNhap.value = currrentValue + suggestion
            }
            document.querySelector('.goiY').appendChild(button_)
        }
    }
    // viết cho nút cách
    function whiteSpace()
    {
        hien_tai = document.getElementById('dapAn').value
        document.getElementById('dapAn').value=hien_tai+' '
    }
    //viết cho phím xóa trước
    function backSpace()
    {
        var textbox = document.getElementById('dapAn');
        var ss = textbox.selectionStart;
        var se = textbox.selectionEnd;
        var ln  = textbox.value.length;

        var textbefore = textbox.value.substring( 0, ss );    //text in front of selected text
        var textselected = textbox.value.substring( ss, se ); //selected text
        var textafter = textbox.value.substring( se, ln );    //text following selected text

        if(ss===se) // if no text is selected
        {
            textbox.value = textbox.value.substring(0, ss-1 ) + textbox.value.substring(se, ln );
            textbox.focus();
            textbox.selectionStart = ss-1;
            textbox.selectionEnd = ss-1;
        }
        else // if some text is selected
        {
            textbox.value = textbefore + textafter ;
            textbox.focus();
            textbox.selectionStart = ss;
            textbox.selectionEnd = ss;
        }
    }
    // viết cho nút next

    function next_Button() {
        currrentValue = inpuNhap.value
        currrentValue = currrentValue.replace(/^\s+|\s+$/gm,'');
        checkAnsewr(indexNumber)

    }

    function checkAnsewr(index)
    {
        if(indexNumber<shuffledQuestionsBackUp.length-1)
        {
            if (shuffledQuestionsBackUp[index].correctOption === currrentValue) {
                alertify.success('chính xác');
                score++;
                indexNumber++;
                dispalySuggession(indexNumber)
            }
            else if(currrentValue.includes('đáp án đúng ( '))
            {
                indexNumber++;
                dispalySuggession(indexNumber)
            }else if(shuffledQuestionsBackUp[index].correctOption !== currrentValue)
            {
                inpuNhap.value='đáp án đúng ( ' + shuffledQuestionsBackUp[index].correctOption + ' )'
                inpuNhap.style.backgroundColor = 'blue'
                inpuNhap.style.color='white'
                dap_an_sai = document.querySelector('#dapAnSai')
                dap_an_sai.style.display = 'block';
                dap_an_sai.value='đáp án của bạn ( ' + currrentValue + ')';
            }
        }
        else
        {
            handleEndGame()
        }

    }
    //function to close warning modal
    function closeOptionModal() {
        document.getElementById('score-modal').style.display = "none"
    }

    function handleEndGame() {
        document.getElementById('grade-percentage').innerHTML = score/shuffledQuestions.length*100
        document.getElementById('soCauDaHoc').innerHTML = shuffledQuestions.length
        document.getElementById('wrong-answers').innerHTML = (shuffledQuestions.length)-score
        document.getElementById('right-answers').innerHTML = score
        document.getElementById('score-modal').style.display = "flex"
    }
    document.getElementById('go_back_home').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default behavior of the link

        // Display the confirmation message
        var confirmed = confirm("Bạn có muốn kết thúc BAIF TEST hay không?");

        if (confirmed) {
            window.location.href = this.href; // Go to the specified URL (route)
        }
    });
    const path = url.pathname;
    const parts = path.split('/');
    const ids = parts[parts.length - 1];
    // Add a click event listener to the element
    const actionEndElement = document.querySelectorAll('.actionEnd');
    actionEndElement[0].addEventListener('click', () => {
        location.reload();
    });
    actionEndElement[1].addEventListener('click', function () {
        window.location.href = "/next_test_type/" + ids;
    });
</script>
</body>

</html>
