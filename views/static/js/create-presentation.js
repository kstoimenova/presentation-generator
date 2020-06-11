document.getElementById('file-upload').addEventListener("change", showElementName);

function showElementName() {
    let fileInput = document.getElementById("file-upload");
    var fileName = fileInput.files[0].name;
    document.getElementById('file-name').innerHTML = fileName;

}