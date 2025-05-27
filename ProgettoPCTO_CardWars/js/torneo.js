document.addEventListener("DOMContentLoaded", () => {
    const gironi = [];
    const gironiWinners = [];
    const startBtn = document.getElementById("startBtn");
    const overlay = document.getElementById("overlay");
    const tournamentSection = document.getElementById("tournament");
    const gironiContainer = document.getElementById("gironiContainer");
    const eliminazioneDiretta = document.getElementById("eliminazioneDiretta");
    const knockoutContainer = document.getElementById("knockoutContainer");
    const vincitoreDiv = document.getElementById("vincitore");
    const championName = document.getElementById("championName");

    startBtn.addEventListener("click", () => {
        overlay.style.display = "none";
        tournamentSection.style.display = "block";
        creaGironi();
        setTimeout(faseGironi, 1000);
    });

    function creaGironi() {
        for (let i = 0; i < 8; i++) {
            gironi.push([]);
        }

        for (let i = 0; i < players.length; i++) {
            gironi[i % 8].push(players[i]);
        }

        gironi.forEach((g, i) => {
            const box = document.createElement("div");
            box.className = "col-md-3 girone-box";
            let html = `<h5>Girone ${i + 1}</h5>`;
            g.forEach(p => html += `<div>${p.name}</div>`);
            box.innerHTML = html;
            gironiContainer.appendChild(box);
        });
    }

    function faseGironi() {
        gironi.forEach(g => {
            const scores = {};
            g.forEach(p => scores[p.id] = 0);
            for (let i = 0; i < g.length; i++) {
                for (let j = i + 1; j < g.length; j++) {
                    const winner = Math.random() < 0.5 ? g[i] : g[j];
                    scores[winner.id]++;
                }
            }
            const sorted = [...g].sort((a, b) => scores[b.id] - scores[a.id]);
            gironiWinners.push(sorted[0], sorted[1]);
        });

        setTimeout(faseEliminazione, 1000);
    }

    function faseEliminazione() {
        eliminazioneDiretta.style.display = "block";

        let roundPlayers = [...gironiWinners];
        const rounds = ["Ottavi", "Quarti", "Semifinali", "Finale"];

        rounds.forEach((round, roundIndex) => {
            const roundDiv = document.createElement("div");
            roundDiv.innerHTML = `<h5 class="text-center mt-4">${round}</h5>`;

            const nextRound = [];
            for (let i = 0; i < roundPlayers.length; i += 2) {
                const p1 = roundPlayers[i];
                const p2 = roundPlayers[i + 1];
                const winner = Math.random() < 0.5 ? p1 : p2;
                nextRound.push(winner);
                roundDiv.innerHTML += `
                    <div class="match">
                        <span>${p1.name}</span>
                        <span>vs</span>
                        <span>${p2.name}</span>
                    </div>
                    <div class="text-success">→ Vince: ${winner.name}</div>
                `;
            }
            knockoutContainer.appendChild(roundDiv);
            roundPlayers = nextRound;
        });

        championName.textContent = roundPlayers[0].name;
        vincitoreDiv.style.display = "block";
        document.getElementById("nuovoTorneoDiv").style.display = "block";
        const risultati = calcolaRisultati(roundPlayers[0]);
        salvaRisultati({ stats: risultati });
    }

    function calcolaRisultati(campione) {
        const statsMap = new Map();

        players.forEach(p => {
            statsMap.set(p.id, {
                id: p.id,
                played: 0,
                won: 0,
                lost: 0,
                points: 0
            });
        });

        gironi.forEach(g => {
            for (let i = 0; i < g.length; i++) {
                for (let j = i + 1; j < g.length; j++) {
                    const p1 = g[i];
                    const p2 = g[j];
                    const winner = Math.random() < 0.5 ? p1 : p2;
                    const loser = winner === p1 ? p2 : p1;

                    statsMap.get(p1.id).played++;
                    statsMap.get(p2.id).played++;

                    statsMap.get(winner.id).won++;
                    statsMap.get(winner.id).points += 3;

                    statsMap.get(loser.id).lost++;
                }
            }
        });

        let knockoutPlayers = [...gironiWinners];
        while (knockoutPlayers.length > 1) {
            const nextRound = [];
            for (let i = 0; i < knockoutPlayers.length; i += 2) {
                const p1 = knockoutPlayers[i];
                const p2 = knockoutPlayers[i + 1];
                const winner = Math.random() < 0.5 ? p1 : p2;
                const loser = winner === p1 ? p2 : p1;

                statsMap.get(p1.id).played++;
                statsMap.get(p2.id).played++;

                statsMap.get(winner.id).won++;
                statsMap.get(winner.id).points += 3;

                statsMap.get(loser.id).lost++;

                nextRound.push(winner);
            }
            knockoutPlayers = nextRound;
        }

        return Array.from(statsMap.values());
    }

    function salvaRisultati(risultati) {
        fetch('salvaRisultati.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(risultati)
        })
            .then(res => res.text())
            .then(data => console.log('Risultati salvati:', data))
            .catch(err => console.error('Errore salvataggio:', err));
    }

    document.getElementById("restartBtn").addEventListener("click", () => {
        location.reload();
    });
});