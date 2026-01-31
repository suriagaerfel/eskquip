function insertImage() {
  const url = prompt("Enter image URL:");
  if (url) {
    document.execCommand("insertImage", false, url);
  }
}

function insertVideo() {
  const url = prompt("Enter video URL (YouTube/Vimeo):");
  if (url) {
    const video = `<iframe width="560" height="315" src="${url}" frameborder="0" allowfullscreen></iframe>`;
    document.execCommand("insertHTML", false, video);
  }
}

function insertTable() {
  const rows = prompt("Enter number of rows:");
  const cols = prompt("Enter number of columns:");
  if (rows && cols) {
    let table = "<table border='1'>";
    for (let i = 0; i < rows; i++) {
      table += "<tr>";
      for (let j = 0; j < cols; j++) {
        table += "<td>&nbsp;</td>";
      }
      table += "</tr>";
    }
    table += "</table>";
    document.execCommand("insertHTML", false, table);
  }
}
