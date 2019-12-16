console.log("Starting my to-do app!");

const searchBtn = document.getElementById("searchBtn");

function setFieldValue(jobId, fieldname, value) {
    var field = document.querySelector("#row_" + jobId + " .action-buttons form input[name='" + fieldname + "']");
    field.value = value;
}

var updateBtns = document.querySelectorAll(".updateBtn");

for (var i = 0; i < updateBtns.length; i++) {
    updateBtns[i].onclick = function () {
        var jobId = this.value;
        var rowElements = document.querySelectorAll("#row_" + jobId + " .value-cell .value");
        for (var i = 0; i < rowElements.length; i++) {
            if (rowElements[i].classList.contains("value-category")) {
                var optionValues = ['Work', 'Household', 'Appointment', 'Reminder', 'Grocery shopping', 'Other Shopping', 'Vehicle', 'Other']

                var selectList = document.createElement("select");
                selectList.setAttribute("form", "jobInput");
                selectList.setAttribute("name", "jobCategory");
                selectList.setAttribute("class", "cat-select");
                selectList.setAttribute("onchange", "setFieldValue(" + jobId + ", 'category', this.value);");

                var def_option = document.createElement("option");
                def_option.setAttribute("value", "");
                def_option.text = "Select category:";
                selectList.appendChild(def_option);

                for (var j = 0; j < optionValues.length; j++) {

                    var option = document.createElement("option");
                    option.setAttribute("value", optionValues[j]);
                    if (optionValues[j] == rowElements[i].innerText) {
                        option.setAttribute("selected", 1);
                    }
                    option.text = optionValues[j];
                    selectList.appendChild(option);

                }
                rowElements[i].replaceChild(selectList, rowElements[i].childNodes.item(0));

            } else {
                if (rowElements[i].classList.contains("value-due")) {
                    var value = rowElements[i].innerText.replace(' ', 'T');
                    rowElements[i].innerHTML = '<input name="due" type="datetime-local" onchange="setFieldValue(' + jobId + ', \'due\', this.value);" value="' + value + '">';
                } else {
                    rowElements[i].innerHTML = '<input name="job" type="text" onkeyup="setFieldValue(' + jobId + ', \'job\', this.value);" value="' + rowElements[i].innerText + '">';
                }
            }
        }
        //paslepj dropdown
        var dropdown = document.querySelectorAll("#row_" + jobId + " .dropdown");
        for (var i = 0; i < dropdown.length; i++) {
            dropdown[i].style.display = "none";
        }
        //pievienot pogu paradisanos
        var updateButton = document.querySelectorAll("#row_" + jobId + " .action-buttons");
        for (var i = 0; i < updateButton.length; i++) {
            updateButton[i].style.display = "inline-block";
        }
    };
}

var cancelBtns = document.querySelectorAll(".cancelBtn");

for (var i = 0; i < cancelBtns.length; i++) {
    cancelBtns[i].onclick = function (e) {
        e.preventDefault();
        var jobId = this.value;
        var rowElements = document.querySelectorAll("#row_" + jobId + " .value-cell .value");

        for (var i = 0; i < rowElements.length; i++) {
            rowElements[i].innerHTML = rowElements[i].getAttribute('attr-value');
        }
        //parada dropdown
        var dropdown = document.querySelectorAll("#row_" + jobId + " .dropdown");
        for (var i = 0; i < dropdown.length; i++) {
            dropdown[i].style.display = "flex";
        }
        //pievienot pogu paradisanos
        var updateButton = document.querySelectorAll("#row_" + jobId + " .action-buttons");
        for (var i = 0; i < updateButton.length; i++) {
            updateButton[i].style.display = "none";
        }
    }
}

var input = document.getElementById("search-input");

input.onkeyup = () => {
    console.log("Searching...");
    myFunction();
}

function myFunction() {

    var rows = document.getElementsByClassName('job-row');
    var filter = input.value.toLowerCase();

    for (i = 0; i < rows.length; i++) {
        var nodes = document.querySelectorAll('#' + rows[i].id + ' .value-cell');
        var found = false;
        for (j = 0; j < nodes.length; j++) {
            var string = nodes[j].firstChild.innerText.toLowerCase();
            if (string.includes(filter) == true) {
                found = true
            }
        }
        if (found == true) {
            rows[i].style.display = "table-row";
        } else {
            rows[i].style.display = "none";
        }
    }
}
// myFunction();

// searchBtn.onkeyup = () => {
//     myFunction();
// }
