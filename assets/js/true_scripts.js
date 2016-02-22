function verifyMatchingPasswords() {
    var p1 = document.getElementById("pswd_input_1").value;
    var p2 = document.getElementById("pswd_input_2").value;
    feedback = (p1.localeCompare(p2) == 0) ? "" : "Passwords don't match!";
    document.getElementById("pswd_neg_feedback").innerHTML = feedback;
    feedback = (p1.localeCompare(p2) == 0) ? ((p1.localeCompare("") == 0) ? "" : "Passwords match!") : "";
    document.getElementById("pswd_pos_feedback").innerHTML = feedback;
}