function validate(json) {
    let index = 0;
    let isValid = true;
    json.forEach(slide => {
        if (!validateSlide(slide, index + 1)) {
            isValid = validateSlide(slide, index + 1);
        }

        index++;
    })

    if (isValid) {
        document.getElementById('file-error-message').innerHTML = ''
    }
}

function validateSlide(slide, index) {
    return validateHeading(slide, index) && validateType(slide, index);
}

function validateHeading(slide, index) {
    if (!slide.hasOwnProperty("heading")) {
        document.getElementById('file-error-message').innerHTML = "Слайд " + index + " няма заглавие."
        return false;
    }
    return true;
}

function validateType(slide, index) {
    if (!slide.hasOwnProperty("type")) {
        document.getElementById('file-error-message').innerHTML = "Слайд " + index + " няма тип."
        return false;
    } else if (!["withText", "withCodeblock", "withList"].includes(slide.type)) {
        document.getElementById('file-error-message').innerHTML = "Tипът " + slide.type + " на слайд " + index + " е невалиден."
        return false;
    } else if (!slide.hasOwnProperty(getTypeProperty(slide.type))) {
        document.getElementById('file-error-message').innerHTML = "Tипът " + slide.type + " на слайд " + index + " изисква ключ " + getTypeProperty(slide.type);
        return false;
    }

    return true;
}

function getTypeProperty(type) {
    return type.substring(4).toLowerCase();
}

function handleFileSelect(evt) {
    let files = evt.target.files;
}

document.getElementById('file-upload').addEventListener('input', handleFileSelect, false);

function handleFileSelect(evt) {
    let files = evt.target.files;

    let output = [];
    for (let i = 0, f; f = files[i]; i++) {
        let reader = new FileReader();

        reader.onload = (function(theFile) {
            return function(e) {
                try {
                    let json = JSON.parse(e.target.result);
                    validate(json)
                } catch (ex) {
                    document.getElementById('file-error-message').innerHTML = "Невалиден json формат."
                }
            }
        })(f);
        reader.readAsText(f);
    }

}

document.getElementById('file-upload').addEventListener('input', handleFileSelect, false);

function handleFormSubmit(event) {
    if (document.getElementById('file-error-message').innerHTML !== '') {
        event.preventDefault();
    }

}

document.getElementById('form').addEventListener('submit', handleFormSubmit, false);