let kruhsubmit = document.getElementById("kruhsubmit");
kruhsubmit.addEventListener("click", calculateKruh);

function calculateKruh(){
    let input = document.getElementById("kruhinput").value;
    let obsah = Math.PI*Math.pow(input, 2);
    let obvod = 2*Math.PI*input;
    document.getElementById("obsahoutput").innerHTML = obsah.toFixed(2);
    document.getElementById("obvodoutput").innerHTML = obvod.toFixed(2);
}

document.getElementById("obdelniksubmit").addEventListener("click", calculateObdelnik);

function calculateObdelnik(){
    let inputA = document.getElementById("obdelnik_A").value;
    let inputB = document.getElementById("obdelnik_B").value;
    document.getElementById("obsahoutput_2").innerHTML = (inputA*inputB).toFixed(2);
    document.getElementById("obvodoutput_2").innerHTML = (2*inputA+2*inputB).toFixed(2);
}

function reset(){
    document.getElementById("obsahoutput").innerHTML = null;
    document.getElementById("obvodoutput").innerHTML = null;
    document.getElementById("obsahoutput_2").innerHTML = null;
    document.getElementById("obvodoutput_2").innerHTML = null;
}