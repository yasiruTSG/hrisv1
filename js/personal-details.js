$(document).ready(function() {
    console.log("ready");

    $("#form").validate({
        rules: {
            dob: {
                required: true
            },
            firstName: {
                required: true
            },
            fullName: {
                required: true
            },
            gender: {
                required: true
            },
            haveChildren: {
                required: true
            },
            maritalStatus: {
                required: true
            },
            nameWithInitial: {
                required: true
            },
            religion: {
                required: true
            },
            surname: {
                required: true
            },
            birthCertificate: {
                required: true
            }
        },
        messages: {
            explanation: {
                required: "please fill explanation"
            },
            haveChildren: {
                required: "need to select an option"
            }
        },
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        errorPlacement: function(error, element) {
            error.appendTo(element.parent());
        },
        submitHandler: function(form) {
            const formData = new FormData();
            console.log($('input[type="file"]'));
            //     for (var i = 0; i < files.length; i++) {
            //     data.append("file", files[i]);
            //     data.append("upload_preset", 'CLOUDINARY_UPLOAD_PRESET');
            // }

            const serializeData = $('#form').serializeArray();
            console.log(serializeData);
            const rawData = serializeData.reduce((prev, d) => {
                prev[d.name] = d.value
                return prev
            }, {});

            console.log('row data --->>', rawData);

            $.post('./../action/save_personal_details.php', rawData, function(body, status) {
                console.log(body, status);
            });
            // alert("Submitted!")
        }
    });
    // start with one row
    addExplanation();

});


$("#form").submit(function(event) {
    event.preventDefault();
});

let explanationIndex = 1

const explanationTemplate = (index) => `
    <div class="row mb-1" id="explanation-row-${index}">
        <div class="col-10">
            <label class="hris-label my-3" for="explanation" class="form-label">Explanation ${index}</label>
            <textarea class="form-control" name="explanation-${index}" id="explanation-${index}" rows="3"></textarea>
        </div>
        <div class="col-2 m-auto">
            <a class="btn btn-primary" id="add-${index}" data-add-index="${index}" onclick="addExplanation(${index})">+</a>
            <a class="btn btn-primary" id="remove-${index}" data-remove-index="${index}" onclick="removeExplanation(${index})">-</a>
        </div>
    </div>
 `;

function addExplanation() {
    console.log('add template')
    // append the component to the correct place
    const index = explanationIndex++;
    $(explanationTemplate(index)).appendTo("#explanations");

    // add the rule for newly added form field
    $(`#explanation-${index}`).rules("add", {
        required: true,
        minlength: 2,
        messages: {
            required: "Required input",
            minlength: jQuery.validator.format("Please, at least {0} characters are necessary")
        }
    });
}

function removeExplanation(index) {
    // append the component to the correct place
    $(`#explanation-row-${index}`).remove()
    // remove rules
    $(`#explanation-${index}`).rules("remove");
}

function reject(id) {
    $(`#${id}`).toggle();
}

function openFileInput(element) {
    $(element).siblings("input[type=file]").trigger('click');
}

function openDateInput(element) {
    $(element).siblings("input[type=date]").trigger('click');
}