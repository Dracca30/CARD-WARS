window.onload = function () {
    fetch("arena_function.php")
        .then(response => response.json())
        .then(data => {
            const tbody = document.querySelector("#myTable tbody");

            data.forEach(utente => {
                const row = document.createElement("tr");

                row.innerHTML = `
                    <td>${utente.username}</td>
                    <td>${utente.posizione}</td>
                    <td>${utente.punti}</td>
                `;

                tbody.appendChild(row);
            });
        })
        .catch(error => {
            console.error("Errore nel caricamento dati:", error);
        });
};
