function toggleStatus(id) {
    fetch("toggle.php?id=" + id)
        .then(response => response.text())
        .then(status => {
            document.getElementById("status-" + id).innerHTML = status;
        });
}