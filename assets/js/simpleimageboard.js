const change = src => {
    document.getElementById('linkBigView').href = src;
    document.getElementById('mainIMG').src = src;
    document.getElementById('mainIMG').style.display = "block";
    document.getElementById('linkBigView').style.display = "block";
    document.getElementById('goRight').style.display = "block";
    document.getElementById('goLeft').style.display = "block";
    /* Dies Code sorgt dafür, dass das Bild nicht den ganzen Bildschirm einnimt, sondern maximal die Bildschirmhöhe */
    document.getElementById('mainIMG').style.height = "100%";
    document.getElementById('mainIMG').style.width = "100vh";
    document.getElementById('mainIMG').style.objectFit = "cover";
}

function closeME()
{
    document.getElementById('mainIMG').style.display = "none";
    document.getElementById('linkBigView').style.display = "none";
    document.getElementById('goRight').style.display = "none";
    document.getElementById('goLeft').style.display = "none";
}

function goLeft()
{
    //document.getElementById('linkBigView').href = src;
}

function goRight()
{
    //document.getElementById('linkBigView').href = src;
}