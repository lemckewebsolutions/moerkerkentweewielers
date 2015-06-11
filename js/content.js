function toggle(elementID1){
    var target1 = document.getElementById(elementID1)
    if (target1.style.display == 'none') {
        target1.style.display = 'block'
    } else {
        target1.style.display = 'none'
    }
}

function switchFMtoWM()
{
    var framehoogte = document.getElementById("framehoogte")
    var framehoogteinput = document.getElementById("framehoogteinput")
    var wielmaat = document.getElementById("wielmaat")
    var wielmaatinput = document.getElementById("wielmaatinput")

    if(framehoogte.style.display == 'none')
    {
        framehoogte.style.display = 'block'
        framehoogteinput.style.display = 'block'
        wielmaat.style.display = 'none'
        wielmaatinput.style.display = 'none'

        document.searchForm.searchOnFramehoogte.value = "true"
    }
    else
    {
        framehoogte.style.display = 'none'
        framehoogteinput.style.display = 'none'
        wielmaat.style.display = 'block'
        wielmaatinput.style.display = 'block'

        document.searchForm.searchOnFramehoogte.value = "false"
    }
}