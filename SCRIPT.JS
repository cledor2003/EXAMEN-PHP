document.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelectorAll("form");
    forms.forEach(form => {
        form.addEventListener("submit", function (event) {
            let valid = true;
            const inputs = form.querySelectorAll("input, select, textarea");
            
            inputs.forEach(input => {
                if (input.hasAttribute("required") && input.value.trim() === "") {
                    valid = false;
                    input.style.border = "2px solid red";
                } else {
                    input.style.border = "1px solid #ccc";
                }
            });
            
            if (!valid) {
                event.preventDefault();
                alert("Veuillez remplir tous les champs obligatoires.");
            }
        });
    });

    const deleteButtons = document.querySelectorAll(".delete-btn");
    deleteButtons.forEach(button => {
        button.addEventListener("click", function (event) {
            if (!confirm("Êtes-vous sûr de vouloir supprimer cet élément ?")) {
                event.preventDefault();
            }
        });
    });

    function loadData(url, target) {
        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.querySelector(target).innerHTML = data;
            })
            .catch(error => console.error("Erreur de chargement :", error));
    }

    if (document.querySelector("#table-data")) {
        loadData("fetch_data.php", "#table-data");
    }
});
