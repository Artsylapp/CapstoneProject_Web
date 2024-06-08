document.addEventListener("DOMContentLoaded", function() {
    var tables = document.querySelectorAll("table");
    tables.forEach(function(table) {
      var wrapper = document.createElement("div");
      wrapper.classList.add("table-wrapper");
      table.parentNode.insertBefore(wrapper, table);
      wrapper.appendChild(table);
    });
  });
  