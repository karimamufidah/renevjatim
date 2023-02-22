const getElement = id => document.getElementById(id);
const getInner = id => document.getElementById(id).innerHTML;
const getValue = id => document.getElementById(id).value;

const fillInner = (id, data) => document.getElementById(id).innerHTML = data;
const fillValue = (id, data) => document.getElementById(id).value = data;

const show = id => document.getElementById(id).style.display = null;
const showBlock = id => document.getElementById(id).style.display = "block";
const hide = id => document.getElementById(id).style.display = "none";
const hideNotif = element => element.parentNode.parentNode.style.display = "none";
const toggleString = (id, string1, string2) => fillInner(id, getElement(id).innerHTML == string1 ? string2 : string1);

const submit = id => document.getElementById(id).submit();
const openUpload = id => document.getElementById(id).click();

// Reference: https://www.w3resource.com/javascript/form/email-validation.php
const isEmail = text => /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(text);

function toggle(id) {
  let displayProperties = document.getElementById(id).style.display;

  if (!displayProperties) {
    hide(id);
  } else {
    show(id);
  }
}

function toggleFontAwesomeIcon(i, icon1, icon2) {
  if (i.classList.contains(icon1)) {
    i.classList.remove(icon1);
    i.classList.add(icon2);
  } else {
    i.classList.remove(icon2);
    i.classList.add(icon1);
  }
}

function imagePreview(imageForm, imageId) {
  if (imageForm.files && imageForm.files[0]) {
    let reader = new FileReader();

    reader.onload = e => document.getElementById(imageId).src = e.target.result;

    reader.readAsDataURL(imageForm.files[0]);
  }
}

function audioPreview(audioForm, audioIdEmpty, audioIdFill) {
  if (audioForm.files && audioForm.files[0]) {
    let reader = new FileReader();

    reader.onload = function (e) {
      document.getElementById(audioIdFill).src = e.target.result;
      document.getElementById(audioIdFill).style.display = "";
      document.getElementById(audioIdEmpty).style.display = "none";
    }

    reader.readAsDataURL(audioForm.files[0]);
  }
}

function filePreview(fileForm, fileIdFill) {
  if (fileForm.files && fileForm.files[0]) fillInner(fileIdFill, fileForm.files[0].name);
}

function fillSelect2Default(id, data) {
  fillInner(id, data.text);

  getElement(id).value = data.id;
}

function parseTime(datetime) {
  if (datetime) return datetime.split(" ")[1];
}

function getReadableTime(time) {
  if (time) {
    let [hour, minute] = time.split(":");

    return `${hour}.${minute} WIB`;
  }
}

async function getDefaultSelect2({ id, url, auth, params, isReinitialize, returnOnly }) {
  return new Promise((resolve, reject) => {
    let xhr = new XMLHttpRequest();
    let urlAPI = `${url}/default-data`;

    if (params) urlAPI += "?" + params;

    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        let response = JSON.parse(this.responseText);

        if (response.success) {
          if (!returnOnly) {
            if (isReinitialize) {
              generateSelectedSelect2(id.replace('-default', ''), response.data.text, response.data.id);
            } else {
              fillSelect2Default(id, response.data);
            }
          }

          resolve(response.data);
        } else {
          reject(response.message);
        }
      } else if (this.status == 500 || this.status == 404) {
        reject("Server sedang bermasalah.");
      }
    };

    xhr.open("GET", urlAPI, true);
    xhr.setRequestHeader("Authorization", auth);
    xhr.send();
  });
}

function generateSelectedSelect2(selectId, text, id) {
  if ($('#' + selectId).find("option[value='" + id + "']").length) {
    $('#' + selectId).val(id).trigger('change');
  } else {
    let newOption = new Option(text, id, true, true);

    $('#' + selectId).append(newOption).trigger('change');
  }
}

const forceRemoveQuotes = element => element.value = element.value.replace(/[\'\"]/g, '');
const forceNumber = element => element.value = element.value.replace(/[^0-9]/g, '');
const forceLetterAndDot = element => element.value = element.value.replace(/[^a-zA-Z. ]/g, '');
const forceUppercase = element => element.value = element.value.toLocaleUpperCase();

function downloadFileFromInput(element, fileForm) {
  // https://stackoverflow.com/questions/25395727/how-to-download-the-content-image-data-of-input-type-file
  let file = fileForm.files[0];
  let filename = fileForm.files[0].name;
  let blob = new Blob([file]);
  let url = URL.createObjectURL(blob);

  var link = document.createElement('a');
  link.href = url;
  link.download = filename;
  document.body.appendChild(link);
  link.click();
  link.remove();
}

function downloadFileFromURL(uri, name) {
  // https://stackoverflow.com/questions/3749231/download-file-using-javascript-jquery
  var link = document.createElement("a");

  link.setAttribute('download', name);
  link.href = uri;
  document.body.appendChild(link);
  link.click();
  link.remove();
}

function fillDownloadButton({
  buttonId,
  labelId,
  fileName,
  fileURL,
}) {
  fillInner(labelId, fileName);
  show(buttonId);
  getElement(buttonId).setAttribute('onclick', `downloadFileFromURL('${fileURL}', '')`);
}

function copyTextToClipboard(elementId) {
  let text = getElement(elementId).innerHTML;

  navigator.clipboard.writeText(text).then(function () {
    openSuccess('Berhasil menyalin data!');
  }, function (err) {
    openFail('Gagal menyalin data!');
  });
}

const generateDataFormText = (column, elementId) => generateDataFormRealText(column, getValue(elementId));

function generateDataFormRealText(column, text) {
  let data = new FormData();

  data.append('column', column);
  data.append('value', text);

  return data;
}

function generateDataFormFile(column, elementId) {
  let data = new FormData();

  data.append('column', column);

  if (getElement(elementId).files[0]) data.append('value', getElement(elementId).files[0]);

  return data;
}

function fillLink(elementId, url, name) {
  getElement(elementId).setAttribute('onclick', `downloadFileFromURL('${url}', '${name}')`);
}

function fillLinkDisabled(elementId) {
  getElement(elementId).style.cursor = 'not-allowed';
  getElement(elementId).style.textDecoration = 'line-through';
  getElement(elementId).classList.remove('text-navy');
  getElement(elementId).classList.add('text-muted');
}

const showBootstrapAlert = (containerId, message, type) => {
  getElement(containerId).classList.remove('alert-danger', 'alert-success', 'alert-warning', 'alert-primary');
  getElement(containerId).classList.add(`alert-${type}`);
  fillInner(containerId, message);
  show(containerId);
};

// Fix select2 autoselect
$(document).on('select2:open', () => {
  document.querySelector('.select2-search__field').focus();
});

// Autoscroll top
// https://stackoverflow.com/a/52948533
function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
}