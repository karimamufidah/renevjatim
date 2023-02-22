// Datatable
const defaultLanguageDatatableProperties = {
  searchPlaceholder: "Cari...",
  search: "_INPUT_",
  lengthMenu: "<span>Menampilkan </span>_MENU_<span> data</span>",
  info:
    "<span>Menampilkan data ke-</span><b>_START_</b><span>" +
    " sampai ke-</span><b>_END_</b><span> dari </span><b>_TOTAL_</b><span>" +
    " data yang ditemukan</span>",
  infoFiltered: "(disaring dari _MAX_ total data)",
  zeroRecords: "Data dengan kriteria yang Anda cari tidak ditemukan.",
  paginate: {
    first: "«",
    previous: "‹",
    next: "›",
    last: "»",
  },
};
const lengthMenuWithAll = [
  [10, 25, 50, 100, -1],
  [10, 25, 50, 100, "Semua"],
];
const generateSelect2Datatable = (data, patchGenerator, name) => {
  let [value, text, patchObjectId] = data.split("|||");

  return (
    '<select class="select2-datatable-' +
    name +
    ' form-control"' +
    ' onchange="' +
    patchGenerator +
    "(" +
    patchObjectId +
    ', this.value)"' +
    ' style="width: 100%;">' +
    '<option value="' +
    value +
    '">' +
    text +
    "</option>" +
    "</select>"
  );
};
const generateDeleteButton = (data) => {
  return (
    '<button title="Hapus"' +
    ' id="delete-' +
    data +
    '" onclick="confirmDelete(this.id)"' +
    ' class="btn btn-outline-danger btn-sm"  onfocusout="cancelDelete(this.id)"' +
    ' style="margin:1px">' +
    '<i class="fas fa-trash"></i>' +
    "</button>"
  );
};
const generateDeleteButtonWithoutMargin = (data) => {
  return (
    '<button title="Hapus"' +
    ' id="delete-' +
    data +
    '" onclick="confirmDelete(this.id)"' +
    ' class="btn btn-outline-danger btn-sm"  onfocusout="cancelDelete(this.id)">' +
    '<i class="fas fa-trash"></i>' +
    "</button>"
  );
};
const generateEditButton = (data) => {
  return (
    '<button title="Edit"' +
    ' id="edit-' +
    data +
    '" onclick="editData(this.id)"' +
    ' class="btn btn-outline-secondary btn-sm"' +
    ' style="margin:1px">' +
    '<i class="fas fa-edit"></i>' +
    "</button>"
  );
};
const generateEditButtonWithoutMargin = (data) => {
  return (
    '<button title="Edit"' +
    ' id="edit-' +
    data +
    '" onclick="editData(this.id)"' +
    ' class="btn btn-outline-secondary btn-sm">' +
    '<i class="fas fa-edit"></i>' +
    "</button>"
  );
};
const generateEditButtonLink = (data) => {
  return (
    '<a title="Edit"' +
    ` href="${data}"` +
    ' class="btn btn-outline-secondary btn-sm"' +
    ' style="margin-left:5px;margin-top:5px">' +
    '<i class="fas fa-edit"></i>' +
    "</a>"
  );
};

const generateUnorderableColDatatable = (...columns) => {
  return {
    orderable: false,
    targets: columns,
  };
};

const generateCenteredColDatatable = (...columns) => {
  return {
    targets: columns,
    createdCell: function (td, cellData, rowData, row, col) {
      $(td).css("text-align", "center");
    },
  };
};

const generateRightAlignedColDatatable = (...columns) => {
  return {
    targets: columns,
    createdCell: function (td, cellData, rowData, row, col) {
      $(td).css("text-align", "right");
    },
  };
};

const generateCenteredColRowDatatable = (...columns) => {
  return {
    targets: columns,
    createdCell: function (td, cellData, rowData, row, col) {
      $(td).css("text-align", "center");
      $(td).css("vertical-align", "middle");
    },
  };
};

const generateCenteredRowDatatable = (...columns) => {
  return {
    targets: columns,
    createdCell: function (td, cellData, rowData, row, col) {
      $(td).css("vertical-align", "middle");
    },
  };
};

// Select2
const formatTemplateSelection = (result) => result.text;
const formatTemplateResult = (result, templateName) => {
  if (result.loading) return result.text;

  let $container = $(
    `<div class='select2-result-${templateName}'>` +
    `<div class='select2-result-${templateName}_value'></div>` +
    `</div>`
  );

  $container.find(`.select2-result-${templateName}_value`).text(result.text);

  return $container;
};
const setSelect2ToNull = (elementID) => $(`#${elementID}`).val(null).trigger("change");

// Sweetalert
const openFail = (message) => openModalNotification("fail", message);
const openSuccess = (message) => openModalNotification("success", message);
const openModalNotification = (condition, message = "", handler) => {
  let Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: condition == "success" ? false : true,
    timer: condition == "success" ? 3000 : 300000,
  });

  Toast.fire({
    icon: condition == "success" ? "success" : "error",
    title: condition == "success" ? "Berhasil!" : "Gagal!",
    text: message,
  });

  if (handler) handler();
};

function openModalConfirmation(message, confirmText, confirmHandler = null) {
  Swal.fire({
    title: "Apakah Anda Yakin?",
    html: message,
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: confirmText,
    cancelButtonText: "Batal",
  }).then((result) => {
    if (result.value) {
      if (confirmHandler) confirmHandler();
    }
  });
}
