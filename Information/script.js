var myAge = document.getElementById("myAge");
window.onload = countAge();

function countAge() {
    myAge.innerHTML = "Age : 20";
    birthday = new Date("2001-05-23");
    var ageDifMs = Date.now() - birthday.getTime();
    var ageDate = new Date(ageDifMs);
    myAge.innerHTML = "Age : " + Math.abs(ageDate.getUTCFullYear() - 1970);
}