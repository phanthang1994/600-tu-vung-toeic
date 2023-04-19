function after_closing_mini_pop_up()
{
    closeMiniPopUp = document.querySelector('.miniPopUp').style.display='none'
    closeMiniPopUp = document.querySelector('.closeMiniPopUp').style.display='none'
    closeMiniPopUp = document.querySelector('.btnBatLen').style.display='flex'

}
function after_btnBatLen_mini_pop_up()
{
    closeMiniPopUp = document.querySelector('.miniPopUp').style.display='block'
    closeMiniPopUp = document.querySelector('.closeMiniPopUp').style.display='block'
    closeMiniPopUp = document.querySelector('.btnBatLen').style.display='none'

}