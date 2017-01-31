/**
 * Created by siggi on 31.01.17.
 */

function bill() {
    var data = {
        lastName: document.getElementById("lastName").value,
        firstName: document.getElementById("firstName").value,
        street: document.getElementById("street").value,
        plz: document.getElementById("plz").value,
        city: document.getElementById("city").value,
        email: document.getElementById("email").value,
    }

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("lastName").value = "";
            document.getElementById("firstName").value = "";
            document.getElementById("street").value = "";
            document.getElementById("plz").value = "";
            document.getElementById("city").value = "";
            document.getElementById("email").value = "";
            document.getElementById("message").innerHTML = "Done!";
            document.location="index.php?page=billUI"
        } else if (this.status >= 400) {
            console.error(xhttp.response);
        }
    };
    xhttp.open("POST", "api/bill.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");

    xhttp.send(JSON.stringify(data));
};

function validation(onError, onSuccess) {
    var errorCodes = [
        validateField('lastName', /^[a-zA-ZäöüÄßÖÜ\s]{2,}$/, "Wrong Name!"),
        validateField('firstName', /^[a-zA-ZäöüßÄÖÜ\s]{2,}$/, "Wrong First Name!"),
        validateField('street', /^[a-zA-ZäöüÄÖÜß0-9,\-. ]+$/, "Wrong Street!"),
        validateField('plz', /^\d{5}$/, "Wrong PLZ!"),
        validateField('city', /^[a-zA-Z0-9äöüÄßÖÜ\-\s]{2,}$/ , "Wrong City!"),
        validateField('email',
            /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i,
            "Wrong Mail! (kevin@kevinmail.de)"
        )
    ];

    var noError = errorCodes.reduce(function (acc, curr) {
        return curr && acc;
    }, true)

    if (noError) {
        if (onSuccess && typeof onSuccess == 'function') {
            onSuccess();
            //$(this).fadeOut();
            // document.getElementById('collapseThree').scrollIntoView();
        }
    } else {
        if (onError && typeof onError == 'function') {
            onError();
        }
    }

}

function validateField(id, tester, onError) {
    var field = document.getElementById(id);

    if (!(tester instanceof RegExp ? tester.test(field.value) : tester(field.value))) {
        field.classList.add("alert-danger");
        document.getElementById(id + 'Alert').classList.add("alert-danger");
        if (onError && typeof onError == "function") {
            onError();
        } else if (onError && typeof onError == "string") {
            document.getElementById(id + 'Alert').innerHTML = onError;
        } else {
            document.getElementById(id + 'Alert').innerHTML += "!";
        }
        document.getElementById('message').innerHTML = "Error!";
        return false;
    }
    else {
        field.classList.remove("alert-danger");
        document.getElementById(id + 'Alert').classList.remove("alert-danger");
        document.getElementById(id + 'Alert').innerHTML = id;
        return true;
    }
}


